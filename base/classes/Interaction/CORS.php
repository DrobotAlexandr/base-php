<?php

namespace BasePhp\Interaction;
class CORS
{
    public static function set(callable $callback): void
    {
        $headers = $callback();

        if ($headers) {
            foreach ($headers as $header) {
                header($header);
            }
        }
    }
}