<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit63bd1f5e9c16d2d5789c77d4e351fe0c
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit63bd1f5e9c16d2d5789c77d4e351fe0c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit63bd1f5e9c16d2d5789c77d4e351fe0c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit63bd1f5e9c16d2d5789c77d4e351fe0c::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}