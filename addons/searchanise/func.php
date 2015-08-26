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

if (!defined('AREA')) { die('Access denied'); }

fn_define('SE_SEARCH_TIMEOUT', 3);
fn_define('SE_REQUEST_TIMEOUT', 10);
fn_define('SE_PRODUCTS_PER_PASS', 100);
fn_define('SE_MAX_ERROR_COUNT', 25);
fn_define('SE_SERVICE_URL', 'http://www.searchanise.com');

function fn_searchanise_init_secure_controllers($controllers)
{
	$controllers['searchanise'] = 'passive';
}

function fn_se_get_private_key($lang_code)
{
	return Registry::get('addons.searchanise.private_key_' . $lang_code);
}

function fn_se_get_api_key($lang_code)
{
	return Registry::get('addons.searchanise.api_key_' . $lang_code);
}

function fn_se_post_async()
{
	$url_info = parse_url(fn_url('searchanise.async', 'C', 'http'));

	$fp = @fsockopen($url_info['host'], 80, $errno, $errstr, 30);
	if ($fp) {
		$out = "GET " . $url_info['path'] . '?' . $url_info['query'] . " HTTP/1.1\r\n";
		$out .= "Host: " . $url_info['host'] . "\r\n";
		$out .= "Connection: Close\r\n\r\n";
		fputs($fp, $out);

	}
	unset($fp);
}

function fn_se_add_action($action, $product_id = NULL, $data = NULL, $lang_code = NULL)
{
	if (!empty($product_id)) {
		$data = array($product_id => $data);
	}

	$data = serialize($data);

	if (!empty($lang_code)) {
		$languages[] = $lang_code;
	} else {
		$languages = fn_se_get_languages();
	}

	$data = array($data);

	if ($action == 'full_import') {
		$data = array();
		$action = 'update';

		$product_count = db_get_field('SELECT count(*) FROM ?:products');

		for ($i = 0; $i < $product_count; $i += SE_PRODUCTS_PER_PASS) {
			$product_ids = db_get_fields('SELECT product_id FROM ?:products LIMIT ?i, ?i', $i, SE_PRODUCTS_PER_PASS);

			$data[] = serialize(array_flip($product_ids));
		}

		fn_se_add_action('start_full_import');
		$end_full_import = true;
	}

	foreach ($data as $d) {
		foreach ($languages as $lang_code) {

			if ($action != 'phrase') {
				//Remove duplicate actions
				db_query("DELETE FROM ?:se_queue WHERE status = 'pending' AND action = ?s AND data = ?s AND lang_code = ?s", $action, $d, $lang_code);
			}

			db_query("INSERT INTO ?:se_queue ?e", array(
				'action'    => $action,
				'data'      => $d,
				'lang_code' => $lang_code,
			));
		}
	}

	if (!empty($end_full_import)) {
		fn_se_add_action('end_full_import');
	}
}

function fn_searchanise_update_product_amount($new_amount, $product_id, $cart_id, $tracking)
{
	if ($tracking == 'B') { // track whole product inventory only - we don't use combinations yet
		fn_se_add_action('update', $product_id);
	}
}

function fn_searchanise_update_product($product_data, $product_id, $lang_code, $create)
{
	fn_se_add_action('update', $product_id);
}

function fn_searchanise_clone_product($product_id, $pid)
{
	fn_se_add_action('update', $pid);
}

function fn_searchanise_global_update($table, $field, $value, $type, $msg, $update_data)
{
	if (!empty($data['product_ids'])) {
		foreach ($data['product_ids'] as $pid) {
			fn_se_add_action('update', $pid);
		}
	} else {
		fn_se_add_action('full_import');
	}
}

function fn_searchanise_pre_delete_product($product_id)
{
	fn_se_add_action('delete', $product_id);
}

function fn_searchanise_import_after_process_data($primary_object_id, $v, $pattern, $options)
{
	if ($pattern['pattern_id'] == 'products') {
		fn_se_add_action('update', $primary_object_id['product_id']);
	}
}

function fn_searchanise_tools_change_status($params, $result)
{
	if ($params['table'] == 'products' && $result) {
		fn_se_add_action('update', $params['id']);
	}
}

function fn_se_get_languages()
{
	static $languages;

	if (empty($languages)) {
		$languages = db_get_fields("SELECT lang_code FROM ?:languages");
	}

	return $languages;
}

