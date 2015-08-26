<?php
/***************************************************************************
*                                                                          *
*    Copyright (c) 2009 Simbirsk Technologies Ltd. All rights reserved.    *
*                                                                          *
* This  is  commercial  software,  only  users  who have purchased a valid *
* license  and  accept  to the terms of the  License Agreement can install *
* and use this program.                                                    *
*                                                                          *
****************************************************************************
* PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
* "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
****************************************************************************/


//
// $Id$
//

if ( !defined('AREA') ) { die('Access denied'); }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	return;
}
if ($mode == 'update') {
	$page =  $view->get_var('page_data');
	$discussion = fn_get_discussion($_REQUEST['page_id'], 'A');	
	
	if (!empty($discussion) && $discussion['type'] != 'D' && $page['page_type'] != PAGE_TYPE_LINK) {
		Registry::set('navigation.tabs.discussion', array (
			'title' => fn_get_lang_var('discussion_title_page'),
			'js' => true
		));
		
		$view->assign('discussion', $discussion);
	}

} elseif ($mode == 'm_update') {
	if ($selected_fields['discussion_type'] == 'Y') {
		$field_names['discussion_type'] = fn_get_lang_var('discussion_title_page');
		$fields2update[] = 'discussion_type';
	}
}

?>
