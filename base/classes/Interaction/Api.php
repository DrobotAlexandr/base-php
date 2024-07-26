<?php

namespace BasePhp\Interaction;

use BasePhp\Http\Response;

class Api
{
    public static function loadEndpoint(string $url): void
    {

        if (self::getUrl($url, 1) != 'api') {
            return;
        }

        if ($endpointPath = self::getEndpointFilePath(self::getUrl($url))) {

            self::includeGuard($endpointPath);

            include $endpointPath;

        } else {

            Response::json(['status' => 'error', 'errorCode' => 'MethodNotExists']);

        }

    }

    private static function includeGuard(string $endpointPath): void
    {
        $directory = '';

        foreach (explode('/', $endpointPath) as $dir) {
            $directory .= $dir . '/';

            if (file_exists($directory . '/_guard.php')) {
                include_once $directory . '/_guard.php';
            }
        }
    }

    private static function getUrl(string $url, int $part = 0): string
    {
        $url = trim(explode('?', $url)[0]);

        if ($part) {
            return explode('/', $url)[$part];
        }

        return $url;
    }

    private static function getEndpointFilePath(string $url): string
    {
        $endpointPath = __DIR__ . '/../../../interaction/' . rtrim($url, '/') . '.php';

        if (!file_exists($endpointPath)) {
            return '';
        }

        return $endpointPath;
    }

    public static function runMethod($callback): void
    {
        Response::json(
            $callback()
        );
    }
}