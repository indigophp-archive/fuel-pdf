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
	'default'  => 'tcpdf',

	/**
	 * Driver configs
	 *
	 * You can specify different values for libraries here
	 */
	'drivers'  => array(
		'tcpdf' => array(
			'direction'   => 'ltr',
			'orientation' => 'P',
			'unit'        => 'mm',
			'format'      => 'A4',
			'unicode'     => true,
			'encoding'    => 'UTF-8',
			'diskcache'   => false,
			'pdfa'        => false,
		),
		'mpdf' => array(
			'mode'              => '',
			'format'            => 'A4',
			'default_font_size' => '',
			'default_font'      => '',
			'margin_left'       => 15,
			'margin_right'      => 15,
			'margin_top'        => 16,
			'margin_bottom'     => 16,
			'margin_header'     => 9,
			'margin_footer'     => 9,
			'orientation'       => 'P',
		),
	),
);