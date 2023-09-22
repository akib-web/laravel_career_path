<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd346be62bd0e57f995e3dcbbd108465d
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd346be62bd0e57f995e3dcbbd108465d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd346be62bd0e57f995e3dcbbd108465d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd346be62bd0e57f995e3dcbbd108465d::$classMap;

        }, null, ClassLoader::class);
    }
}
