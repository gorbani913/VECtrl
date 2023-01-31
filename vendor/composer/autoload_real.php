<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit22e6e306f9be5954708f5d1c414c8eef
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

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit22e6e306f9be5954708f5d1c414c8eef', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit22e6e306f9be5954708f5d1c414c8eef', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit22e6e306f9be5954708f5d1c414c8eef::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}