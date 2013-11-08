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
	protected function init()
	{
		$config = $this->get_config(array('mode', 'format', 'default_font_size', 'default_font', 'margin_left', 'margin_right', 'margin_top', 'margin_bottom', 'margin_header', 'margin_footer', 'orientation'));
		$pdf = new \ReflectionClass('\mPDF');
		$pdf = $pdf->newInstanceArgs($config);
		return $pdf;
	}
}
