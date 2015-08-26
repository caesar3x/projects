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

class Logger
{
	private static $instance = NULL;

	public function __set($name, $value)
	{
		switch($name) {
			case 'logfile':
				if (!file_exists($value)) {
					$h = fopen($value, 'w');
					fclose($h);
				}

				if (!is_writeable($value)) {
					throw new Exception("$value is not a valid file path");
				}
				$this->logfile = $value;
				break;

			default:
				throw new Exception("$name cannot be set");
		}
	}

	public function write($message, $file=null, $line=null)
	{
		$message = time() .' - '.$message;
		$message .= is_null($file) ? '' : " in $file";
		$message .= is_null($line) ? '' : " on line $line";
		$message .= "\n";
		return file_put_contents( $this->logfile, $message, FILE_APPEND);
	}

	public static function getInstance()
	{
		if (!self::$instance) {
			self::$instance = new Logger;
		}
		return self::$instance;
	}

}

?>