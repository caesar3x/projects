<?php
/***************************************************************************
*                                                                          *

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

define('AREA', 'C');
define('AREA_NAME', 'customer');

require dirname(__FILE__) . '/prepare.php';
require dirname(__FILE__) . '/init.php';

define('INDEX_SCRIPT',  Registry::get('config.customer_index'));

fn_dispatch();

?>