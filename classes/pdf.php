<?php

namespace Pdf;

class PdfException extends \FuelException {}

class Pdf
{

	public static function forge($driver, $config = array())
	{
		$class = '\\Pdf\\Pdf_' . ucfirst($driver);
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