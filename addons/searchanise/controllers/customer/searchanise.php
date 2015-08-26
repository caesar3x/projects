<?php
/***************************************************************************
*                                                                          *
*   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
*                                                                          *
* This  is  commercial  software,  only  users  who have purchased a valid *
* license  and  accept  to the terms of the  License Agreement can install *
* and use this program.                                                    *
*                                                                          *
****************************************************************************
* PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
* "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
****************************************************************************/

if ( !defined('AREA') ) { die('Access denied'); }

@ignore_user_abort(1);
@set_time_limit(0);

if ($mode == 'async') {

	$xml_header = fn_se_get_xml_header();
	$xml_footer = fn_se_get_xml_footer();

	fn_echo('.');

	$processing_started = db_get_field("SELECT count(*) FROM ?:se_queue WHERE status = 'processing'");

	if (empty($processing_started)) { //prevent double processing
		$queue = db_get_hash_array("SELECT * FROM ?:se_queue WHERE status = 'pending' AND error_count < ?i ORDER BY queue_id ASC", 'queue_id', SE_MAX_ERROR_COUNT);
	}

	if (!empty($queue)) {

		foreach ($queue as $v) {
			$xml = '';
			$status = true;
			$lang_code = $v['lang_code'];
			$obj = unserialize($v['data']);
			$private_key = fn_se_get_private_key($v['lang_code']);

			// Set queue to processing state
			db_query("UPDATE ?:se_queue SET status = 'processing' WHERE queue_id = ?i", $v['queue_id']);

			if ($v['action'] == 'facet_update') {

				$xml = $obj;

				if (!empty($xml)) {
					$res = fn_se_send_update_request('/facets/update', $private_key, array('data' => $xml_header . $xml . $xml_footer));

					if ($res === false) {
						$status = false;
					}
				}

			} elseif ($v['action'] == 'facet_delete') {

				$facet_attribute = $obj;

				$res = fn_se_send_update_request('/facets/delete', $private_key, array('attribute' => $facet_attribute));

				if ($res === false) {
					$status = false;
				}

			} elseif ($v['action'] == 'start_full_import') {

				fn_update_addon_option('import_status', 'processing', 'searchanise');

			} elseif ($v['action'] == 'update') {

				list($products) = fn_get_products(array(
					'disable_searchanise' => true,
					'area' => 'A',
					'page' => 1,
					'sort_by' => 'null',
					'pid' =>  array_keys($obj),
					'extend' => array('categories', 'description', 'popularity', 'sales'),
				), count($obj), $lang_code);

				fn_echo('.');

				//pass additional params to fn_gather_additional_products_data for some speed up
				foreach ($products as &$_product) {
					$_product['exclude_from_calculate'] = true;
				}

				fn_gather_additional_products_data($products, array('get_features' => false, 'get_icon' => true, 'get_detailed' => true, 'get_options'=> false, 'get_discounts' => false));

				foreach ($products as $product) {
					$xml .= fn_se_generate_product_xml($product);
				}

				if (!empty($xml)) {

					$res = fn_se_send_update_request('/api/update', $private_key, array('data' => $xml_header . $xml . $xml_footer));

					if ($res === false) {
						$status = false;
					}
				}
			} elseif ($v['action'] == 'end_full_import') {

				fn_update_addon_option('import_status', 'done', 'searchanise');


			} elseif ($v['action'] == 'qty') {
				
				foreach ($obj as $product_id => $data) {
					$xml .= fn_se_generate_qty_xml($product_id, $data);
				}

				if (!empty($xml)) {
					$res = fn_se_send_update_request('/api/update', $private_key, array('data' => $xml_header . $xml . $xml_footer));

					if ($res === false) {
						$status = false;
					}
				}

			} elseif ($v['action'] == 'delete') {

				foreach ($obj as $product_id => $product_code) {

					$res = fn_se_send_update_request('/api/delete', $private_key, array('id' => $product_id));

					if ($res === false) {
						$status = false;
					}
					fn_echo('.');
				}

			} elseif ($v['action'] == 'delete_all') {

				$res = fn_se_send_update_request('/api/delete', $private_key, array('all' => true));

				if ($res === false) {
					$status = false;
				}

			} elseif ($v['action'] == 'phrase') {

				$res = fn_se_send_update_request('/api/phrases', $private_key, array('phrase' => $obj));

				if ($res === false) {
					$status = false;
				}
			}

			// Change queue item status
			if ($status == true) {
				// Done, cleanup queue
				db_query("DELETE FROM ?:se_queue WHERE queue_id = ?i", $v['queue_id']);
			} else {
				db_query("UPDATE ?:se_queue SET status = 'pending', error_count = error_count + 1 WHERE queue_id = ?i", $v['queue_id']);
				break; //try later
			}
			fn_echo('.');
		}
	}
}

if ($mode == 'resync') {
	if (empty($_REQUEST['private_key']) || Registry::get('addons.searchanise.private_key') !== $_REQUEST['private_key']) {
		die('INVALID KEY');
	}

	fn_se_queue_import();
	fn_searchanise_complete();
}

