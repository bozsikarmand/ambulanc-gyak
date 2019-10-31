<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb9a3f9ccba42fe454b1f104ce7d58544
{
    public static $prefixLengthsPsr4 = array (
        'k' => 
        array (
            'kartik\\plugins\\strengthmeter\\' => 29,
            'kartik\\plugins\\fileinput\\' => 25,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'kartik\\plugins\\strengthmeter\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/strength-meter',
        ),
        'kartik\\plugins\\fileinput\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/bootstrap-fileinput',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Bulletproof\\Image' => __DIR__ . '/..' . '/samayo/bulletproof/src/bulletproof.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb9a3f9ccba42fe454b1f104ce7d58544::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb9a3f9ccba42fe454b1f104ce7d58544::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb9a3f9ccba42fe454b1f104ce7d58544::$classMap;

        }, null, ClassLoader::class);
    }
}
