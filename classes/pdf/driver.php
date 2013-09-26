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

abstract class Pdf_Driver
{
	/**
	* Driver config
	* @var array
	*/
	protected $config = array();

	/**
	 * Driver instance
	 * @var mixed
	 */
	protected $instance = null;

	/**
	* Driver constructor
	*
	* @param	array	$config	driver config
	*/
	public function __construct(array $config = array())
	{
		$this->config = $config;
	}

	/**
	* Get a driver config setting.
	*
	* @param	string	$key		the config key
	* @param	mixed	$default	the default value
	* @return	mixed				the config setting value
	*/
	public function get_config($key, $default = null)
	{
		return \Arr::get($this->config, $key, $default);
	}

	/**
	* Set a driver config setting.
	*
	* @param	string|array	$key	Config key or array of key-value pairs
	* @param	mixed			$value	the new config value
	* @return	$this					$this for chaining
	*/
	public function set_config($key, $value = null)
	{
		if (is_array($key))
		{
			foreach ($key as $k => $v)
			{
				$this->set_config($k, $v);
			}
		}
		\Arr::set($this->config, $key, $value);

		return $this;
	}

	/**
	 * Initialize driver
	 *
	 * @return $this
	 */
	public function init()
	{
		$args = func_get_args();
		$this->instance = call_user_func_array(array($this, '_pdf'), $args);
		return $this;
	}

	/**
	 * Abstract function to load the driver
	 *
	 * @return mixed Driver instance
	 */
	abstract protected function _pdf();


	/**
	 * Magic functions catching non-existent functions/variables and passing them to the driver
	 */

	public function __call($method, $arguments)
	{
		if (method_exists($this->instance, $method))
		{
				$return = call_user_func_array(array($this->instance, $method), $arguments);
				return $return;
		}
		else
		{
			throw new \BadMethodCallException('Invalid method: '.get_called_class().'::'.$method);
		}
	}

	public function __get($name)
	{
		if (isset($this->{$name}))
		{
			return $this->{$name};
		}
		elseif(isset($this->instance->{$name}))
		{
			return $this->instance->{$name};
		}
		else
		{
			trigger_error('Undefined property: ' . get_called_class() . '::' . $name);
			return null;
		}
	}

	public function __set($name, $value)
	{
		if (isset($this->{$name})) {
			$this->{$name} = $value;
		}
		else
		{
			$this->instance->{$name} = $value;
		}
	}
}