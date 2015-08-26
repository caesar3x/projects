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

if ( !defined('AREA') ) { die('Access denied'); }

class Counter
{
	private $position = 0;
	private $max_length;
	private $symbol;
	
	function __construct($count = 10, $symbol = '.')
	{
		$this->max_length = $count;
		$this->symbol = $symbol;
	}
	
	function Out()
	{
		if ($this->position > $this->max_length) {
			$this->position = 0;
			fn_echo('<br />');
		}
		
		fn_echo($this->symbol);
		
		$this->position++;
	}
	
	function Clear()
	{
		$this->position = 0;
	}
}

?>