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

class Pdf_Mpdf extends Pdf_Driver
{
	protected function _initialize($mode = '', $format = 'A4', $default_font_size = '', $default_font = '', $margin_left = 15, $margin_right = 15, $margin_top = 16, $margin_bottom = 16, $margin_header = 9, $margin_footer = 9, $orientation = 'P')
	{
		return new \mPDF($mode, $format, $default_font_size, $default_font, $margin_left, $margin_right, $margin_top, $margin_bottom, $margin_header, $margin_footer, $orientation);
	}
}
