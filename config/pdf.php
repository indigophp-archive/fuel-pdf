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

/**
 * NOTICE:
 *
 * If you need to make modifications to the default configuration, copy
 * this file to your app/config folder, and make them in there.
 *
 * This will allow you to upgrade fuel without losing your custom config.
 */

return array(
	/**
	 * Default driver settings
	 */
	'defaults' => array(),

	/**
	 * Default PDF library
	 */
	'driver'  => 'tcpdf',

	/**
	 * Driver configs
	 *
	 * You can specify different values for libraries here
	 */
	'drivers'  => array(
		'tcpdf' => array(
			'direction' => 'ltr',
		),
	),
);