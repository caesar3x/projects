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



if ( !defined('AREA') )	{ die('Access denied');	}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if ($mode == 'add') {

		foreach ($_REQUEST['usergroup_data'] as $k => $v) {
			if (defined('RESTRICTED_ADMIN') && $v['type'] == 'A') {
				fn_set_notification('E', fn_get_lang_var('error'), fn_get_lang_var('access_denied'));
				continue;
			}
			if (!empty($v['usergroup'])) {
				fn_se_queue_import();
			}
		}
	}
}

?>