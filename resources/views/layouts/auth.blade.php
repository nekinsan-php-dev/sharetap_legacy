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
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/third-party.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/page.css') }}"> <!-- CSS Libraries -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins.css') }}">
    @stack('css')
    @yield('css')
    {{-- {!! ReCaptcha::htmlScriptTagJsApi() !!} --}}
</head>

<body>
    <div
        class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed authImage">

        @yield('content')
    </div>
    <footer>
        <div class="container-fluid padding-0 d-none">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-6">
                    <div class="copyright text-center text-muted">
                        {{ __('messages.placeholder.all_rights_reserve') }} &copy; {{ date('Y') }} <a
                            href="{{ route('home') }}" class="font-weight-bold ml-1"
                            target="_blank">{{ getAppName() }}</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="{{ asset('assets/js/front-third-party.js') }}"></script>
    <script src="{{ asset('messages.js') }}"></script>
    <script src="{{ asset('assets/js/custom/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom.js') }}"></script>
    <script src="{{ asset('assets/js/auth/auth.js') }}"></script>
    @stack('scripts')

    <script>
        let defaultCountryCodeValue = 'in';
        let mobileValidation = "{{ getSuperAdminSettingValue('mobile_validation') }}";
        let utilsScript = "{{ asset('assets/js/inttel/js/utils.min.js') }}"
        $(document).ready(function() {
            $('.alert').delay(5000).slideUp(300)
        })
    </script>
    <script src="{{ asset('assets/js/intl-tel-input/build/intlTelInput.js') }}"></script>
    <script src="{{ asset('assets/js/custom/phone-number-country-code.js') }}"></script>
</body>

</html>