function fn_se_signup($lang_code = NULL, $show_notification = true)
{
	$connected = false;

	static $is_showed = false;

	$domain = Registry::get('config.http_host') . Registry::get('config.http_path');

	if (!Registry::get('user_info')) { // assume we've got here from installer
		$email = db_get_field("SELECT email FROM ?:users WHERE user_id = 1"); // get email of root admin
	} else {
		$email = Registry::get('user_info.email');
	}

	if (!empty($lang_code)) {
		$languages[] = $lang_code;
	} else {
		$languages = fn_se_get_languages();
	}

	foreach ($languages as $lang_code) {

		$private_key = Registry::get('addons.searchanise.private_key_' . $lang_code);

		$parent_private_key = Registry::get('addons.searchanise.parent_private_key');

		if (!empty($private_key)) {
			continue;
		}

		if ($show_notification == true && empty($is_showed)) {
			fn_echo('Processing to Searchanise..');
			$is_showed = true;
		}

		list($h, $res) = fn_http_request('POST', SE_SERVICE_URL . '/api/signup', array(
			'email'  => $email,
			'domain' => $domain .'/?sl=' . $lang_code,
			'parent_private_key' => $parent_private_key,
		));

		if ($show_notification == true) {
			fn_echo('.');
		}

		if (!empty($res)) {

			$res = fn_se_parse_response($res, true);

			if (is_object($res)) {
				$api_key = (string)$res->api;
				$private_key = (string)$res->private;

				if (empty($api_key) || empty($private_key)) {
					return false;
				}

				if (empty($parent_private_key)) {
					fn_update_addon_option('parent_private_key', $private_key, 'searchanise');
					Registry::set('addons.searchanise.parent_private_key', $private_key);
				}

				fn_update_addon_option('api_key_' . $lang_code, $api_key, 'searchanise');
				fn_update_addon_option('private_key_' . $lang_code, $private_key, 'searchanise');

				$connected = true;
			} else {
				return false;
			}
		}
	}

	if ($connected == true && $show_notification == true) {
		fn_echo(' Done<br />');
		fn_set_notification('N', fn_get_lang_var('notice'), fn_get_lang_var('text_se_just_connected'));
	}

	fn_update_addon_option('import_status', 'none', 'searchanise');

	return true;
}

/**
 * Parse response from service
 *
 * @param string $res xml service response
 * @return mixed false if errors returned, true if response is ok, xml object if data was passed in the response
 */
function fn_se_parse_response($res, $show_notification = false)
{
	$xml = simplexml_load_string($res, null, LIBXML_NOERROR);

	if (empty($res) || $xml === false) {
		return false;
	}
	
	if (!empty($xml->error)) {
		foreach ($xml->error as $e) {
			if ($show_notification == true) {
				fn_set_notification('E', fn_get_lang_var('error'), 'Searchanise: ' . (string)$e);
			}
		}

		return true;

	} elseif (strtolower($xml->getName()) == 'ok') {
		return true;

	} else {
		return $xml;
	}
}

function fn_se_queue_import($lang_code = NULL)
{
	fn_update_addon_option('import_status', 'queued', 'searchanise');
	fn_se_add_action('delete_all', NULL, NULL, $lang_code);
	fn_se_add_action('full_import', NULL, NULL, $lang_code);

	//reSend all filters
	list($filters, ) = fn_get_product_filters(array('get_variants' => true));
	foreach ($filters as $filter_data) {
		fn_searchanise_send_filter_request('facet_update', $filter_data);
	}

	fn_set_notification('N', fn_get_lang_var('notice'), fn_get_lang_var('text_se_import_status_queued'));
}

function fn_addon_dynamic_description_searchanise($description)
{
	$import_status = Registry::get('addons.searchanise.import_status');

	if ($import_status == 'queued') {
		return fn_get_lang_var('text_se_import_status_queued');
	} elseif ($import_status == 'processing') {
		return fn_get_lang_var('text_se_import_status_processing');
	} elseif ($import_status == 'done') {
		return fn_get_lang_var('text_se_import_status_done');
	} else {
		return fn_get_lang_var('text_se_import_status_none');
	}
}

function fn_searchanise_database_restore()
{
	$msg = fn_get_lang_var('text_se_database_restore_notice');
	$msg = str_replace('[link]', fn_url('addons.update?addon=searchanise'), $msg);

	fn_set_notification('W', fn_get_lang_var('notice'), $msg);

	return true;
}

function fn_searchanise_get_products_post($products, $params)
{
	if (AREA == 'C' && count($products) > 0 && !empty($params['q']) && fn_strlen($params['q']) > 0) {
		fn_se_add_action('phrase', 0, $params['q']);
	}
}

function fn_searchanise_get_facet_valid_locations()
{
	return array(
		'index.index',
		'products.search',
		'categories.view',
		'product_features.view'
	);
}

