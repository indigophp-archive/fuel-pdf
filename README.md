# Fuel PDF package

**Fuel wrapper for [Indigo PDF](https://github.com/indigophp/pdf)**


## Install

Via Composer

``` json
{
    "require": {
        "indigophp/fuel-pdf": "dev-master"
    }
}
```


## Configuration

``` php
return array(
    'instances' => array(
        'default' => function () {
            $options = array(
                'orientation' => 'P',
            );

            $config = array(
                'a_meta_charset'  => 'UTF-8',
                'a_meta_dir'      => 'ltr',
                'a_meta_language' => 'en',
                'w_page'          => 'page',
            );

            return new Indigo\Pdf\Adapter\TcpdfAdapter($options, $config);
        },
        'advanced' => function () {
            $options = array(
                'orientation' => 'P',
            );

            $config = array(
                'bin' => '/usr/bin/wkhtmltopdf',
                'tmp' => sys_get_temp_dir(),
            );

            return new Indigo\Pdf\Adapter\WkhtmltopdfAdapter($options, $config);
        }
    ),
    'default' => 'default',
);
```


## Usage

``` php
$pdf = \Pdf::forge('default');

// Later in your code
$pdf = \Pdf::instance('default');
```


## Advanced usage

``` php
$options = array(
    'orientation' => 'P',
);

$config = array(
    'bin' => '/usr/bin/wkhtmltopdf',
    'tmp' => sys_get_temp_dir(),
);

$instance = Indigo\Pdf\Adapter\Wkhtmltopdf($options, $default);

$pdf = \Pdf::forge('non_existent', $instance);

// Later in your code
$pdf = \Pdf::instance('non_existent');
```


## Credits

- [Márk Sági-Kazár](https://github.com/sagikazarmark)
- [All Contributors](https://github.com/indigophp/pdf/contributors)


## License

The MIT License (MIT). Please see [License File](https://github.com/indigophp/pdf/blob/develop/LICENSE) for more information.