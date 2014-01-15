<?php
/**
 * Fuel PDF
 *
 * @package 	Fuel
 * @subpackage	Pdf
 * @version		1.0
 * @author 		Márk Sági-Kazár <mark.sagikazar@gmail.com>
 * @license 	MIT License
 * @link 		https://indigophp.com
 */

namespace Pdf;

use Indigo\Pdf\Adapter\AdapterInterface as PdfInterface;

class Pdf
{
	/**
	 * Array of PdfInterface instances
	 *
	 * @var array
	 */
	protected static $_instances = array();

	/**
	 * Init
	 */
	public static function _init()
	{
		\Config::load('pdf', true);
	}

	/**
	 * Forge and return new instance
	 *
	 * @param  string       $instance Instance name
	 * @param  PdfInterface $object   Object instance if not exists
	 * @return PdfInterface
	 */
	public static function forge($instance = null, PdfInterface $object = null)
	{
		is_null($instance) and $instance = \Config::get('pdf.default');
		is_null($object) and $object = \Config::get('pdf.instances.' . $instance);

		if (is_null($object) or ! $object instanceof PdfInterface)
		{
			throw new \InvalidArgumentException('There is no valid PDF Adapter object');
		}

		return static::$_instances[$instance] = $object;
	}

	/**
	 * Return or forge an instance
	 *
	 * @param  string $instance Instance name
	 * @return PdfInterface
	 */
	public static function instance($instance = null)
	{
		if (array_key_exists($instance, static::$_instances))
		{
			$instance = static::$_instances[$instance];
		}
		else
		{
			$instance = static::forge($instance);
		}

		return $instance;
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
