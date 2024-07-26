<?php

namespace App\Models\Users;

use BasePhp\Database\Database;

class User
{
    public static function getUsers(): array
    {
        return Database::select('users', 'limit 100');
    }

    public static function getUser(int $id): array
    {
        return Database::select('users', 'where id=:id', ['id' => $id]);
    }

}