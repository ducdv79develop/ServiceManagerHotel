@extends('auth.admin.master')
@section('title', trans('auth.admin.title'))
@section('content')
    <div class="login-form">
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="form-group">
                <label for="email">{{ trans('auth.admin.email') }}</label>
                <input id="email" type="email" class="au-input au-input--full @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">{{ trans('auth.admin.password') }}</label>
                <input id="password" type="password"
                       class="au-input au-input--full @error('password') is-invalid @enderror" name="password" required
                       autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="login-checkbox">
                <input class="form-check-input ml-1" type="checkbox" name="remember"
                       id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label ml-4" for="remember">
                    {{ trans('auth.admin.remember') }}
                </label>
                <label class="ml-1">
                    @if (Route::has('admin.password.reset'))
                        <a class="btn btn-link" href="{{ route('admin.password.reset') }}">
                            {{ trans('auth.admin.forget') }}
                        </a>
                    @endif
                </label>
            </div>
            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">{{ trans('auth.admin.title') }}</button>
{{--            <div class="social-login-content">--}}
{{--                <div class="social-button">--}}
{{--                    <button class="au-btn au-btn--block au-btn--blue m-b-20">{{ trans('auth.admin.login_facebook') }}</button>--}}
{{--                    <button class="au-btn au-btn--block au-btn--blue2">{{ trans('auth.admin.login_gmail') }}</button>--}}
{{--                </div>--}}
{{--            </div>--}}
        </form>
    </div>
@endsection
