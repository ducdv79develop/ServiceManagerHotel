<?php
const LOGIN_EMAIL = 1;
const LOGIN_ID = 2;
return [
    /*
    |--------------------------------------------------------------------------
    | Event Browser Setting
    |--------------------------------------------------------------------------
    */
    'keycode' => [
        'keyup' => 38,
        'keydown' => 40,
    ],
    /*
    |--------------------------------------------------------------------------
    | System Setting
    |--------------------------------------------------------------------------
    */
    'facebook' => [
      'app_id' => 2889132914453680,
      'app_version' => 2.1
    ],
    'google' => [
      'client_id' => '546908872561-dl2u52bbqjeh4cntpj77tpq359q7rs5l.apps.googleusercontent.com',
      'client_secret' => 'izy4XPaC68-d9y0l8YALXK5f'
    ],

    /*
    |--------------------------------------------------------------------------
    | Customer Register
    |--------------------------------------------------------------------------
    */
    'token_register_expired_date' => 2, // Setting token register expired date, unit days ( eg: 2)
    'token_forgot_expired_date' => 1, // Setting token register expired date, unit days ( eg: 2)
    'nick_name_unique' => FALSE,
    'furigana_hard_letter' => FALSE,
    'postal_code_automatic' => TRUE, // if true use yubinbango library , else  use ajaxzip3
    'postal_code_normal' => TRUE, // if true value digits_between:7,8
    'postal_code_noline' => TRUE, // if true value digits return 7, else return 8. Note: Use when postal_code_normal return false
    'phone_forced_dash' => FALSE, // if true return lenght 13, defautl 11
    'phone_noline' => TRUE,  // if true value digits_between:10,13 else return digits_between:10,11
    /*
    |--------------------------------------------------------------------------
    | Customer login
    |--------------------------------------------------------------------------
    */
    'customer_login_case' => LOGIN_EMAIL, // Login case 1: only Email , 2 only ID
    'paginate' => [
        'admin' => [
            20, 50, 100, 250 , 500
        ],
        'expire_time' => 2147483647, // 2^31 - 1 maximum time value
    ]
];