function fn_searchanise_send_search_request($params, $lang_code = CART_LANGUAGE)
{
	$default_params = array(
		'api_key'     => fn_se_get_api_key($lang_code),
		'items'       => 'true',
		'facets'      => 'true',
		'output'      => 'json',
	);

	$params = array_merge($default_params, $params);
	if (empty($params['restrictBy'])) {
		unset($params['restrictBy']);
	}

	if (empty($params['union'])) {
		unset($params['union']);
	}

	Registry::set('log_cut', true);
	list($header, $received) = fn_http_request('GET', SE_SERVICE_URL . '/search', $params, array(), array(), SE_SEARCH_TIMEOUT);

	if (empty($received)) {
		return false;
	}

	$result = fn_from_json(trim($received), true);

	if (empty($result) || !is_array($result) || !isset($result['totalItems'])) {
		return false;
	}

	return $result;
}

function fn_searchanise_get_products_pre($params, $join, $condition, $u_condition, $inventory_condition, $sortings, $total, $items_per_page, $lang_code)
{
	$import_status = Registry::get('addons.searchanise.import_status');

	if (!empty($params['disable_searchanise']) || $import_status != 'done') {
		return;
	}

	// disable by core
	if (
		AREA == 'A' ||
		!empty($params['pid']) ||
		!empty($params['b_id']) ||
		!empty($params['item_ids']) ||
		!empty($params['feature']) ||
		!empty($params['downloadable']) ||
		!empty($params['search_tracking_flags']) ||
		!empty($params['shipping_freight_from']) ||
		!empty($params['shipping_freight_to']) ||
		!empty($params['exclude_pid']) ||
		!empty($params['get_query']) ||
		!empty($params['search_tracking_flags']) ||
		!empty($params['feature_comparison']) ||
		isset($params['amount_to']) ||
		isset($params['amount_from']) ||
		(isset($params['q']) && Registry::get('settings.General.search_objects')) ||
		(isset($params['compact']) && $params['compact'] == 'Y') ||
		(!empty($params['sort_by']) && $params['sort_by'] == 'code') ||
		(!empty($params['force_get_by_ids']) && empty($params['pid']) && empty($params['product_id'])) ||
		(!empty($params['tx_features']) && !fn_is_empty($params['tx_features']))
	) {
		return;
	}

	// disable by addons
	if (
		!empty($params['rating']) ||                                                    // discussion
		!empty($params['bestsellers']) ||                                               // bestsellers
		!empty($params['configurable']) ||                                              // product_configurator
		!empty($params['also_bought_for_product_id']) ||                                // also_bought
		!empty($params['for_required_product']) ||                                      // required_products
		(!empty($params['sort_by']) && $params['sort_by'] == 'bestsellers') ||          // bestsellers sorting
		(!empty($params['display']) && $params['display'] == 'affiliate') ||            // affiliates
		(!empty($params['ppcode']) && $params['ppcode'] == 'Y') ||                      // twigmo
		(isset($params['tag']) && fn_string_no_empty($params['tag'])) ||                // tags
		(!empty($params['picker_for']) && $params['picker_for'] == 'gift_certificates') // recurring_billing
	) {
		return;
	}

	$restrict_by = $query_by = $union = array();

	//
	// Filters
	//
	$filter_fields = fn_get_product_filter_fields();

	$advanced_variant_ids = $simple_variant_ids = $ranges_ids = $fields_ids = array();

	if (!empty($params['features_hash'])) {
		if (!empty($params['advanced_filter'])) {
			list($advanced_variant_ids, $ranges_ids, $fields_ids) = fn_parse_features_hash($params['features_hash']);
		} else {
			list($simple_variant_ids, $ranges_ids, $fields_ids) = fn_parse_features_hash($params['features_hash']);
		}
	}

	if (!empty($params['multiple_variants']) && !empty($params['advanced_filter'])) {
		$simple_variant_ids = $params['multiple_variants'];
	}

	if (!empty($advanced_variant_ids)) {
		$features_variants_ids = db_get_hash_single_array("SELECT feature_id, GROUP_CONCAT(variant_id) as variant_ids FROM ?:product_feature_variants WHERE variant_id IN (?n) GROUP BY feature_id", array('feature_id', 'variant_ids'), $advanced_variant_ids);

		foreach ($features_variants_ids as $feature_id => $variant_ids) {
			$restrict_by['feature_'.$feature_id] = str_replace(',', '|', $variant_ids);
		}
	}

	if (!empty($simple_variant_ids)) {
		$features_variants_ids = db_get_hash_single_array("SELECT feature_id, GROUP_CONCAT(variant_id) as variant_ids FROM ?:product_feature_variants WHERE variant_id IN (?n) GROUP BY feature_id", array('feature_id', 'variant_ids'), $simple_variant_ids);

		foreach ($features_variants_ids as $feature_id => $variant_ids) {
			$restrict_by['feature_'.$feature_id] = str_replace(',', '&', $variant_ids);
		}
	}

	// Feature ranges
	if (!empty($params['custom_range'])) {
		foreach ($params['custom_range'] as $feature_id => $v) {
			$is_from = isset($v['from']) && fn_string_no_empty($v['from']);
			$is_to   = isset($v['to']) && fn_string_no_empty($v['to']);

			if ($is_from || $is_to) {
				if (!empty($v['type'])) {
					if ($v['type'] == 'D') {
						$v['from'] = fn_parse_date($v['from']);
						$v['to'] = fn_parse_date($v['to']);
					}
				}
				$restrict_by['feature_' . $feature_id] = (($is_from)? $v['from'] : '') . '|' . (($is_to)? $v['to'] : '');
			}
		}
	}

	foreach ($ranges_ids as $range_id) {
		$range = db_get_row("SELECT * FROM ?:product_filter_ranges WHERE range_id = ?i", $range_id);
		if (!empty($range)) {
			$restrict_by['feature_' . $range['feature_id']] = "{$range['from']}|{$range['to']}";
		}
	}

	// Checkbox features
	if (!empty($params['ch_filters']) && !fn_is_empty($params['ch_filters'])) {
		foreach ($params['ch_filters'] as $key => $value) {
			if (is_string($key) && !empty($filter_fields[$key])) {
				$restrict_by[$filter_fields[$key]['db_field']] = ($value == 'A')? 'Y|N' : $value;
			} else {
				if (!empty($value)) {
					$feature_id = $key;
					$restrict_by['feature_' . $feature_id] = ($value == 'A')? 'Y|N' : $value;
				}
			}
		}
	}

	//
	// Visibility
	//
	if (AREA == 'C') {
		$restrict_by['status'] = 'A';
			$restrict_by['usergroup_ids'] = join('|', $_SESSION['auth']['usergroup_ids']);
			if (Registry::get('settings.General.inventory_tracking') == 'Y' && Registry::get('settings.General.show_out_of_stock_products') == 'N' && AREA == 'C') {
			$restrict_by['amount'] = '1|';
		}

		if (fn_check_suppliers_functionality()) {
			$se_active_companies = Registry::get('se_active_companies');
			if (!is_null($se_active_companies)) {
				$restrict_by['company_id'] = $se_active_companies;
			}
		} else {
			if (defined('COMPANY_ID')) {
				$restrict_by['company_id'] = COMPANY_ID;
			}
		}
	}

	//
	// Company_id
	//
	if (isset($params['company_id']) && $params['company_id'] != '') {
		$restrict_by['company_id'] = $params['company_id'];
	}

	//
	// Timestamp
	//
	if (!empty($params['period']) && $params['period'] != 'A') {
		list($params['time_from'], $params['time_to']) = fn_create_periods($params);
		$restrict_by['timestamp'] = "{$params['time_from']}|{$params['time_to']}";
	}

	//
	// Categories
	//
	if (!empty($params['cid'])) {
		$cids = is_array($params['cid']) ? $params['cid'] : array($params['cid']);

		$c_condition = '';

		if (AREA == 'C') {
			$_c_statuses = array('A', 'H');// Show enabled categories
			$cids = db_get_fields("SELECT a.category_id FROM ?:categories as a WHERE a.category_id IN (?n) AND a.status IN (?a)", $cids, $_c_statuses);
			$c_condition = db_quote('AND a.status IN (?a) AND (' . fn_find_array_in_set($_SESSION['auth']['usergroup_ids'], 'a.usergroup_ids', true) . ')', $_c_statuses);
		}

		$sub_categories_ids = db_get_fields("SELECT a.category_id FROM ?:categories as a LEFT JOIN ?:categories as b ON b.category_id IN (?n) WHERE a.id_path LIKE CONCAT(b.id_path, '/%') ?p", $cids, $c_condition);
		$sub_categories_ids = fn_array_merge($cids, $sub_categories_ids, false);

		if (empty($sub_categories_ids)) {
			$params['force_get_by_ids'] = true;
			$params['pid'] = $params['product_id'] = 0;
			return;
		}

		if (!empty($params['subcats']) && $params['subcats'] == 'Y') {
			$restrict_by['category_id'] = join('|', $sub_categories_ids);
		} else {
			$restrict_by['category_id'] = join('|', $cids);
		}
	}

	//
	// Price Union
	//
	if (count($_SESSION['auth']['usergroup_ids']) > 1) {
		foreach($_SESSION['auth']['usergroup_ids'] as $usergroup_id) {
			$_prices[] = 'price_' . $usergroup_id;
		}

		$union['price']['min'] = join('|', $_prices);
	}

	//
	// Price
	//
	$is_price_from = (isset($params['price_from']) && fn_is_numeric($params['price_from']));
	$is_price_to   = (isset($params['price_to']) && fn_is_numeric($params['price_to']));

	if ($is_price_from || $is_price_to) {
		$restrict_by['price'] = (($is_price_from)? $params['price_from'] : '') . '|' . (($is_price_to)? $params['price_to'] : '');
	}

	//
	// Weight
	//
	$is_weight_from = (isset($params['weight_from']) && fn_is_numeric($params['weight_from']));
	$is_weight_to   = (isset($params['weight_to']) && fn_is_numeric($params['weight_to']));

	if ($is_weight_from || $is_weight_to) {
		$restrict_by['weight'] = (($is_weight_from)? $params['weight_from'] : '') . '|' . (($is_weight_to)? $params['weight_to'] : '');
	}

	//
	// Amount
	//
	$is_amount_from = (isset($params['amount_from']) && fn_is_numeric($params['amount_from']));
	$is_amount_to   = (isset($params['amount_to']) && fn_is_numeric($params['amount_to']));

	if ($is_amount_from || $is_amount_to) {
		$restrict_by['amount'] = (($is_amount_from)? $params['amount_from'] : '') . '|' . (($is_amount_to)? $params['amount_to'] : '');
	}

	//
	// Popularity
	//
	$is_popularity_from = (isset($params['popularity_from']) && fn_is_numeric($params['popularity_from']));
	$is_popularity_to   = (isset($params['popularity_to']) && fn_is_numeric($params['popularity_to']));

	if ($is_popularity_from || $is_popularity_to) {
		$restrict_by['popularity'] = (($is_popularity_from)? $params['popularity_from'] : '') . '|' . (($is_popularity_to)? $params['popularity_to'] : '');
	}

	if (!empty($params['free_shipping'])) {
		$restrict_by['free_shipping'] = $params['free_shipping'];
	}

	if (isset($params['pcode']) && fn_string_no_empty($params['pcode'])) {
		$query_by['product_code'] = trim($params['pcode']);
	}

	// -- SORTINGS --
	if (empty($params['sort_by']) || empty($sortings[$params['sort_by']])) {
		$params['sort_by'] = Registry::get('settings.Appearance.default_products_sorting');

		if (empty($params['sort_by'])) {
			$_products_sortings = fn_get_products_sorting(false);
			$params['sort_by'] = key($_products_sortings);
		}
	}

	$directions = array (
		'asc' => 'asc',
		'desc' => 'desc'
	);

	$default_sorting = fn_get_products_sorting(false);

	if (empty($params['sort_order']) || empty($directions[$params['sort_order']])) {
		if (!empty($default_sorting[$params['sort_by']]['default_order'])) {
			$params['sort_order'] = $default_sorting[$params['sort_by']]['default_order'];
		} else {
			$params['sort_order'] = 'asc';
		}
	}

	if ($params['sort_by'] == 'product') {
		$sort_by = 'title';
	} else {
		$sort_by = $params['sort_by'];
	}

	$sort_order = ($params['sort_order'] == 'asc') ? 'asc' : 'desc';

	$get_items = true;
	$get_facets = $use_separate_query_for_get_facets = false;
	if (AREA == 'C' && !empty($params['dispatch']) && in_array($params['dispatch'], fn_searchanise_get_facet_valid_locations())) {
		$get_facets = true;
	}
	// If we take the facets for multiple categories and subcategories of products showing off, then do not take facets in the first query
	if ($get_facets == true && !empty($sub_categories_ids) && count($sub_categories_ids) > 1 && (empty($params['subcats']) || $params['subcats'] == 'N')) {
		$use_separate_query_for_get_facets = true;
	} else {
		$use_separate_query_for_get_facets = false;
	}

	$requst_params = array(
		'sortBy'     => $sort_by,
		'sortOrder'  => $sort_order,

		'union'      => $union,
		'queryBy'    => $query_by,
		'restrictBy' => $restrict_by,

		'items'      => ($get_items == true)? 'true' : 'false',
		'facets'     => ($use_separate_query_for_get_facets == false && $get_facets == true)? 'true' : 'false',

		'maxResults' => !empty($params['limit'])? $params['limit'] : $items_per_page,
		'startIndex' => ($params['page'] - 1) * $items_per_page,
	);

	if (!empty($params['q']) && fn_strlen($params['q']) > 0) {
		$requst_params['q'] = $params['q'];
		$requst_params['suggestions'] = 'true';
		$requst_params['query_correction'] = 'false';
		$requst_params['suggestionsMaxResults'] = 1;
	} else {
		$requst_params['q'] = '';
	}

	$result = fn_searchanise_send_search_request($requst_params, $lang_code);
	if ($result == false) {
		return;
	}

	if ($use_separate_query_for_get_facets == true && $get_facets == true) {
		$requst_params['items'] = 'false';
		$requst_params['facets'] = 'true';
		$requst_params['restrictBy']['category_id'] = join('|', $sub_categories_ids);
		$_result = fn_searchanise_send_search_request($requst_params, $lang_code);
		if ($result == false) {
			return;
		} else {
			$result['facets'] = $_result['facets'];
		}
	}

	if (!empty($result['suggestions']) && count($result['suggestions']) > 0) {
		$params['suggestion'] = reset($result['suggestions']);
	}

	if (!empty($result['items'])) {
		foreach($result['items'] as $product) {
			$params['pid'][] = $product['product_id'];
		}
	} else {
		$products = array();
		$params['force_get_by_ids'] = true;
		$params['pid'] = $params['product_id'] = 0;
	}

	if (!empty($result['facets'])) {
		Registry::set('searchanise.received_facets', $result['facets']);
	}

	$total = $result['totalItems'];

	// reset condition with text search && filtering params  - we are get all control under process of  text search and filtering
	$condition = '';
	$join = '';

	return;
}

