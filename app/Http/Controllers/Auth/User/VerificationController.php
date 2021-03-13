<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use App\Jobs\Auth\User\SendEmailRegister;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class VerificationController extends Controller
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
     * Get the guard to be used during registration.
     *
     * @return StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard($this->guard);
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'code' => ['required', 'string', 'max:6'],
        ]);
    }

    /**
     * @return RedirectResponse|View
     */
    protected function showVerifyForm()
    {
        if ($this->guard()->check()) {
            return redirect()->route('home');
        }
        return view($this->pathView . 'verify');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    protected function verify(Request $request)
    {
        $this->validator($request->all())->validate();
        $data = $request->all();

        $user = User::query()->where([
            ['email', $data['email']],
            ['code', $data['code']]
        ])->first();

        if (!empty($user)) {
            $user->update(['verified' => true, 'verified_at' => Carbon::now()]);
            $this->guard()->login($user);

            return redirect()->route('home');
        } else {
            return back()->withErrors(['code' => 'The code is incorrect.'])->withInput();
        }
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
