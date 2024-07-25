<?php

namespace BasePhp\Boot;

class Loader
{
    public static function loadClasses(): void
    {
        spl_autoload_register('BasePhp\Boot\Loader::loadClasses__loadAppNamespace');
        spl_autoload_register('BasePhp\Boot\Loader::loadClasses__loadBaseNamespace');
    }

    public static function loadClasses__loadAppNamespace(string $className): void
    {
        if (!str_contains('--' . $className, '--App\\') and !str_contains('--' . $className, '--\\App\\')) {
            return;
        }

        $classPath = __DIR__ . '/../app/' . strtr($className, ['\\' => '/', 'App\\' => '']) . '.php';

        if (file_exists($classPath) and !class_exists($className)) {
            require $classPath;
        }

    }

    public static function loadClasses__loadBaseNamespace(string $className): void
    {
        if (!str_contains('--' . $className, '--BasePhp\\') and !str_contains('--' . $className, '--\\BasePhp\\')) {
            return;
        }

        $classPath = __DIR__ . '/../' . strtr($className, ['\\' => '/', 'BasePhp\\' => '']) . '.php';

        if (file_exists($classPath) and !class_exists($className)) {
            require $classPath;
        }

    }

    public static function loadFunctions(): void
    {
        require_once __DIR__ . '/../../functions/dd.php';
    }

}