function fn_se_generate_product_xml($product_data)
{
	static $types_map = array(
		'D' => 'int',  // timestamp  (others -> date)
		'M' => 'text', // multicheckbox with enter other input
		'S' => 'text', // select text with enter other input
		'N' => 'int',  // select number with enter other input
		'E' => 'text', // extended
		'C' => 'text', // single checkbox (not avilable for filter)
		'T' => 'text', // input  (others -> text) (not avilable for filterering)
		'O' => 'int',  // input for number (others -> number)
	);

	$entry = '<entry>'."\n";
	$entry .= '<id>' . $product_data['product_id'] . '</id>'."\n";
	$entry .= '<title><![CDATA[' . $product_data['product'] . ']]></title>'."\n";
	$entry .= '<summary><![CDATA[' . (!empty($product_data['short_description']) ? $product_data['short_description'] : $product_data['full_description']) . ']]></summary>'."\n";
	$entry .= '<link href="' . fn_url('products.view?product_id=' . $product_data['product_id']) . '" />'."\n";
	$entry .= '<cs:price>' . $product_data['price'] . '</cs:price>'."\n";
	$entry .= '<cs:quantity>' . $product_data['amount'] . '</cs:quantity>'."\n";
	$entry .= '<cs:product_code><![CDATA[' . $product_data['product_code'] . "]]></cs:product_code>\n";//  Product_code

	if (!empty($product_data['main_pair']['icon']['http_image_path'])) {
		$image_link =  'http://' . Registry::get('config.http_host') . $product_data['main_pair']['icon']['http_image_path'];

	} elseif (!empty($product_data['main_pair']['detailed']['http_image_path'])) {
		$image_link =  'http://' . Registry::get('config.http_host') . $product_data['main_pair']['detailed']['http_image_path'];

	} else {
		$image_link = '';
	}

	$entry .= "<cs:image_link>{$image_link}</cs:image_link>\n";

	$product_data['product_features'] = fn_get_product_features_list($product_data['product_id'], 'A');

	if (!empty($product_data['product_features'])) {
		foreach ($product_data['product_features'] as $f) {
			if ($f['feature_type'] == 'G') {
				continue;
			}

			$entry .= '<cs:attribute name="feature_' . $f['feature_id'] . '" type="' . $types_map[$f['feature_type']] . '">';
			if ($f['feature_type'] == 'M') {
				foreach ($f['variants'] as $fv) {
					$entry .= ' <value><![CDATA[' . $fv['variant_id'] . ']]></value>';
				}
			} else {
				if ($f['feature_type'] == 'S' || $f['feature_type'] == 'E') {
					$entry .= '<![CDATA[' . $f['variant_id'] . ']]>';
				} elseif ($f['feature_type'] == 'O' || $f['feature_type'] == 'D' || $f['feature_type'] == 'N' ) {
					$entry .= $f['value_int'];
				} elseif ($f['feature_type'] == 'C') {
					$entry .= ($f['value'] == 'Y')? '<![CDATA[Y]]>' : '<![CDATA[N]]>';
				} else {// T 
					$entry .= '<![CDATA[' . $f['value'] . ']]>';
				}
			}
			$entry .= "</cs:attribute>\n";
		}
	}

	$entry .= '<cs:attribute name="category_id" type="text">';
	foreach ($product_data['category_ids'] as $category_id => $link_type) {
		$entry .= ' <value>' . $category_id . '</value>';
	}
	$entry .= "</cs:attribute>\n";

	$product_data['usergroup_ids'] = explode(',', $product_data['usergroup_ids']);
	$entry .= '<cs:attribute name="usergroup_ids" type="text">';
	foreach ($product_data['usergroup_ids'] as $usergroup_id) {
		$entry .= ' <value>' . $usergroup_id . '</value>';
	}
	$entry .= "</cs:attribute>\n";
	
	static $usergroups;
	if (empty($usergroups)) {
		$usergroups = db_get_hash_array("SELECT a.usergroup_id, a.status, a.type FROM ?:usergroups as a WHERE type = 'C' ORDER BY a.usergroup_id", 'usergroup_id');
		$usergroups = array_merge(fn_get_default_usergroups(), $usergroups);
	}

	$prices = db_get_hash_array('SELECT price, usergroup_id FROM ?:product_prices WHERE product_id = ?i AND lower_limit = 1', 'usergroup_id', $product_data['product_id']);

	foreach ($usergroups as $usergroup) {
		$usergroup_id = $usergroup['usergroup_id'];
		$price = (!empty($prices[$usergroup_id]['price']))? $prices[$usergroup_id]['price'] : $prices[0]['price'];
		$entry .= '<cs:attribute name="price_' . $usergroup_id . '" type="float">' . $price . "</cs:attribute>\n";
	}

	if (!empty($product_data['sales_amount'])) {
		$entry .= '<cs:attribute name="sales_amount" type="int">' . $product_data['sales_amount'] . "</cs:attribute>\n";
	}

	$entry .= '<cs:attribute name="company_id" type="text">' . (int)$product_data['company_id'] . "</cs:attribute>\n";
	$entry .= '<cs:attribute name="weight" type="float">' . $product_data['weight'] . "</cs:attribute>\n";
	$entry .= '<cs:attribute name="popularity" type="int">' . (int)$product_data['popularity'] . "</cs:attribute>\n";
	$entry .= '<cs:attribute name="amount" type="int">' . (int)$product_data['amount'] . "</cs:attribute>\n";
	$entry .= '<cs:attribute name="timestamp" type="int">' . (int)$product_data['timestamp'] . "</cs:attribute>\n";
	$entry .= '<cs:attribute name="position" type="int">' . (int)$product_data['position'] . "</cs:attribute>\n";

	$entry .= '<cs:attribute name="free_shipping" type="text">' . $product_data['free_shipping'] . "</cs:attribute>\n";

	$entry .= '<cs:attribute name="status" type="text">' . $product_data['status'] . "</cs:attribute>\n";

	$entry .= "</entry>\n";

	return $entry;
}

function fn_se_generate_qty_xml($product_id, $qty)
{
	$entry = '<entry>';
	$entry .= '<id>' . $product_id . '</id>';
	$entry .= '<cs:quantity>' . $qty . '</cs:quantity>';
	$entry .= '</entry>';

	return $entry;
}

die('OK');

?>