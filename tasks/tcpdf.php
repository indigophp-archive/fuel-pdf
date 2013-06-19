<?php

namespace Fuel\Tasks;

class Tcpdf
{

	public function run($fonts = null)
	{
		if (\Cli::option('help', \Cli::option('h')))
		{
			return static::help();
		}

		$pdf = new \TCPDF();

		$type     = \Cli::option('type', \Cli::option('t', ''));
		$enc      = \Cli::option('enc', \Cli::option('e', ''));
		$flags    = \Cli::option('flags', \Cli::option('f', 32));
		$outpath  = \Cli::option('outpath', \Cli::option('o', K_PATH_FONTS));
		$platid   = \Cli::option('platid', \Cli::option('p', 3));
		$encid    = \Cli::option('encid', \Cli::option('n', 1));
		$addcbbox = \Cli::option('addcbbox', \Cli::option('b', false));
		$link     = \Cli::option('link', \Cli::option('l', false));

		if (empty($fonts))
		{
			return \Cli::error(\Cli::color('No font given.', 'red'));
		}

		$fonts = explode(',' ,$fonts);

		foreach ($fonts as $font)
		{
			$fontfile = realpath($font);
			$fontname = \TCPDF_FONTS::addTTFfont($fontfile, $type, $enc, $flags, $outpath, $platid, $encid, $addcbbox, $link);

			if ($fontname == false)
			{
				$errors = true;
				\Cli::error(\Cli::color($font . ' cannot be added.', 'red'));
			}
			else
			{
				\Cli::write(\Cli::color($font . ' added.', 'green'));
			}
		}

		if (!empty($errors)) {
			\Cli::error(\Cli::color('Process finished with errors.', 'red'));
		}
		else
		{
			\Cli::write(\Cli::color('Process successfully finished.', 'green'));
		}
	}

	public static function help()
	{
			$help = <<<EOD
TCPDF AddFont - command line tool to convert fonts for the TCPDF library.

Usage: oil r tcpdf fontfile[,fontfile] [ options ]

Options:

	-t
	--type      Font type. Leave empty for autodetect mode.
	            Valid values are:
					TrueTypeUnicode
					TrueType
					Type1
					CID0JP = CID-0 Japanese
					CID0KR = CID-0 Korean
					CID0CS = CID-0 Chinese Simplified
					CID0CT = CID-0 Chinese Traditional

	-e
	--enc       Name of the encoding table to use. Leave empty for
	            default mode. Omit this parameter for TrueType Unicode
	            and symbolic fonts like Symbol or ZapfDingBats.

	-f
	--flags     Unsigned 32-bit integer containing flags specifying
	            various characteristics of the font (PDF32000:2008 -
	            9.8.2 Font Descriptor Flags): +1 for fixed font; +4 for
	            symbol or +32 for non-symbol; +64 for italic. Fixed and
	            Italic mode are generally autodetected so you have to
	            set it to 32 = non-symbolic font (default) or 4 =
	            symbolic font.

	-o
	--outpath   Output path for generated font files (must be writeable
	            by the web server). Leave empty for default font folder.

	-p
	--platid    Platform ID for CMAP table to extract (when building a
	            Unicode font for Windows this value should be 3, for
	            Macintosh should be 1).

	-n
	--encid     Encoding ID for CMAP table to extract (when building a
	            Unicode font for Windows this value should be 1, for
	            Macintosh should be 0). When Platform ID is 3, legal
	            values for Encoding ID are: 0=Symbol, 1=Unicode,
	            2=ShiftJIS, 3=PRC, 4=Big5, 5=Wansung, 6=Johab,
	            7=Reserved, 8=Reserved, 9=Reserved, 10=UCS-4.

	-b
	--addcbbox  Includes the character bounding box information on the
	            php font file.

	-l
	--link      Link to system font instead of copying the font data #
	            (not transportable) - Note: do not work with Type1 fonts.

	-h
	--help      Display this help and exit.
EOD;

	\Cli::write($help);
	}
}