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

class Pdf_Tcpdf extends Pdf_Driver
{
	protected function init()
	{
		\Lang::load('tcpdf');
		$lang = array(
			'a_meta_charset'  => \Config::get('encoding', 'UTF-8'),
			'a_meta_dir'      => $this->get_config('direction', 'ltr'),
			'a_meta_language' => \Config::get('language', 'en'),
			'w_page'          => \Lang::get('tcpdf.w_page', array(), 'page')
		);

		$config = $this->get_config(array('orientation', 'unit', 'format', 'unicode', 'encoding', 'diskcache', 'pdfa'));

		$pdf = new \ReflectionClass('\TCPDF');
		$pdf = $pdf->newInstanceArgs($config);

		$pdf->setLanguageArray($lang);

		return $pdf;
	}
}
