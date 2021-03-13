<?php

namespace App\Helpers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Auth;

class Common
{
    /**
     * Encryption Data Input.
     *
     * @param mixed $data
     * @return string
     */
    public static function cryptData($data)
    {
        return base64_encode($data);
    }

    /**
     * Encryption Data Input.
     *
     * @param mixed $data
     * @return string
     */
    public static function decryptData($data)
    {
        return base64_decode($data);
    }
}
