<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use App\Jobs\Auth\User\SendEmailRegister;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;


class RegisterController extends Controller
{
    /**
     * @var $pathView
     */
    protected $pathView = 'auth.user.';
    /**
     * @var string
     */
    protected $guard = 'web';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard($this->guard);
    }

    /**
     * Show the application registration form.
     *
     * @return View
     */
    public function showRegistrationForm()
    {
        return view($this->pathView . 'register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'surname' => ['required', 'string', 'max:100'],
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:11', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param Request $request
     * @return RedirectResponse|JsonResponse
     * @throws ValidationException
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $code = $this->generateCode();

        event(new Registered($user = $this->create($request->all(), $code)));

        $data = array(
            'email' => $request->input('email'),
            'code' => $code
        );
        $this->sendEmailVerify($data);
        Session::put('email', $data['email']);

        return redirect()->route('user.form-verify');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @param $code
     * @return User
     */
    protected function create(array $data, $code)
    {
        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'code' => $code,
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * @return int
     */
    private function generateCode()
    {
        return rand(100000, 999999);
    }

    /**
     * @param $data
     * @return mixed
     */
    protected function sendEmailVerify($data)
    {
        return $this->dispatch(new SendEmailRegister($data));
    }
}
