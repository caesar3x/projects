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

$schema['products']['fillings']['bestsellers'] = array (
	'params' => array (
		'bestsellers' => true,
		'sales_amount_from' => 1,
		'sort_by' => 'sales_amount',
		'sort_order' => 'desc',
		'request' => array (
			'cid' => '%CATEGORY_ID'
		)
	),
);

?>