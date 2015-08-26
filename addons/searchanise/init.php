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

fn_register_hooks(
	'init_secure_controllers',
	'update_product_amount',
	'clone_product',
	'update_product',
	'global_update',
	'pre_delete_product',
	'import_after_process_data',
	'tools_change_status',
	'database_restore',
	'get_products_pre',
	'get_products_post',
	'update_product_filter',
	'delete_product_filter'
);

?>