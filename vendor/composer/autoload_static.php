<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit63bd1f5e9c16d2d5789c77d4e351fe0c
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PostViewCount\\Includes\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PostViewCount\\Includes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit63bd1f5e9c16d2d5789c77d4e351fe0c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit63bd1f5e9c16d2d5789c77d4e351fe0c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit63bd1f5e9c16d2d5789c77d4e351fe0c::$classMap;

        }, null, ClassLoader::class);
    }
}
