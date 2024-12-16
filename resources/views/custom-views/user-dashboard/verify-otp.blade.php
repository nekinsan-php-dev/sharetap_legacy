@extends('layouts.auth')
@section('title')
    {{ __('messages.common.login') }}
@endsection
@section('content')
    <div class="min-vh-100 d-flex align-items-center justify-content-center bg-light py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-5">
                    <!-- Card Container -->
                    <div class="bg-white rounded-4 shadow-sm p-4 p-md-5">
                        <!-- Logo Section -->
                        <div class="text-center mb-4">
                            <a href="{{ route('home') }}" class="d-inline-block mb-4">
                                <img alt="Logo" src="{{ getLogoUrl() }}" class="img-fluid" style="width:200px;">
                            </a>
                            <h1 class="h4 fw-bold text-dark mb-2">OTP Verification</h1>
                            <p class="text-muted mb-0">We've sent a verification code to your mobile</p>
                        </div>
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session()->get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                {{ session()->get('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        <!-- Form Section -->
                        <form method="POST" action="{{ route('user.verify-otp') }}" class="mt-4">
                            @csrf
                            <input type="hidden" name="mobile_number" value="{{ $_GET['mobile_number'] }}">

                            <!-- Mobile Number Display -->
                            <div class="text-center mb-4">
                                <span class="badge bg-light text-dark px-3 py-2 rounded-pill">
                                    +{{ $_GET['mobile_number'] }}
                                </span>
                            </div>

                            <!-- OTP Input -->
                            <div class="mb-4">
                                <label for="otp" class="form-label small fw-medium text-dark">
                                    Enter OTP<span class="text-danger">*</span>
                                </label>
                                <input name="otp" type="text" class="form-control form-control-lg text-center"
                                    id="otp" placeholder="Enter verification code" maxlength="6" required
                                    style="letter-spacing: 0.5em; font-size: 1.2em;">
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid gap-2 mb-4">
                                <button type="submit" class="btn btn-primary btn-lg py-3">
                                    Verify OTP
                                </button>
                            </div>

                            <!-- Resend OTP -->
                            <div class="text-center mb-4">
                                <p class="text-muted mb-0">
                                    Didn't receive the code?
                                    <a href="#" class="text-decoration-none">Resend OTP</a>
                                </p>
                            </div>

                            <!-- Registration Link -->
                            @if (getSuperAdminSettingValue('register_enable'))
                                <div class="text-center">
                                    <span class="text-muted">{{ __('messages.common.new_here') }}?</span>
                                    <a href="{{ route('card.create') }}" class="text-decoration-none ms-1 fw-medium">
                                        {{ __('messages.common.create_an_account') }}
                                    </a>
                                </div>
                            @endif
                        </form>
                    </div>

                    <!-- Footer -->
                    <div class="text-center mt-4">
                        <small class="text-muted">
                            &copy; {{ date('Y') }} {{ getAppName() }}. All rights reserved.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Custom Styles */
        .bg-light {
            background-color: #f8f9fa !important;
        }

        .rounded-4 {
            border-radius: 1rem !important;
        }

        .form-control {
            border: 1.5px solid #e5e7eb;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.1);
        }

        .btn-primary {
            background-color: #2563eb;
            border-color: #2563eb;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
            border-color: #1d4ed8;
            transform: translateY(-1px);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        /* Badge Styling */
        .badge {
            font-weight: 500;
        }

        .badge.bg-light {
            background-color: #f3f4f6 !important;
            border: 1px solid #e5e7eb;
        }

        /* Link Styling */
        a {
            color: #2563eb;
        }

        a:hover {
            color: #1d4ed8;
        }

        /* Card Shadow */
        .shadow-sm {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1),
                0 1px 2px -1px rgba(0, 0, 0, 0.1) !important;
        }
    </style>
@endsection
