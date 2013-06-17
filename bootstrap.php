<?php

Autoloader::add_core_namespace('Pdf');

Autoloader::add_classes(array(
	'Pdf\\Pdf' => __DIR__ . '/classes/pdf.php',
	'Pdf\\Pdf_Driver' => __DIR__ . '/classes/pdf/driver.php',
	'Pdf\\Pdf_Tcpdf' => __DIR__ . '/classes/pdf/tcpdf.php',

	'Pdf\\PdfException' => __DIR__ . '/classes/pdf.php',
));