<?php

namespace BasePhp\Config;

use BasePhp\Http\Response;

class Config
{
    public static function getConfig(string $configName, string $key = ''): array|string
    {
        $config = [];

        if (file_exists(__DIR__ . '/../../../config/' . $configName . '.php')) {
            $config = include __DIR__ . '/../../../config/' . $configName . '.php';
        }

        if ($key) {
            return $config[$key];
        }

        return $config;
    }
}