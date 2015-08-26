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
	
	//
	// Login mode
	//
	if ($mode == 'login') {

		$redirect_url = '';
		fn_set_hook('before_login', $_REQUEST, $redirect_url);

		if (!empty($redirect_url)) {
			return array(CONTROLLER_STATUS_OK, !empty($redirect_url) ? $redirect_url : $index_script);
		}

		$redirect_url = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $index_script;

		if (AREA != 'A') {
			if (Registry::get('settings.Image_verification.use_for_login') == 'Y' && fn_image_verification('login_' . $_REQUEST['form_name'], empty($_REQUEST['verification_answer']) ? '' : $_REQUEST['verification_answer']) == false) {
				$suffix = (strpos($_SERVER['HTTP_REFERER'], '?') !== false ? '&' : '?') . 'login_type=login' . (!empty($_REQUEST['return_url']) ? '&return_url=' . urlencode($_REQUEST['return_url']) : '');
				return array(CONTROLLER_STATUS_REDIRECT, "$_SERVER[HTTP_REFERER]$suffix");
			}
		}

		list($status, $user_data, $user_login, $password) = fn_auth_routines($_REQUEST, $auth);

		if ($status === false) {
			fn_save_post_data();
			$suffix = (strpos($_SERVER['HTTP_REFERER'], '?') !== false ? '&' : '?') . 'login_type=login' . (!empty($_REQUEST['return_url']) ? '&return_url=' . urlencode($_REQUEST['return_url']) : '');
			return array(CONTROLLER_STATUS_REDIRECT, "$_SERVER[HTTP_REFERER]$suffix");
		}

		//
		// Success login
		//
		if (!empty($user_data) && !empty($password) && md5($password) == $user_data['password']) {
			
			// Regenerate session_id for security reasons
			Session::regenerate_id();
			
			//
			// If customer placed orders before login, assign these orders to this account
			//
			if (!empty($auth['order_ids'])) {
				foreach ($auth['order_ids'] as $k => $v) {
					db_query("UPDATE ?:orders SET ?u WHERE order_id = ?i", array('user_id' => $user_data['user_id']), $v);
				}
			}

			fn_login_user($user_data['user_id']);

			$uc_settings = fn_get_settings('Upgrade_center');
			
			$data = '';
			if (!empty($uc_settings['license_number'])) {
				// We need to linking store with helpdesk
				$token = fn_crc32(microtime());
				fn_set_setting_value('hd_request_code', $token);
				
				$request = array(
					'Request@action=check_license' => array(
						'token' => $token,
						'license_number' => $uc_settings['license_number'],
						'ver' => PRODUCT_VERSION,
						'store_uri' => fn_url('', 'C', 'http'),
						'secure_store_uri' => fn_url('', 'C', 'https'),
						'https_enabled' => (Registry::get('settings.General.secure_checkout') == 'Y' || Registry::get('settings.General.secure_admin') == 'Y' || Registry::get('settings.General.secure_auth') == 'Y') ? 'Y' : 'N',
					),
				);
				
				$request = '<?xml version="1.0" encoding="UTF-8"?>' . fn_array_to_xml($request);
				
				list($header, $data) = fn_https_request('GET', $uc_settings['updates_server'] . '/index.php?dispatch=product_updates.check_available&request=' . urlencode($request), array(), '&', '', '', '', '', '', '', array(), 10);
				
				if (empty($header)) {
					$data = fn_get_contents($uc_settings['updates_server'] . '/index.php?dispatch=product_updates.check_available&request=' . urlencode($request));
				}
			}
			
			$updates = '';
			$messages = '';
			
			if (!empty($data)) {
				// Check if we can parse server response
				if (strpos($data, '<?xml') !== false) {
					$data = simplexml_load_string($data);
					$updates = (string) $data->Updates;
					$messages = $data->Messages;
					$data = (string) $data->License;
				}
			}
			
			// Set system notifications
			if (Registry::get('config.demo_mode') != true && AREA == 'A' && !defined('DEVELOPMENT')) {

				// If username equals to the password
				if ($password == $user_data['user_login']) {
					$msg = fn_get_lang_var('warning_insecure_password');
					$msg = str_replace('[link]', fn_url('profiles.update'), $msg);
					fn_set_notification('E', fn_get_lang_var('warning'), $msg, 'S', 'insecure_password');
				}
				if (empty($auth['company_id']) && !empty($auth['user_id'])) {
					// Insecure admin script
					if (Registry::get('config.admin_index') == 'admin.php') {
						fn_set_notification('E', fn_get_lang_var('warning'), fn_get_lang_var('warning_insecure_admin_script'), 'S');
					}
					
					fn_helpdesk_process_messages($messages);
					
					if (Registry::get('settings.General.auto_check_updates') == 'Y' && fn_check_user_access($auth['user_id'], 'upgrade_store')) {
						// If upgrades available
						if ($updates == 'AVAILABLE') {
							$msg = fn_get_lang_var('text_upgrade_available');
							$msg = str_replace('[link]', fn_url('upgrade_center.manage'), $msg);
							fn_set_notification('W', fn_get_lang_var('notice'), $msg, 'S', 'upgrade_center');
						}
					}

					fn_set_hook('set_admin_notification', $auth);
				}
			}

			if (!empty($_REQUEST['remember_me'])) {
				fn_set_session_data(AREA_NAME . '_user_id', $user_data['user_id'], COOKIE_ALIVE_TIME);
				fn_set_session_data(AREA_NAME . '_password', $user_data['password'], COOKIE_ALIVE_TIME);
			}

			// Set last login time
			db_query("UPDATE ?:users SET ?u WHERE user_id = ?i", array('last_login' => TIME), $user_data['user_id']);

			$_SESSION['auth']['this_login'] = TIME;
			$_SESSION['auth']['ip'] = $_SERVER['REMOTE_ADDR'];

			// Log user successful login
			fn_log_event('users', 'session', array(
				'user_id' => $user_data['user_id']
			));

			if (defined('AJAX_REQUEST') && Registry::get('settings.General.checkout_style') != 'multi_page') {
				$redirect_url = "checkout.checkout";
			} elseif (!empty($_REQUEST['return_url'])) {
				$redirect_url = $_REQUEST['return_url'];
			}
		} else {
		//
		// Login incorrect
		//
			// Log user failed login
			fn_log_event('users', 'failed_login', array (
				'user' => $user_login
			));

			$auth = array();
			fn_set_notification('E', fn_get_lang_var('error'), fn_get_lang_var('error_incorrect_login'));
			$suffix = (strpos($_SERVER['HTTP_REFERER'], '?') !== false ? '&' : '?') . 'login_type=login' . (!empty($_REQUEST['return_url']) ? '&return_url=' . urlencode($_REQUEST['return_url']) : '');
			return array(CONTROLLER_STATUS_REDIRECT, "$_SERVER[HTTP_REFERER]$suffix");
		}

		unset($_SESSION['edit_step']);
		
		if (isset($data)) {
			$_SESSION['last_status'] = base64_encode($auth['user_id'] . ':' . $data);
		}
	
		if (!empty($_REQUEST['checkout_login']) && $_REQUEST['checkout_login'] == 'Y') {
			$profiles_num = db_get_field("SELECT COUNT(*) FROM ?:user_profiles WHERE user_id = ?i", $auth['user_id']);
			if ($profiles_num > 1 && Registry::get('settings.General.user_multiple_profiles') == 'Y') {
				$redirect_url = "checkout.customer_info";
			} else {
				$redirect_url = "checkout.checkout";
			}
		}

	}

	//
	// Recover password mode
	//
	if ($mode == 'recover_password') {

		if (!empty($_REQUEST['user_email'])) {

			$u_data = db_get_row("SELECT ?:users.user_id, ?:users.company_id, ?:users.email, ?:users.lang_code, ?:users.user_type FROM ?:users WHERE email = ?s", $_REQUEST['user_email']);

			if (!empty($u_data['email'])) {
				$_data = array (
					'object_id' => $u_data['user_id'],
					'object_type' => 'U',
					'ekey' => md5(uniqid(rand())),
					'ttl' => strtotime("+1 day")
				);

				db_query("REPLACE INTO ?:ekeys ?e", $_data);

				if ($u_data['user_type'] == 'A') {
					$zone = fn_get_account_type($u_data);
				} else {
					$zone = 'C';
				}

				$view_mail->assign('index_script', $u_data['user_type'] == 'A' ? Registry::get('config.admin_index') : Registry::get('config.customer_index'));
				$view_mail->assign('ekey', $_data['ekey']);
				$view_mail->assign('zone', $zone);

				fn_send_mail($u_data['email'], Registry::get('settings.Company.company_users_department'), 'profiles/recover_password_subj.tpl','profiles/recover_password.tpl', '', $u_data['lang_code']);

				fn_set_notification('N', fn_get_lang_var('information'), fn_get_lang_var('text_password_recovery_instructions_sent'));

			} else {
				fn_set_notification('E', fn_get_lang_var('error'), fn_get_lang_var('error_login_not_exists'));
				$redirect_url = "auth.recover_password";
			}
		} else {
			fn_set_notification('E', fn_get_lang_var('error'), fn_get_lang_var('error_login_not_exists'));
			$redirect_url = "auth.recover_password";
		}

	}

	return array(CONTROLLER_STATUS_OK, !empty($redirect_url)? $redirect_url : $index_script);
}

