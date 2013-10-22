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

Autoloader::add_core_namespace('Pdf');

Autoloader::add_classes(array(
	'Pdf\\Pdf'          => __DIR__ . '/classes/pdf.php',
	'Pdf\\PdfException' => __DIR__ . '/classes/pdf.php',
	'Pdf\\Pdf_Driver'   => __DIR__ . '/classes/pdf/driver.php',
	'Pdf\\Pdf_Tcpdf'    => __DIR__ . '/classes/pdf/tcpdf.php',
	'Pdf\\Pdf_Dompdf'   => __DIR__ . '/classes/pdf/dompdf.php',
	'Pdf\\Pdf_Mpdf'     => __DIR__ . '/classes/pdf/mpdf.php',
	'Pdf\\Pdf_Wkhtml'   => __DIR__ . '/classes/pdf/wkhtml.php',
));