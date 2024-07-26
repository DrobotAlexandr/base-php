<?php

\BasePhp\Interaction\Api::runMethod(function () {

    return App\Services\Users\UsersService::getUsers();

});