function fn_searchanise_get_filters_products_count($params)
{
	$import_status = Registry::get('addons.searchanise.import_status');

	if ($import_status != 'done') {
		return fn_get_filters_products_count($params);
	}

	$received_facets = Registry::get('searchanise.received_facets');

	$r_filters = $view_all = $variants_ids = $feature_variants = array();

	if (!empty($params['check_location']) && !in_array($params['dispatch'], fn_searchanise_get_facet_valid_locations())) {
		return array(array(), array());
	}

	if ($params['dispatch'] == 'categories.view' || $params['dispatch'] == 'product_features.view' || !empty($params['simple_link'])) {
		$simple_link = true; // this parameter means that extended filters on this page should be displayed as simple
	}

	if (empty($received_facets) && ($params['dispatch'] == 'index.index' || ($params['dispatch'] == 'products.search'/* && (empty($params['search_performed']) && empty($params['features_hash']))*/))) {
		//separate request for index page
		$requst_params = array(
			'items' => 'false',
		);

		$result = fn_searchanise_send_search_request($requst_params);
		if ($result == false) {
			return fn_get_filters_products_count($params);
		}

		$received_facets = $result['facets'];
	}

	if (empty($received_facets)) { // Nothing found
		return array(array(), array());
	}

	if (!empty($params['features_hash'])) {
		//Custom logic for suppliers :
		list( , , $fields_ids) = fn_parse_features_hash($params['features_hash']);
		
		foreach ($fields_ids as $range_id => $type) {
			if ($type == 'S') {
				$selected_company_id = $range_id;
				break;
			}
		}
	}

	$fields = fn_get_product_filter_fields();

	$_params = array(
		'get_variants' => true,
		'status' => 'A',
	);

	if ($params['dispatch'] == 'index.index') {
		$_params['show_on_home_page'] = 'Y';
	}

	if (!empty($params['category_id'])) {
		$_params['category_ids'] = array($params['category_id']);
	}

	list($filters, ) = fn_get_product_filters($_params);

	foreach ($filters as $filter_id => $filter) {

		$r_facet = array();
		foreach ($received_facets as $r) {
			$r_feature_id = str_replace('feature_', '', $r['attribute']);
			if ((!empty($filter['feature_id']) && $r_feature_id == $filter['feature_id']) || (!empty($filter['field_type']) && !empty($fields[$filter['field_type']]['db_field']) && $fields[$filter['field_type']]['db_field'] == $r_feature_id)) {
				$r_facet = $r;
				break;
			}
		}

		if (empty($r_facet)) {
			unset($filters[$filter_id]);
			continue;
		}

		if ($filter['field_type'] == 'F') {
			$filters[$filter_id]['ranges'] = $filter['ranges'] = array(
				'N' => array(
					'range_id'   => 0,
					'range_name' => fn_get_lang_var('no'),
					'products'   => 0,
				),
				'Y' => array(
					'range_id'   => 1,
					'range_name' => fn_get_lang_var('yes'),
					'products'   => 0,
				)
			);
		} elseif($filter['field_type'] == 'S') {
			$_companies = array();
			$companies = db_get_hash_single_array("SELECT ?:companies.company_id, ?:companies.company FROM ?:companies  WHERE status = 'A' ORDER BY ?:companies.company", array('company_id', 'company'));
			foreach ($companies as $company_id => $company) {
				$_companies[$company_id] = array(
					'range_id'   => $company_id,
					'range_name' => $company,
					'products'   => 0,
				);
			}
			$filters[$filter_id]['ranges'] = $filter['ranges'] = $_companies;
		}

		$ranges_count = 0;
		$tmp_ranges = $tmp_other_variants = array();
		foreach ($filter['ranges'] as $s_range_id => $s_range) {
			$r_range = array();

			if (!empty($filter['feature_id']) && !in_array($filter['feature_type'], array('D','N','O'))) {
				// features with variants
				foreach ($r_facet['buckets'] as $r) {
					if ($r['value'] == $s_range['variant_id']) {
						$r_range = $r;
						break;
					}
				}

			} elseif ($filter['field_type'] == 'F') {
				// Free shipping
				foreach ($r_facet['buckets'] as $r) {
					if ($r['value'] == $s_range_id) {
						$r_range = $r;
						break;
					}
				}

			} elseif ($filter['field_type'] == 'S') {
				// Suppliers
				foreach ($r_facet['buckets'] as $r) {
					if ($r['value'] == $s_range_id) {
						$r_range = $r;
						if (!empty($selected_company_id) && $selected_company_id == $s_range_id) {
							$r_range['selected'] = true;
						} else {
							unset($r_range['selected']);
						}
						break;
					}
				}

			} else {// range
				foreach ($r_facet['buckets'] as $r) {
					if ((int)$r['from'] == (int)$s_range['from'] && (int)$r['to'] == (int)$s_range['to']) {///TODO: int ??
						$r_range = $r;
						break;
					}
				}
			}

			if (empty($r_range)) {
				continue;
			}

			$range_id = ($s_range['variant_id'])? $s_range['variant_id'] : $s_range['range_id'];

			$new_range = array(
				'feature_id'   => $filter['feature_id'],
				'products'     => $r_range['count'],
				'range_id'     => $range_id,
				'range_name'   => ($s_range['variant'])? $s_range['variant'] : $s_range['range_name'],
				'feature_type' => $filter['feature_type'],
				'filter_id'    => $filter_id,
			);

			if (!empty($r_range['selected'])) {
				$new_range['selected'] = true;
				$tmp_ranges[$range_id] = $new_range;
			} else {
				$tmp_other_variants[$range_id] = $new_range;
			}

			$ranges_count++;
			if ($ranges_count == FILTERS_RANGES_MORE_COUNT) {
				$filters[$filter_id]['more_cut'] = true;
				break;
			}
		}

		if (empty($tmp_ranges)) {
			$tmp_ranges = $tmp_other_variants;
			$tmp_other_variants = array();
		}

		if (empty($tmp_ranges) && empty($tmp_other_variants)) {
			unset($filters[$filter_id]);
		} else {
			$filters[$filter_id]['simple_link']    = !empty($simple_link)? true : false;
			$filters[$filter_id]['ranges']         = $tmp_ranges;
			$filters[$filter_id]['other_variants'] = $tmp_other_variants;
		}
	}

	return array($filters, $view_all);
}

