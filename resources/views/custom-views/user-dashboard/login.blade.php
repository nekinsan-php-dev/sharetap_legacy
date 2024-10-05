@extends('layouts.auth')
@section('title')
    {{ __('messages.common.login') }}
@endsection
@section('content')
    <div class="login-section bg-white overflow-hidden position-relative h-100">
        <div class="top-vector">
            <img src="{{ asset('assets/images/top-vector.png') }}">
        </div>
        <div class="bottom-vector">
            <img src="{{ asset('assets/images/bottom-vector.png') }}">
        </div>
        <div class="row">
            <div class="col-md-6 col-12 p-0">
                <div class="login-img">
                    <img src="{{ asset($registerImage) }}" alt="Register Image" class="w-100 h-100">
                </div>
            </div>
            <div class="col-md-6 col-12 p-0 d-flex flex-column justify-content-center ">
                <div class="login-form">
                    <div class="px-sm-10 px-6 mb-5  h-100 w-100">
                        <div class="text-center d-flex justify-content-center align-items-center">
                            <div class="image me-3 mb-0">
                                <a href="{{ route('home') }}" class="image">
                                    <img alt="Logo" src="{{ getLogoUrl() }}" style="width:200px;">
                                </a>
                            </div>
                            
                        </div>
                        <div class="row element">
                            <div class="col-md-12 width-540 mt-5">
                                @include('flash::message')
                                @include('layouts.errors')
                            </div>
                            <h1 class="text-center mb-7 mt-5 fs-2 fw-bold">{{ __('auth.sign_in') }}</h1>
                            <form method="POST" action="{{ route('user.send-otp') }}">
                                @csrf
                                <input type="hidden" name="redirect" value="{{ request()->get('redirect') }}">
                                <div>
                                    @if(session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('error') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-sm-7 mb-4 element">
                                    <label for="mobile_number" class="form-label">
                                       Mobile Number<span class="required"></span>
                                    </label>
                                    <input name="mobile_number" type="text" class="form-control" id="mobile_number"
                                           aria-describedby="emailHelp" required
                                           placeholder="Enter your mobile number">
                                </div>
{{--                                <div class="mb-sm-7 mb-4 element">--}}
{{--                                    <div class="d-flex justify-content-between">--}}
{{--                                        <label for="password"--}}
{{--                                               class="form-label">{{ __('messages.user.password') . ':' }}<span--}}
{{--                                                class="required"></span></label>--}}
{{--                                        @if (Route::has('password.request'))--}}
{{--                                            <a href="{{ route('password.request') }}"--}}
{{--                                               class="link-info fs-6 text-decoration-none">--}}
{{--                                                {{ __('messages.common.forgot_your_password') . '?' }}--}}
{{--                                            </a>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                    <div class="mb-3 position-relative ">--}}
{{--                                        <input name="password" type="password" class="form-control" id="password" required--}}
{{--                                               placeholder="{{ __('messages.user.password') }}" aria-label="Password"--}}
{{--                                               data-toggle="password">--}}
{{--                                        <span--}}
{{--                                            class="position-absolute d-flex align-items-center top-0 bottom-0 end-0 me-4 input-icon input-password-hide cursor-pointer text-gray-600">--}}
{{--                                            <i class="bi bi-eye-slash-fill"></i>--}}
{{--                                        </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mb-sm-7 mb-4 form-check element">--}}
{{--                                    <input type="checkbox" class="form-check-input" id="remember_me">--}}
{{--                                    <label class="form-check-label"--}}
{{--                                           for="remember_me">{{ __('messages.common.remember_me') }}</label>--}}
{{--                                </div>--}}
                                <div class="d-grid element">
                                    <button type="submit" class="btn login-btn">Send Otp</button>
                                </div>
                                @if (getSuperAdminSettingValue('register_enable'))
                                    <div class="d-flex align-items-center mb-10 mt-4 element">
                                        <span class="text-gray-700 me-2">{{ __('messages.common.new_here') . '?' }}</span>
                                        <a href="{{ route('card.create') }}" class="link-info fs-6 text-decoration-none">
                                            {{ __('messages.common.create_an_account') }}
                                        </a>
                                    </div>
                                @endif
                                <div class="d-grid mt-4">
                                    @if (config('app.google_client_id') && config('app.google_client_secret') && config('app.google_redirect'))
                                        <a href="{{ route('social.login', 'google') }}"
                                           class="btn btn-danger d-flex align-items-center justify-content-center mb-sm-5 mb-4">
                                            <i
                                                class="fa-brands fa-google fs-2 me-3"></i>{{ __('messages.placeholder.login_via_google') }}
                                        </a>
                                    @endif
                                    @if (config('app.facebook_app_id') && config('app.facebook_app_secret') && config('app.facebook_redirect'))
                                        <a href="{{ route('social.login', 'facebook') }}"
                                           class="btn btn-info d-flex align-items-center justify-content-center">
                                            <i
                                                class="fa-brands fa-facebook-f fs-2 me-3"></i>{{ __('messages.placeholder.login_via_facebook') }}
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <footer>
                    <div class="container-fluid padding-0 mb-5 copy-right">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-xl-6 w-100">
                                <div class="copyright text-center text-muted">
                                    {{ __('messages.placeholder.all_rights_reserve') }} &copy; {{ date('Y') }} <a
                                        href="{{ route('home') }}" class="font-weight-bold ml-1"
                                        target="_blank">{{ getAppName() }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
@endsection
