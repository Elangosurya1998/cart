<?php

namespace App\Helpers;

class CartHelpers
{
    // To encrypt id in url
    public static function encryptUrl($id)
    {
        if ($id) {
            $id = base64_encode(($id + 122354125410));
            return $id;
        }
    }

    // To decrypt id in url
    public static function decryptUrl($id)
    {
        if (is_numeric(base64_decode($id))) {
            $id = explode(",", base64_decode($id))[0] - 122354125410;
            return $id;
        }
        abort(404);
    }
}
