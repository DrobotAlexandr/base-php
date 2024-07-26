<?php


namespace App\Services\Users;

use App\Models\Users\User;

class UsersService
{

    public static function getUsers(): array
    {
        return User::getUsers();
    }

    public static function getUser(): array
    {
        return User::getUser(1);
    }

}