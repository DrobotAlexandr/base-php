<?php

namespace BasePhp\Boot;

class Loader
{
    public static function loadClasses(): void
    {
        spl_autoload_register('autoload__App');

        function autoload__App(string $className): void
        {
            if (!str_contains('--' . $className, '--App\\') and !str_contains('--' . $className, '--\\App\\')) {
                return;
            }

            $classPath = __DIR__ . '/../app/' . strtr($className, ['\\' => '/', 'App\\' => '']) . '.php';

            if (file_exists($classPath) and !class_exists($className)) {
                require $classPath;
            }

        }
    }

    public static function loadFunctions(): void
    {
        require_once '../../functions/dd.php';
    }

}