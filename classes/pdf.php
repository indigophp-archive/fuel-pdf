<?php

namespace Pdf;

class PdfException extends \FuelException {}

class Pdf
{
	/**
	 * PDF driver forge.
	 *
	 * @param	string			$driver		Driver name
	 * @param	array			$config		Extra config array or the driver
	 * @return  PDF instance
	 */
	public static function forge($driver = 'tcpdf', array $config = array())
	{
		$class = '\\Pdf\\Pdf_' . ucfirst(strtolower($driver));

		if( ! class_exists($class, true))
		{
			throw new \FuelException('Could not find PDF driver: ' . $class);
		}

		return new $class($config);
	}

	/**
	 * class constructor
	 *
	 * @param	void
	 * @access	private
	 * @return	void
	 */
	final private function __construct() {}

}