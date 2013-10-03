<?php
/**
 * Fuel PDF
 *
 * @package 	Fuel
 * @subpackage	Pdf
 * @version		1.0
 * @author 		Márk Sági-Kazár <sagikazarmark@gmail.com>
 * @license 	MIT License
 * @link 		https://github.com/indigo-soft
 */

namespace Pdf;

class PdfException extends \FuelException {}

class Pdf
{
	/**
	 * Default config
	 *
	 * @var array
	 */
	protected static $_defaults = array();

	/**
	 * Init
	 */
	public static function _init()
	{
		\Config::load('pdf', true);
		static::$_defaults = \Config::get('pdf.defaults', array());
	}

	/**
	 * PDF driver forge
	 *
	 * @param	array			$config		Extra config array or the driver
	 * @return	PDF instance
	 */
	public static function forge($config = array())
	{
		// When a string was passed it's just the driver type
		if ( ! empty($config) and ! is_array($config))
		{
			$driver = $config;
			$config = array();
		}

		// No driver type passed, so falling back to default
		isset($driver) or $driver = \Config::get('pdf.default', 'tcpdf');

		$driver = '\\Pdf\\Pdf_' . ucfirst(strtolower($driver));

		if( ! class_exists($driver, true))
		{
			throw new \FuelException('Could not find PDF driver: ' . $driver);
		}

		$config = \Arr::merge(static::$_defaults, \Config::get('pdf.drivers.' . $driver, array()), $config);

		return new $driver($config);
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