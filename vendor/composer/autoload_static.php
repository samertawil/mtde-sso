<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4d11cd469001bc7882ef2b6c74b18488
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Mtde\\Sso\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Mtde\\Sso\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4d11cd469001bc7882ef2b6c74b18488::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4d11cd469001bc7882ef2b6c74b18488::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4d11cd469001bc7882ef2b6c74b18488::$classMap;

        }, null, ClassLoader::class);
    }
}