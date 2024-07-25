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

        if ($endpointPath = self::getEndpointFilePath($url)) {

            Response::json(
                include $endpointPath
            );

        } else {

            Response::json(['status' => 'error', 'errorCode' => 'MethodNotExists']);

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
        $endpointPath = __DIR__ . '/../../../interaction/' . $url . '.php';

        if (!file_exists($endpointPath)) {
            return '';
        }

        return $endpointPath;
    }
}