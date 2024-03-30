<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb1b2cf94b4247753b9f336b6fe238d5a
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PostViewCount\\Includes\\Classes\\' => 31,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PostViewCount\\Includes\\Classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes/classes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb1b2cf94b4247753b9f336b6fe238d5a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb1b2cf94b4247753b9f336b6fe238d5a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb1b2cf94b4247753b9f336b6fe238d5a::$classMap;

        }, null, ClassLoader::class);
    }
}
