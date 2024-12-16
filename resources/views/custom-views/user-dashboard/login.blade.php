@extends('layouts.auth')
@section('title')
    {{ __('messages.common.login') }}
@endsection
@section('content')
<div class="min-vh-100 d-flex align-items-center bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-body p-4 p-md-5">
                        <!-- Logo -->
                        <div class="text-center mb-4">
                            <a href="{{ route('home') }}">
                                <img alt="Logo" src="{{ getLogoUrl() }}" class="img-fluid" style="width:200px;">
                            </a>
                        </div>

                        <!-- Title -->
                        <h1 class="text-center h3 mb-4 fw-bold text-gray-900">{{ __('auth.sign_in') }}</h1>

                        <!-- Flash Messages -->
                        @include('flash::message')
                        @include('layouts.errors')

                        <!-- Alert Messages -->
                        @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session()->get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                {{ session()->get('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <!-- Login Form -->
                        <form method="POST" action="{{ route('user.send-otp') }}" class="needs-validation" novalidate>
                            @csrf
                            <input type="hidden" name="redirect" value="{{ request()->get('redirect') }}">

                            <!-- Mobile Number Input -->
                            <div class="mb-4">
                                <label for="mobile_number" class="form-label fw-medium">
                                    Mobile Number<span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input name="mobile_number"
                                           type="text"
                                           class="form-control form-control-lg"
                                           id="mobile_number"
                                           placeholder="Enter your mobile number"
                                           required>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Send OTP
                                </button>
                            </div>

                            <!-- Registration Link -->
                            @if (getSuperAdminSettingValue('register_enable'))
                                <div class="text-center mb-4">
                                    <span class="text-muted">{{ __('messages.common.new_here') }}?</span>
                                    <a href="{{ route('card.create') }}" class="text-decoration-none ms-1">
                                        {{ __('messages.common.create_an_account') }}
                                    </a>
                                </div>
                            @endif

                            <!-- Social Login Buttons -->
                            @if (config('app.google_client_id') && config('app.google_client_secret') && config('app.google_redirect'))
                                <div class="d-grid mb-3">
                                    <a href="{{ route('social.login', 'google') }}"
                                       class="btn btn-outline-danger btn-lg">
                                        <i class="fa-brands fa-google me-2"></i>
                                        {{ __('messages.placeholder.login_via_google') }}
                                    </a>
                                </div>
                            @endif

                            @if (config('app.facebook_app_id') && config('app.facebook_app_secret') && config('app.facebook_redirect'))
                                <div class="d-grid">
                                    <a href="{{ route('social.login', 'facebook') }}"
                                       class="btn btn-outline-primary btn-lg">
                                        <i class="fa-brands fa-facebook-f me-2"></i>
                                        {{ __('messages.placeholder.login_via_facebook') }}
                                    </a>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>

                <!-- Footer -->
                <div class="text-center mt-4 text-muted small">
                    <p class="mb-0">
                        {{ __('messages.placeholder.all_rights_reserve') }} &copy; {{ date('Y') }}
                        <a href="{{ route('home') }}" class="text-decoration-none">{{ getAppName() }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom styles */
    .card {
        transition: all 0.3s ease;
    }

    .btn {
        transition: all 0.3s ease;
    }

    .form-control {
        border: 1px solid #dee2e6;
        padding: 0.75rem 1rem;
    }

    .form-control:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }

    /* Remove the vectors as they're not needed in the modern design */
    .top-vector, .bottom-vector {
        display: none;
    }
</style>
@endsection