function fn_se_generate_facet_xml($filter_data)
{
	$filter_fields = fn_get_product_filter_fields();

	// Parse filter type if come from update filter
	if (!empty($filter_data['filter_type'])) {
		if ((strpos($filter_data['filter_type'], 'FF-') === 0 || strpos($filter_data['filter_type'], 'RF-') === 0 || strpos($filter_data['filter_type'], 'DF-') === 0)) {
			$filter_data['feature_id'] = str_replace(array('RF-', 'FF-', 'DF-'), '', $filter_data['filter_type']);
		} else {
			$filter_data['field_type'] = str_replace(array('R-', 'B-'), '', $filter_data['filter_type']);
		}
	}

	$entry = "<entry>\n";
	$entry .= "<title><![CDATA[{$filter_data['filter']}]]></title>\n";
	$entry .= "<cs:position>{$filter_data['position']}</cs:position>\n";

	if (!empty($filter_data['feature_id'])) {
		$entry .= "<cs:attribute>feature_{$filter_data['feature_id']}</cs:attribute>\n";

	} else if(!empty($filter_data['field_type']) && $filter_data['field_type'] == 'P') {
		$entry .= "<cs:attribute>price</cs:attribute>\n";

	} else if(!empty($filter_data['field_type']) && $filter_data['field_type'] == 'F') {
		$entry .= "<cs:attribute>free_shipping</cs:attribute>\n";

	} else if(!empty($filter_data['field_type']) && $filter_data['field_type'] == 'S') {
		$entry .= "<cs:attribute>company_id</cs:attribute>\n";

	} else if(!empty($filter_data['field_type']) && $filter_data['field_type'] == 'A') {
		$entry .= "<cs:attribute>amount</cs:attribute>\n";
	} else {
		return false; //unknown attribute
	}

	if ((!empty($filter_data['feature_type']) && strpos('ODN', $filter_data['feature_type']) !== false) || (!empty($filter_data['field_type']) && !empty($filter_fields[$filter_data['field_type']]['is_range']))) {
		$entry .= "<cs:ranges>\n";

		foreach ($filter_data['ranges'] as $k => $r) {

			if (!empty($filter_data['feature_type']) && $filter_data['feature_type'] == 'D' && !empty($filter_data['dates_ranges'][$k])) {
				$r['to'] = fn_parse_date($filter_data['dates_ranges'][$k]['to']);
				$r['from'] = fn_parse_date($filter_data['dates_ranges'][$k]['from']);
			}
			if (!empty($r['range_name'])) {
				$entry .= "<cs:range from=\"{$r['from']}\" to=\"{$r['to']}\" position=\"{$r['position']}\">{$r['range_name']}</cs:range>\n";
			}
		}
		$entry .= "</cs:ranges>\n";
	}

	$entry .= "</entry>\n";

	return $entry;
}

