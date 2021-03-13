<!-- header start-->
<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="row menu-wrapper align-items-center justify-content-between">
                    <div class="header-left d-flex align-items-center">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('assets/img/logo/logo.png') }}" alt=""></a>
                        </div>
                        <!-- Logo-2 -->
                        <div class="logo2">
                            <a href="index.html"><img src="{{ asset('assets/img/logo/logo2.png') }}" alt=""></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu  d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="index.html">{{ __('Home') }}</a></li>
                                    <li><a href="product.html">{{ __('Product') }}</a></li>
                                    <li><a href="categories.html">{{ __('Category') }}</a></li>
{{--                                    <li><a href="#">{{ __('Page') }}</a>--}}
{{--                                        <ul class="submenu">--}}
{{--                                            <li><a href="login.html">{{ __('Login') }}</a></li>--}}
{{--                                            <li><a href="card.html">{{ __('Card') }}</a></li>--}}
{{--                                            <li><a href="checkout.html">{{ __('Checkout') }}</a></li>--}}
{{--                                            <li><a href="product_details.html">{{ __('Product Detail') }}</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
                                    <li><a href="blog.html">{{ __('Blog') }}</a></li>
                                    <li><a href="contact.html">{{ __('Contact') }}</a></li>

                                    @if(userCheck())
                                        <li><a href="#">{{ __('My Account') }}</a>
                                            <ul class="submenu">
                                                <li><a href="javascript:void(0)">{{ __('My Account') }}</a></li>
                                                <li><a class="account-btn" href="{{ route('user.logout') }}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}</a>
                                                    <form id="logout-form" action="{{ route('user.logout') }}"
                                                          method="POST">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ route('user.form-login') }}"
                                               class="account-btn">{{ __('Login') }}</a>
                                        </li>
                                    @endif

                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header-right1 d-flex align-items-center">
                        <div class="search">
                            <ul class="d-flex align-items-center">
                                <li>
                                    <!-- Search Box -->
                                    <form action="#" class="form-box f-right ">
                                        <input type="text" name="Search" placeholder="Search products">
                                        <div class="search-icon">
                                            <i class="ti-search"></i>
                                        </div>
                                    </form>
                                </li>
                                <li>
                                    <div class="card-stor">
                                        <img src="{{ asset('assets/img/icon/card.svg') }}" alt="">
                                        <span>0</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
