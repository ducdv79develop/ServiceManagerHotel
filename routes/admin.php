<?php
// Replace admin with whatever prefix you need
use Illuminate\Support\Facades\Route;

// Patterns
Route::pattern('id', '\d+');
Route::pattern('hash', '[a-z0-9]+');
Route::pattern('hex', '[a-f0-9]+');
Route::pattern('uuid', '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::group(['namespace' => 'Auth\Admin'], function () {
        Route::get('login', 'LoginController@showLoginForm')->name('form-login');
        Route::post('login', 'LoginController@login')->name('login');

        Route::get('forgot-password', 'AdminPasswordController@forgotPassword')->name('password.forgot');
        Route::post('send-mail-reset-password', 'AdminPasswordController@sendMailResetPassword')->name('password.send.mail');
        Route::get('reset-password', 'AdminPasswordController@resetPassword')->name('password.reset');
        Route::post('reset-password', 'AdminPasswordController@actionResetPassword')->name('password.reset.action');
    });

    Route::group(['middleware' => 'admin'], function () {
        Route::post('logout', 'Auth\Admin\LoginController@logout')->name('logout');

        Route::group(['namespace' => 'Backend'], function () {
            Route::get('home', 'HomeController@index')->name('home');
        });
    });
});
