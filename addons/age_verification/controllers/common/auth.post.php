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

if (!defined('AREA')) { die('Access denied');	}

if ($mode == 'login') {
	if (!empty($_SESSION['auth']['user_id'])) {
		$u_data = db_get_row("SELECT birthday, status FROM ?:users WHERE user_id = ?i", $_SESSION['auth']['user_id']);

		fn_age_verification_check_age($u_data);
	}
}

?>