<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\LoginRequest;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * @var $pathView
     */
    protected $pathView = 'auth.admin.';

    /**
     * @var string
     */
    protected $guard = 'admin';

    /**
     * @return Guard|mixed
     */
    public function guard()
    {
        return Auth::guard($this->guard);
    }

    /**
     * Show form login
     * @return RedirectResponse|View
     */
    public function showLoginForm()
    {
        if ($this->guard()->check()) {
            return redirect()->route('admin.home');
        }
        return view($this->pathView . 'login');
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if ($this->guard()->attempt($credentials, $request->has('remember'))) {
            return redirect()->intended('admin/home');
        } else {
            $message = trans('messages.customer.login_email_fail');
            return redirect()->back()->withInput()->with('fail', $message);
        }
    }

    /**
     * Logout Admin
     * @return RedirectResponse
     */
    public function logout()
    {
        $this->guard()->logout();
        return redirect()->route('admin.form-login');
    }
}
