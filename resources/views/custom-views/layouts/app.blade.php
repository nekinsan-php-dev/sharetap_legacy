<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') | {{ getAppName() }}</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ getFaviconUrl() }}" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom-third-party.css') }}">
    
    @if (!getLogInUser()->theme_mode)
        <link rel="stylesheet" href="{{ asset('assets/css/custom-stylesheet.css') }}">
        <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('css/plugins.dark.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.dark.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/custom-pages-dark.css') }}">
    @endif
    
    <link rel="stylesheet" href="{{ asset('assets/css/page.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">

  

   
    
    <script src="{{ asset('assets/js/third-party.js') }}"></script>

    <script data-turbo-eval="false">
        let mobileValidation = "{{ getSuperAdminSettingValue('mobile_validation') }}"
        let stripe = ''
        @if (getSelectedPaymentGateway('stripe_key'))
            stripe = Stripe('{{ getSelectedPaymentGateway('stripe_key') }}')
        @endif
        let appUrl = "{{ config('app.url') }}"
        let noData = "{{ __('messages.no_data') }}"
        let utilsScript = "{{ asset('assets/js/inttel/js/utils.min.js') }}"
        let defaultProfileUrl = "{{ asset('web/media/avatars/user.png') }}"
        let defaultTemplate = "{{ asset('assets/images/default_cover_image.jpg') }}"
        let defaultServiceIconUrl = "{{ asset('assets/images/default_service.png') }}"
        let defaultCoverUrl = "{{ asset('assets/images/default_cover_image.jpg') }}"
        let defaultGalleryUrl = "{{ asset('assets/images/default_service.png') }}"
        let defaultAppLogoUrl = "{{ asset(getAppLogo()) }}"
        let defaultFaviconUrl = "{{ getFaviconUrl() }}"
        let getLoggedInUserdata = "{{ getLogInUser() }}"
        window.getLoggedInUserLang = "{{ getCurrentLanguageName() }}"
        let lang = "{{ Illuminate\Support\Facades\Auth::user()->language ?? 'en' }}"
        let getCurrencyCode = "{{ getMaximumCurrencyCode($getIcon = true) }}"
        let sweetAlertIcon = "{{ asset('images/remove.png') }}"
        let sweetCompletedAlertIcon = "{{ asset('images/Alert.png') }}"
        let defaultCountryCodeValue = "{{ getSuperAdminSettingValue('default_country_code') }}"
        let getUniqueVcardUrlAlias = "{{ getUniqueVcardUrlAlias() }}"
        let currencyAfterAmount = "{{ getSuperAdminSettingValue('currency_after_amount') }}"
        let userDateFormate = "{{ getSuperAdminSettingValue('datetime_method') ?? 1 }}";
        let defaultVideoCoverImg = "{{ asset('assets/images/video-icon.png') }}";
        let getLoggedInUsersteps = "{{ getLogInUser()->steps }}"
        let hasActiveSubscription = "{{ hasActiveSubscription() }}"

        $(document).ready(function() {
            $('[data-bs-toggle="tooltip"]').tooltip()
        })
    </script>

    @stack('scripts')

    <script src="{{ asset('messages.js') }}"></script>
    <script src="{{ asset('assets/js/pages.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/shepherd.js@10.0.1/dist/js/shepherd.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/shepherd.js@10.0.1/dist/css/shepherd.css"/>
    
    <script>
        let authUser = "{{ Auth::user() }}";
        let roleAdmin = "{{ Auth::user()->hasRole('admin') }}";
    </script>

</head>

<body>
<div class="d-flex flex-column flex-root vh-100">
    <div class="d-flex flex-row flex-column-fluid">
        @include('custom-views.layouts.sidebar')
        <div class="wrapper d-flex flex-column flex-row-fluid">
            <div class='container-fluid d-flex align-items-stretch justify-content-between px-0'>
                @include('custom-views.layouts.header')
            </div>
            <div class='content d-flex flex-column flex-column-fluid pt-7 overflow-scroll'>
                @yield('header_toolbar')
                <div class="container-fluid">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <div class="alert-body d-flex">
                                <span>{{ session('success') }}</span>
                                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div class="alert-body d-flex">
                                @foreach($errors->all() as $error)
                                    <span>{{ $error }}</span>
                                @endforeach
                                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    <div class="d-flex justify-content-end pb-2 profile_link">
                        @php
                            $url_alias = auth()->user()->vcard->url_alias;
                            $portfolio_url = url($url_alias);
                        @endphp
                        <a href="{{ $portfolio_url }}" target="_blank">
                            Portfolio Preview
                        </a>
                    </div>
                </div>
                <div>
                    @yield('content')
                </div>
            </div>
            <div class='container-fluid'>
                @include('layouts.footer')
            </div>
        </div>
    </div>
</div>
@include('custom-views.layouts.changepassword')

</body>

</html>
