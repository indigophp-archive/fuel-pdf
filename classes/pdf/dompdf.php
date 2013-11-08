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

define('DOMPDF_ENABLE_AUTOLOAD', false);
require_once APPPATH . '../vendor/dompdf/dompdf/dompdf_config.inc.php';

class Pdf_Dompdf extends Pdf_Driver
{
	protected function _initialize()
	{
		return new \DOMPDF();
	}
}
