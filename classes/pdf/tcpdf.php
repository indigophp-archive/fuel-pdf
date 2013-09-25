<?php

namespace Pdf;

class Pdf_Tcpdf extends Pdf_Driver
{
	protected function _pdf($orientation = 'P', $unit = 'mm', $format = 'A4', $unicode = true, $encoding = 'UTF-8', $diskcache = false, $pdfa = false)
	{
		\Lang::load('tcpdf');
		\Config::load('tcpdf');
		$lang = array(
			'a_meta_charset'  => \Config::get('encoding', 'UTF-8'),
			'a_meta_dir'      => \Config::get('tcpdf.direction', 'ltr'),
			'a_meta_language' => \Config::get('language', 'en'),
			'w_page'          => \Lang::get('tcpdf.w_page', array(), 'page')
		);

		$pdf = new \TCPDF($orientation, $unit, $format, $unicode, $encoding, $diskcache, $pdfa);

		$pdf->setLanguageArray($lang);

		return $pdf;
	}
}