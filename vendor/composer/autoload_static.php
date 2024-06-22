<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3949fdeb7e7b810a6e649499a88b388a
{
    public static $files = array (
        '3f0460b8b8adb9f001cc0e0f4e09593e' => __DIR__ . '/../..' . '/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Src\\' => 4,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit3949fdeb7e7b810a6e649499a88b388a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3949fdeb7e7b810a6e649499a88b388a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3949fdeb7e7b810a6e649499a88b388a::$classMap;

        }, null, ClassLoader::class);
    }
}