<?php


namespace App\Services\Users;

class UsersService
{

    public static function getUsers(): array
    {
        $users = [];

        $users[] = [
            'id' => 1,
            'name' => 'Jon'
        ];

        $users[] = [
            'id' => 2,
            'name' => 'Alex'
        ];

        return $users;
    }

    public static function getUser(): array
    {
        return [
            'id' => 1,
            'name' => 'Jon'
        ];
    }

}