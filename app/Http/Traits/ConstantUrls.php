<?php

namespace App\Http\Traits;

trait ConstantUrls
{
    public static function ApiUser($id = null)
    {
        if ($id) {
            return 'http://127.0.0.1:8080/api/user/' . $id;
        }

        return 'http://127.0.0.1:8080/api/user';
    }
}
