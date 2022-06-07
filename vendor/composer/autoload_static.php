<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdb7e47435a9507b937f79a31785e114d
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdb7e47435a9507b937f79a31785e114d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdb7e47435a9507b937f79a31785e114d::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}