<?php

namespace BasePhp\Http;

class Response
{
    public static function json(array $data): void
    {

        $data['version'] = self::json__getVersion($data);

        header('Content-type: application/json;');
        $json = json_encode($data, JSON_UNESCAPED_UNICODE);
        print $json;
        exit();
    }

    private static function json__getVersion(array $data): string
    {
        if (!$data) {
            $data = '';
        }

        $version = md5(serialize($data));

        return md5(
            count($data) . $version
        );

    }


}