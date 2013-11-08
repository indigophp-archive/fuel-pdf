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

class Pdf_Wkhtml extends Pdf_Driver
{
	protected function init()
	{
		return new \WkHtmlToPdf($this->get_config());
	}
}
