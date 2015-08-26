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

function fn_settings_actions_addons_searchanise($new_value, $old_value)
{
	if ($new_value == 'A') {

		$options = Registry::get('addons.searchanise');

		if (empty($options['import_status'])) {
			$options = db_get_field("SELECT options FROM ?:addons WHERE addon = 'searchanise'");
			Registry::set('addons.searchanise', unserialize($options));
		}

		if (fn_se_signup() == true) {
			fn_se_queue_import();
		}
	}

	return true;
}

function fn_settings_actions_addons_post_searchanise($status)
{
	$options = Registry::get('addons.searchanise');

	if ($status == 'A' && !empty($options['import_status'])) {

		if (fn_se_signup() == true) {
			fn_se_queue_import();
		}
	}

	return true;
}

function fn_settings_actions_addons_post_seo(&$new_value, $old_value)
{
	fn_se_queue_import();

	return true;
}

?>