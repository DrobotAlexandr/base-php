<?php

namespace BasePhp\Interaction;

use BasePhp\Http\Response;

class Guard
{
    public static function control(callable $callback): void
    {
        if (!$callback()) {

            $res = [
                'status' => 'error',
                'errorCode' => 'authorizationError',
                'errorMessage' => 'Ошибка авторизации!',
                'authLink' => '/login/',
            ];

            Response::json($res);
        }
    }
}