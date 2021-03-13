@extends('auth.user.master')
@section('title', 'login')
@section('content')
    <main class="login-bg">
        <!-- login Area Start -->
        <div class="login-form-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <form method="post" action="{{ route('user.login') }}">
                            @csrf
                            <div class="login-form">
                                <!-- Login Heading -->
                                <div class="login-heading">
                                    <span>Login</span>
                                    <p>Enter Login details to get access</p>
                                </div>
                                <!-- Single Input Fields -->
                                <div class="input-box">
                                    <div class="single-input-fields">
                                        <label for="email">Username or Email Address</label>
                                        <input type="text"
                                               class="form-control input-font"
                                               id="email" name="email"
                                               value="{{ oldValue('email') }}">
                                    </div>
                                    <div class="single-input-fields">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control input-font" id="password" name="password">
                                    </div>
                                    <div class="single-input-fields login-check">
                                        <input type="checkbox" id="remember" name="remember">
                                        <label for="remember">Keep me logged in</label>
                                        <a href="#" class="f-right">Forgot Password?</a>
                                    </div>
                                </div>
                                <!-- form Footer -->
                                <div class="login-footer">
                                    <p>Don’t have an account? <a href="{{ route('user.form-register') }}">Sign Up</a>
                                        here</p>
                                    <button type="submit" class="submit-btn3">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- login Area End -->
    </main>
@endsection
