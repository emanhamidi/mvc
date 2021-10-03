<?php

namespace App\Models;

use Core\DB;

class User
{
    public static function all()
    {
        $userRows = DB::get()->query('SELECT * FROM users')->fetchAll(\PDO::FETCH_ASSOC);
        $users = [];
        foreach ($userRows as $row) {
            $user = new User;
            foreach ($row as $key => $value) {
                if ($key != 'password') {
                    $user->$key = $value;
                }
            }
            $users[] = $user;
        }
        return $users;
    }
}