//
// Perform user log out
//
if ($mode == 'logout') {

	// Regenerate session_id for security reasons
	Session::regenerate_id();
	
	fn_save_cart_content($_SESSION['cart'], $auth['user_id']);

	$auth = $_SESSION['auth'];

	if (!empty($auth['user_id'])) {
		// Log user logout
		fn_log_event('users', 'session', array(
			'user_id' => $auth['user_id'],
			'time' => TIME - $auth['this_login'],
			'timeout' => false
		));
	}

	unset($_SESSION['auth']);
	fn_clear_cart($_SESSION['cart'], false, true);

	fn_delete_session_data(AREA_NAME . '_user_id', AREA_NAME . '_password');

	unset($_SESSION['product_notifications']);

	return array(CONTROLLER_STATUS_OK, $index_script);
}

//
// Recover password mode
//
if ($mode == 'recover_password') {

	// Cleanup expired keys
	db_query("DELETE FROM ?:ekeys WHERE ttl > 0 AND ttl < ?i", TIME); // FIXME: should be moved to another place

	if (!empty($_REQUEST['ekey'])) {
		$u_id = db_get_field("SELECT object_id FROM ?:ekeys WHERE ekey = ?s AND object_type = 'U' AND ttl > ?i", $_REQUEST['ekey'], TIME);
		if (!empty($u_id)) {
			
			// Delete this key
			db_query("DELETE FROM ?:ekeys WHERE ekey = ?s", $_REQUEST['ekey']);
			
			$user_status = fn_login_user($u_id);

			if ($user_status == LOGIN_STATUS_OK) {
				fn_set_notification('N', fn_get_lang_var('notice'), fn_get_lang_var('text_change_password'));
				return array(CONTROLLER_STATUS_OK, "profiles.update");
			} else {
				fn_set_notification('E', fn_get_lang_var('error'), fn_get_lang_var('error_account_disabled'));
				return array(CONTROLLER_STATUS_OK, $index_script);
			}
		} else {
			fn_set_notification('E', fn_get_lang_var('error'), fn_get_lang_var('text_ekey_not_valid'));
			return array(CONTROLLER_STATUS_OK, "auth.recover_password");
		}
	}

	fn_add_breadcrumb(fn_get_lang_var('recover_password'));
}

