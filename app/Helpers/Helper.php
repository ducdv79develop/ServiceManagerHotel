<?php

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Auth;

const USER = 'web';
const ADMIN = 'admin';

if (!function_exists('user')) {
    /**
     * @return Guard|StatefulGuard
     */
    function user()
    {
        return Auth::guard(USER);
    }
}

if (!function_exists('userCheck')) {
    /**
     * @return bool
     */
    function userCheck()
    {
        return Auth::guard(USER)->check();
    }
}

if (!function_exists('userInfo')) {
    /**
     * @return Authenticatable|null
     */
    function userInfo()
    {
        return Auth::guard(USER)->user();
    }
}

if (!function_exists('admin')) {
    /**
     * @return Guard|StatefulGuard
     */
    function admin()
    {
        return Auth::guard(ADMIN);
    }
}

if (!function_exists('adminCheck')) {
    /**
     * @return bool
     */
    function adminCheck()
    {
        return Auth::guard(ADMIN)->check();
    }
}

if (!function_exists('adminInfo')) {
    /**
     * @param null $attribute
     * @return Authenticatable|null
     */
    function adminInfo($attribute = null)
    {
        $admin = Auth::guard(ADMIN)->user();
        if ($attribute) {
            return $admin->{$attribute};
        }
        return $admin;
    }
}

if (!function_exists('classInvalid')) {
    /**
     * @param $attribute
     * @param $errors
     * @return string
     */
    function classInvalid($attribute, $errors)
    {
        if (!empty($errors->first($attribute))) {
            return 'is-invalid';
        }
        return '';
    }
}

if (!function_exists('showErrorHtml')) {
    /**
     * @param $attribute
     * @param $errors
     * @return string
     */
    function showErrorHtml($attribute, $errors)
    {
        if (!empty($errors->first($attribute))) {
            return '<div class="error">' . $errors->first($attribute) .'</div>';
        }
        return '';
    }
}

if (!function_exists('oldValue')) {
    /**
     * @param $attribute
     * @return string
     */
    function oldValue($attribute)
    {
        return !empty(old($attribute)) ? old($attribute) : (!empty(request($attribute) ? request($attribute) : ''));
    }
}