function fn_searchanise_send_filter_request($action, $data)
{
	$result = '';
	$xml_header = fn_se_get_xml_header();
	$xml_footer = fn_se_get_xml_footer();

	$languages = fn_se_get_languages();
	foreach ($languages as $lang_code) {
		$private_key = fn_se_get_private_key($lang_code);

		if ($action == 'facet_update') {
			$_data = fn_se_generate_facet_xml($data);

		} elseif ($action == 'facet_delete') {
			$_data = $data;
		}

		if (!empty($_data)) {
			fn_se_add_action($action, null, $_data, $lang_code);
		}

	}//foreach
}
function fn_searchanise_update_product_filter($filter_data, $filter_id)
{
	fn_searchanise_send_filter_request('facet_update', $filter_data);
}

function fn_searchanise_delete_product_filter($filter_id)
{
	$filter = db_get_row("SELECT * FROM ?:product_filters WHERE filter_id = ?i LIMIT 1", $filter_id);

	if (!empty($filter['feature_id'])) {
		$facet_attribute = 'feature_' . $filter['feature_id'];
	} elseif ($filter['field_type'] == 'P') {
		$facet_attribute = 'price';
	} elseif ($filter['field_type'] == 'F') {
		$facet_attribute = 'free_shipping';
	} elseif ($filter['field_type'] == 'S') {
		$facet_attribute = 'company_id';
	} elseif ($filter['field_type'] == 'A') {
		$facet_attribute = 'amount';
	} else {
		return false; //unknown attribute
	}

	$dublicate = db_get_field("SELECT count(*) FROM ?:product_filters WHERE feature_id = ?i AND field_type = ?s LIMIT 1", $filter['feature_id'], $filter['field_type']);

	if ($dublicate > 1) {
		return false; // we have dublicate filter => no request
	}

	fn_searchanise_send_filter_request('facet_delete', $facet_attribute);
}

function fn_se_get_xml_header()
{
	$xml_header = '<?xml version="1.0" encoding="UTF-8"?>
	<feed xmlns="http://www.w3.org/2005/Atom" xmlns:cs="http://searchanise.com/ns/1.0">
	<title>Searchanise data feed</title>
	<link rel="self" href="' . Registry::get('config.http_location') . '"/>
	<updated>' . date('c') . '</updated>
	<author><name>SIMTECH</name></author>
	<id>' . md5(Registry::get('config.http_location')) . '</id>';

	return $xml_header;
}

function fn_se_get_xml_footer()
{
	$xml_footer = '</feed>';
	return $xml_footer;
}

function fn_se_send_update_request($url_part, $private_key, $data)
{
	$params = array('private_key' => $private_key) + $data;

	Registry::set('log_cut', true);
	list(, $result) = fn_http_request('POST', SE_SERVICE_URL . $url_part, $params, array(), array(), SE_REQUEST_TIMEOUT);

	return fn_se_parse_response($result);
}

?>