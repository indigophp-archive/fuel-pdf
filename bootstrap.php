<?php
/**
 * Fuel PDF
 *
 * @package     Fuel
 * @subpackage  Pdf
 * @version     1.0
 * @author      Márk Sági-Kazár <mark.sagikazar@gmail.com>
 * @license     MIT License
 * @link        https://indigophp.com
 */

Autoloader::add_core_namespace('Pdf');

Autoloader::add_classes(array(
    'Pdf\\Pdf' => __DIR__ . '/classes/pdf.php',
));
