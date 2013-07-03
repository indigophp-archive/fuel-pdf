<?php

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
	* @param array $config driver config
	*/
	public function __construct(array $config = array())
	{
		$this->config = $config;
	}

	/**
	* Get a driver config setting.
	*
	* @param string $key the config key
	* @return mixed the config setting value
	*/
	public function get_config($key, $default = null)
	{
		return \Arr::get($this->config, $key, $default);
	}

	/**
	* Set a driver config setting.
	*
	* @param string $key the config key
	* @param mixed $value the new config value
	* @return object $this for chaining
	*/
	public function set_config($key, $value)
	{
		\Arr::set($this->config, $key, $value);

		return $this;
	}

	abstract public function init();


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