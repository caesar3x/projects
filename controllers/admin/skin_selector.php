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


//
// $Id$
//

if ( !defined('AREA') )	{ die('Access denied');	}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if ($mode == 'update') {

		if (is_array($_REQUEST['skin_data'])) {
			$install_skins = fn_get_install_skins($_REQUEST['skin_data']);
			
			fn_set_progress('parts', sizeof($install_skins));
			
			foreach ($_REQUEST['skin_data'] as $zone => $skin) {
				$error = false;
				
				if (!empty($install_skins[$zone])) {
					fn_set_progress('total', fn_dirs_count(DIR_ROOT . '/var/skins_repository/base') + fn_dirs_count(DIR_ROOT . '/var/skins_repository/' . $skin));
					
					$error = fn_install_skin($zone, $skin);
				}
				
				if (!$error) {
					fn_rm(DIR_COMPILED);
					fn_set_setting_value('skin_name_' . $zone, array('value' => $skin));
				}
			}
		}
	}

	return array(CONTROLLER_STATUS_OK, 'skin_selector.manage');
}

if ($mode == 'manage') {
	$view->assign('available_skins', fn_get_available_skins());
	
	$view->assign('customer_path', 'skins/' . Registry::get('settings.skin_name_customer') . '/customer');
	$view->assign('admin_path', 'skins/' . Registry::get('settings.skin_name_admin') . '/admin');
}


function fn_dirs_count($path)
{
	$dirscount	= 0;
	$dir = opendir($path);
	if (!$dir){
		return 0;
	}

	while (($file =	readdir($dir)) !== false) {
		if ($file == '.' || $file == '..'){
			continue;
		}

		if (is_dir($path . '/' . $file)) {
			$dirscount++;
			$dirscount += fn_dirs_count($path . '/' . $file);
		}
	}

	closedir($dir);
	return $dirscount;
}

function fn_get_install_skins($skins_data)
{
	$install_skins = array();
	
	foreach ($skins_data as $zone => $skin) {
		$source_skin = $skin;
		$destination_skin = DIR_SKINS . $skin;
		
		fn_set_hook('get_skin_path', $zone, $destination_skin);
		
		if (!is_dir($destination_skin) && is_dir(DIR_ROOT . '/var/skins_repository/' . $source_skin)) {
			
			if (file_exists(DIR_ROOT . '/var/skins_repository/' . $source_skin . '/' . SKIN_MANIFEST)) {
				$install_skins[$zone] = $source_skin;
			} else {
				fn_set_notification('E', fn_get_lang_var('error'), fn_get_lang_var('error_skin_manifest_missed'));
			}
		}
	}
	
	return $install_skins;
}

function fn_install_skin($zone, $skin)
{
	$source_skin = $skin;
	$destination_skin = DIR_SKINS . $skin;
	
	fn_set_hook('get_skin_path', $zone, $destination_skin);
	
	$error = false;
	if (fn_copy(DIR_ROOT . '/var/skins_repository/base', $destination_skin, false)) {
		fn_copy(DIR_ROOT . '/var/skins_repository/' . $source_skin, $destination_skin, false);

		$manifest = parse_ini_file(DIR_ROOT . '/var/skins_repository/' . $source_skin . '/' . SKIN_MANIFEST);
		if (empty($manifest['admin'])) {
			fn_rm($destination_skin . '/admin');
		}

	} else {
		$msg = fn_get_lang_var('text_cannot_create_directory');
		$msg = str_replace('[directory]', $destination_skin, $msg);
		fn_set_notification('E', fn_get_lang_var('error'), $msg);
		$error = true;
	}

	return $error;
}

?>