<?php

require 'vendor/autoload.php';

// set the barcode content and type
$barcodeobj = new TCPDFBarcode('http://www.tcpdf.org', 'C128');

// output the barcode as PNG image
$asd = $barcodeobj->getBarcodePNG(2, 30, array(0,0,0));