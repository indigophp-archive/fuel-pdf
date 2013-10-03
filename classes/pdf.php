<?php
/**
 * Fuel PDF
 *
 * @package 	Fuel
 * @subpackage	Pdf
 * @version		1.1
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
	 * @param	array	$config		Extra config array or the driver name
	 * @return	object				Pdf_Driver
	 */
	public static function forge($config = array())
	{
		// When a string was passed it's just the driver type
		if (is_string($config))
		{
			$driver = $config;
			$config = array();
		}

		// Get driver if not set, get it from config
		empty($driver) and $driver = \Arr::get($config, 'driver', \Config::get('pdf.driver', 'tcpdf'));

		$class = '\\Pdf\\Pdf_' . ucfirst(strtolower($driver));

		if( ! class_exists($class, true))
		{
			throw new \FuelException('Could not find PDF driver: ' . $class);
		}

		$config = \Arr::merge(static::$_defaults, \Config::get('pdf.drivers.' . $driver, array()), $config);

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