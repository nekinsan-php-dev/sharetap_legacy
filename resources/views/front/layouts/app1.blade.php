<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ getFaviconUrl() }}" type="image/png">

    @if (!empty($metas))
        @if ($metas['meta_description'])
            <meta name="description" content="{{ $metas['meta_description'] }}">
        @endif
        @if ($metas['meta_keyword'])
            <meta name="keywords" content="{{ $metas['meta_keyword'] }}">
        @endif
        @if ($metas['home_title'] && $metas['site_title'])
            <title>{{ $metas['home_title'] }} | {{ $metas['site_title'] }}</title>
        @else
            <title>@yield('title') | {{ getAppName() }}</title>
        @endif
    @else
        <title>@yield('title') | {{ getAppName() }}</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
    @endif

    @if (!empty(getAppLogo()))
        <meta property="og:image" content="{{ getAppLogo() }}">
    @endif

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/new_home/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/new_home/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/new_home/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/new_home/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/new_home/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/new_home/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/third-party.css') }}">

    @php
        $langSession = Session::get('languageName');
        $frontLanguage = !isset($langSession) ? getSuperAdminSettingValue('default_language') : $langSession;
    @endphp




    {!! getSuperAdminSettingValue('extra_js_front') !!}

    @if (!empty($metas['google_analytics']))
        <script>{!! $metas['google_analytics'] !!}</script>
    @endif

    <style>
        body{
            /* apply font */
            font-family: 'Inter', sans-serif;
        }
        .navbar-nav .nav-link {
            color: #333;
            font-weight: 500;
        }
        .navbar-nav .nav-link:hover {
            color: #6c63ff;
        }
        .text-purple {
            color: #6c63ff;
        }
        .btn-primary {
            background-color: #6c63ff;
            border-color: #6c63ff;
        }
        .btn-primary:hover {
            background-color: #5a52d5;
            border-color: #5a52d5;
        }
        .btn-outline-secondary:hover {
            background-color: #6c63ff;
            border-color: #6c63ff;
        }
    </style>
</head>

<body>

    @if(!Request::is('card/checkout*'))
        @include('front.layouts.header1')
    @endif
    @yield('content')
    @if(!Request::is('card/checkout*'))
        @include('front.layouts.footer1')
    @endif

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/slider/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/helpers.js') }}" defer></script>
    <script src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>


    <script>
        $("#toogler-icon").click(function() {
            $(this).toggleClass("open");
        });

        $('.nav-btn').on('click', function(e) {
            e.preventDefault();
            $('.new-home-nav').toggleClass('d-none', !$(this).hasClass('open'));
        });



        $('.center-slider').slick({
            autoplay: true,
            autoplaySpeed: 5000,
            slidesToShow: 5,
            slidesToScroll: 1,
            centerMode: true,
            arrows: true,
            dots: false,
            speed: 300,
            centerPadding: '20px',
            infinite: true,
            prevArrow: '<button class="slide-arrow prev-arrow" aria-label="prev-btn"><i class="fa-solid fa-arrow-left"></i></button>',
            nextArrow: '<button class="slide-arrow next-arrow" aria-label="next-btn"><i class="fa-solid fa-arrow-right"></i></button>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                    },
                },
            ],
        });

        $(".feature-slider").slick({
            autoplay: true,
            autoplaySpeed: 1000,
            speed: 600,
            draggable: true,
            infinite: true,
            dots: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: '<button class="slide-arrow prev-arrow" aria-label="prev-btn"><i class="fa-solid fa-chevron-left"></i></button>',
            nextArrow: '<button class="slide-arrow next-arrow" aria-label="next-btn"><i class="fa-solid fa-chevron-right"></i></button>',
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    },
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                    },
                },
            ],
        });

        $(".testimonial-slider").slick({
            autoplay: true,
            autoplaySpeed: 1000,
            speed: 600,
            draggable: true,
            infinite: true,
            dots: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: '<button class="slide-arrow prev-arrow" aria-label="prev-btn"><i class="fa-solid fa-chevron-left"></i></button>',
            nextArrow: '<button class="slide-arrow next-arrow" aria-label="prev-btn"><i class="fa-solid fa-chevron-right"></i></button>',
        });
    </script>
</body>
</html>