//
// Display login form in the mainbox
//
if ($mode == 'login_form') {
	if (defined('AJAX_REQUEST') && empty($auth)) {
		exit;
	}

	if (!empty($auth['user_id'])) {
		return array(CONTROLLER_STATUS_REDIRECT, $index_script);
	}

	fn_add_breadcrumb(fn_get_lang_var('my_account'));

} elseif ($mode == 'password_change' && AREA == 'A') {
	if (defined('AJAX_REQUEST') && empty($auth)) {
		exit;
	}

	if (empty($auth['user_id'])) {
		return array(CONTROLLER_STATUS_REDIRECT, $index_script);
	}

	fn_add_breadcrumb(fn_get_lang_var('my_account'));

	$profile_id = 0;
	$user_data = fn_get_user_info($auth['user_id'], true, $profile_id);
	
	$view->assign('user_data', $user_data);
	$view->assign('view_mode', 'simple');
	
} elseif ($mode == 'change_login') {
	$auth = $_SESSION['auth'];

	if (!empty($auth['user_id'])) {
		// Log user logout
		fn_log_event('users', 'session', array(
			'user_id' => $auth['user_id'],
			'time' => TIME - $auth['this_login'],
			'timeout' => false
		));
	}

	unset($_SESSION['auth'], $_SESSION['cart']['user_data']);

	fn_delete_session_data(AREA_NAME . '_user_id', AREA_NAME . '_password');

	return array(CONTROLLER_STATUS_OK, 'checkout.checkout');
}

function fn_auth_routines($request, $auth)
{
	$status = true;

	$user_login = (!empty($request['user_login'])) ? $request['user_login'] : '';
	$password = (!empty($_POST['password'])) ? $_POST['password']: '';
	$field = (Registry::get('settings.General.use_email_as_login') == 'Y') ? 'email' : 'user_login';

	$user_data = db_get_row("SELECT * FROM ?:users WHERE $field = ?s", $user_login);

	if (!empty($user_data)) {
		$user_data['usergroups'] = fn_get_user_usergroups($user_data['user_id']); 
	}
	
	if (!empty($user_data['user_type']) && $user_data['user_type'] != 'A' && AREA == 'A') {
		fn_set_notification('E', fn_get_lang_var('error'), fn_get_lang_var('error_area_access_denied'));
		$status = false;
	}

	if ((!empty($user_data['company_id']) && ACCOUNT_TYPE == 'admin') || (empty($user_data['company_id']) && ACCOUNT_TYPE == 'vendor')) {
		fn_set_notification('E', fn_get_lang_var('error'), fn_get_lang_var('error_area_access_denied'));
		$status = false;
	}

	if (!empty($user_data['status']) && $user_data['status'] == 'D') {
		fn_set_notification('E', fn_get_lang_var('error'), fn_get_lang_var('error_account_disabled'));
		$status = false;
	}

	return array($status, $user_data, $user_login, $password);
}
?>