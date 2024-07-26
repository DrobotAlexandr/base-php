<?php

namespace BasePhp\Config;

use BasePhp\Http\Response;

class Config
{
    public function getConfig(string $configName): array
    {
        if (file_exists(__DIR__ . '/../../../config/' . $configName . '.php')) {
            return include __DIR__ . '/../../../config/' . $configName . '.php';
        }

        return [];
    }
}