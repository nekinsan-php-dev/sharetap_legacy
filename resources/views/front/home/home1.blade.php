@extends('front.layouts.app1')
@section('title')
    {{ getAppName() }}
@endsection
@section('content')
    <!-- start hero section -->
    <section class="hero-section position-relative pb-60"
             style="background:url('{{ asset('assets/images/hands.webp') }}');background-repeat: no-repeat; background-size: cover;">
        <div class="container"> @include('flash::message') </div>
        <div class="hero-bg-img text-end">
            <!--<img src="{{ asset('assets/img/new_home_page/hero-bg.png') }}" class="w-100 h-100" alt="hero-img" />-->
        </div>
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-6 text-lg-start text-center mb-lg-0 mb-md-5 mb-4">
                    <div class="hero-content">
                        <h1 class="custon-text-sach mb-2">{{ $setting['home_page_title'] }}</h1>
                        <p class="text-light-100 fs-18 mb-40 ">
                            {{ $setting['sub_text'] ?? '' }}
                        </p>
                        <a href="{{ route('card.create') }}" class="btn btn-primary" role="button" data-turbo="false">
                            {{ __('auth.get_started') }}</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center mt-lg-0 mt-4">
                    <div class="hero-img mx-auto" style="z-index: 1; position: relative;">
                        <img src="{{ asset('assets/img/new_home_page/hero-image.png') }}"
                             alt="Vcard" class="zoom-in-zoom-out w-100 h-auto"/>
                    </div>

                </div>
            </div>
        </div>
        <div class="main-banner banner-img-1">
            <img src="{{ asset('assets/img/new_home_page/shape-1.png') }}" class="w-100 h-auto" alt="image">
        </div>
        <div class="main-banner banner-img-2">
            <img src="{{ asset('assets/img/new_home_page/shape-2.png') }}" class="w-100 h-auto" alt="image">
        </div>
        <div class="main-banner banner-img-3">
            <img src="{{ asset('assets/img/new_home_page/shape-3.png') }}" class="w-100 h-auto" alt="image">
        </div>
        <div class="main-banner banner-img-4">
            <img src="{{ asset('assets/img/new_home_page/shape-4.png') }}" class="w-100 h-auto" alt="image">
        </div>
        <div class="main-banner banner-img-5">
            <img src="{{ asset('assets/img/new_home_page/shape-5.png') }}" class="w-100 h-auto" alt="image">
        </div>
        <div class="main-banner banner-img-6">
            <img src="{{ asset('assets/img/new_home_page/shape-6.png') }}" class="w-100 h-auto" alt="image">
        </div>
        <div class="main-banner banner-img-7">
            <img src="{{ asset('assets/img/new_home_page/shape-7.png') }}" class="w-100 h-auto" alt="image">
        </div>
        <div class="main-banner banner-img-8">
            <img src="{{ asset('assets/img/new_home_page/shape-8.png') }}" class="w-100 h-auto" alt="image">
        </div>
    </section>
    <!-- end hero section -->
    <section class=" position-relative " style="background:url('{{ asset('assets/images/bg-shapes.png') }}');">
        <div style="width: 100%; display: flex;justify-content: space-between;">
            <span class="border1-new" style="position: absolute;width:100%;"> <img
                    src="{{ asset('assets/images/border1.png') }}" alt="vcard-bg" class="w-100 h-auto"></span>
            <span class="border2-new" style="position: absolute;width:100%;"> <img
                    src="{{ asset('assets/images/border2.png') }}" alt="vcard-bg" class="w-100 h-auto"></span>
        </div>
        <div class="vcard-template-section pt-60 pb-100 position-relative">
            <div class="vcard-bg position-absolute">
                <img src="{{ asset('assets/img/new_home_page/vcard-template-bg.png') }}" alt="vcard-bg"
                     class="w-100 h-auto">
            </div>
            <div class="plus-vector1 position-absolute">
                <img src="{{ asset('assets/img/new_home_page/plus-vector.png') }}" alt="vector" class="w-100 h-auto">
            </div>
            <div class="plus-vector2 position-absolute">
                <img src="{{ asset('assets/img/new_home_page/plus-vector.png') }}" alt="vector" class="w-100 h-auto">
            </div>
            <div class="plus-vector3 position-absolute">
                <img src="{{ asset('assets/img/new_home_page/plus-vector2.png') }}" alt="vector" class="w-100 h-auto">
            </div>
            <div style="width: 100%; display: flex;justify-content: space-between;">
                <span class="border5-new" style="position: absolute;width:100%;"> <img
                        src="{{ asset('assets/images/border5.png') }}" alt="vcard-bg" class="w-100 h-auto"></span>
                <span class="border6-new" style="position: absolute;width:100%;"> <img
                        src="{{ asset('assets/images/border6.png') }}" alt="vcard-bg" class="w-100 h-auto"></span>
            </div>
            {{-- vcard slider --}}
            <section class="vcard-section pb-100" id="">
                <div class="container w-100">
                    <div class="section-heading text-center mb-60 d-flex flex-column">
                        <h2 class="d-inline-block csnton-tit-other">Share Tap Templates</h2>
                        <span> <img src="{{ asset('assets/images/border.png') }}" class="w-25 vcard-img"
                                    alt="vcard-img"></span>
                    </div>
                    <div class="center-slider">
                        <div>
                            <div class="vcard-card">
                                <img src="{{ asset('assets/img/templates/home/vcard22.png') }}" class="w-100 vcard-img"
                                     alt="vcard-img">
                            </div>
                        </div>
                        <div>
                            <div class="vcard-card">
                                <img src="{{ asset('assets/img/templates/home/vcard12.png') }}"
                                     class="img-fluid vcard-img"
                                     alt="vcard-img">
                            </div>
                        </div>
                        <div>
                            <div class="vcard-card">
                                <img src="{{ asset('assets/img/templates/home/vcard13.png') }}" class="w-100 vcard-img "
                                     alt="vcard-img">
                            </div>
                        </div>
                        <div>
                            <div class="vcard-card">
                                <img src="{{ asset('assets/img/templates/home/vcard14.png') }}" class="w-100 vcard-img"
                                     alt="vcard-img">
                            </div>
                        </div>
                        <div>
                            <div class="vcard-card">
                                <img src="{{ asset('assets/img/templates/home/vcard15.png') }}" class="w-100 vcard-img"
                                     alt="vcard-img">
                            </div>
                        </div>
                        <div>
                            <div class="vcard-card">
                                <img src="{{ asset('assets/img/templates/home/vcard16.png') }}" class="w-100 vcard-img"
                                     alt="vcard-img">
                            </div>
                        </div>
                        <div>
                            <div class="vcard-card">
                                <img src="{{ asset('assets/img/templates/home/vcard17.png') }}" class="w-100 vcard-img"
                                     alt="vcard-img">
                            </div>
                        </div>
asdasdasd
                    </div>
                    <div class="col-12 text-center mt-5">
                        <a href="{{ route('vcard-templates') }}" class="btn btn-primary-light" role="button"
                           data-turbo="false">{{ __('messages.common.view_more') }}</a>
                    </div>
                </div>
            </section>
        </div>
        <!-- start features section -->
        <section class="features-section overflow-hidden" id="frontFeaturesTab">
            <div class="container">
                <div class="section-heading text-center mb-60 d-flex flex-column">
                    <h2 class="d-inline-block csnton-tit-other">{{ __('messages.plan.features') }}</h2>
                    <span> <img src="{{ asset('assets/images/border.png') }}" class="w-25 vcard-img"
                                alt="vcard-img"></span>
                </div>
                <div class="feature-slider">
                    @foreach ($features as $feature)
                        <div class="custon-class-ho">
                            <div class="feature-card">
                                <div class="card-img overflow-hidden">
                                    <img src="{{ $feature->profile_image }}" class="w-100 h-100 object-fit-cover"
                                         alt="feature-img">
                                </div>
                                <div class="card-body p-0">
                                    <h3 class="fs-18 mb-3">{{ $feature->name }}</h3>
                                    <p class="text-gray-100 mb-0">{!! $feature->description !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- end features section -->

        <!-- start modern & powerful-interface section -->
        <section class="modern-interface-section overflow-hidden pb-100" id="frontAboutTabUsTab">
            <div style="width: 100%; display: flex;justify-content: space-between;">
                <span class="border7-new" style="position: absolute;width:100%;"> <img
                        src="{{ asset('assets/images/border5.png') }}" alt="vcard-bg" class="w-100 h-auto"></span>
                <span class="border8-new" style="position: absolute;width:100%;"> <img
                        src="{{ asset('assets/images/border6.png') }}" alt="vcard-bg" class="w-100 h-auto"></span>
            </div>
            <div class="container">
                <div class="section-heading text-center mb-60 d-flex flex-column">
                    <h2 class="d-inline-block csnton-tit-other">{{ __('auth.modern_&_powerful_interface') }}</h2>
                    <span> <img src="{{ asset('assets/images/border.png') }}" class="w-25 vcard-img"
                                alt="vcard-img"></span>
                </div>
                <div class="interface-card mb-40">
                    <div class="row m-0 pb-2 justify-content-between align-items-center">
                        <div class="col-lg-5 col-md-6 mb-md-0 mb-40">
                            <div class="interface-img">
                                <img class="h-auto w-100"
                                     src="{{ isset($aboutUS[0]['about_url']) ? $aboutUS[0]['about_url'] : asset('front/images/about-1.png') }}"
                                     alt="interface-img">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="card-desc ps-lg-0 ps-md-4">
                                <h3 class="card-title fs-20 fw-6 mb-3">
                                    {{ $aboutUS[0]['title'] }}
                                </h3>
                                <p class="card-text text-gray-100">
                                    {!! nl2br(e($aboutUS[0]['description'])) !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="interface-card mb-40">
                    <div
                        class="row pb-2 m-0 flex-md-row flex-column-reverse justify-content-between align-items-center">
                        <div class="col-lg-6 col-md-6 pe-lg-0 pe-md-4">
                            <div class="card-desc">
                                <h3 class="card-title fs-20 fw-6 mb-3">
                                    {{ $aboutUS[1]['title'] }}
                                </h3>
                                <p class="card-text text-gray-100">
                                    {!! nl2br(e($aboutUS[1]['description'])) !!}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 mb-md-0 mb-40">
                            <div class="interface-img">
                                <img class="h-auto w-100"
                                     src="{{ isset($aboutUS[1]['about_url']) ? $aboutUS[1]['about_url'] : asset('front/images/about-2.png') }}"
                                     alt="interface img"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="interface-card">
                    <div class="row m-0 pb-2 justify-content-between align-items-center">
                        <div class="col-lg-5 col-md-6 mb-md-0 mb-40">
                            <div class="interface-img">
                                <img class="h-auto w-100"
                                     src="{{ isset($aboutUS[2]['about_url']) ? $aboutUS[2]['about_url'] : asset('front/images/about-3.png') }}"
                                     alt="interface img"/>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="card-desc ps-lg-0 ps-md-4">
                                <h3 class="card-title fs-20 fw-6 mb-3">
                                    {{ $aboutUS[2]['title'] }}
                                </h3>
                                <p class="card-text text-gray-100">
                                    {!! nl2br(e($aboutUS[2]['description'])) !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end modern & powerful-interface section  -->


        <!-- start testimonial section -->
        @if (!$testimonials->isEmpty())
            <section class="testimonial-section">
                <div style="width: 100%; display: flex;justify-content: space-between;">
                    <span class="border9-new" style="position: absolute;width:100%;"> <img
                            src="{{ asset('assets/images/border5.png') }}" alt="vcard-bg" class="w-100 h-auto"></span>
                    <span class="border10-new" style="position: absolute;width:100%;"> <img
                            src="{{ asset('assets/images/border6.png') }}" alt="vcard-bg" class="w-100 h-auto"></span>
                </div>
                <div class="section-heading text-center mb-60 d-flex flex-column">
                    <h2 class="d-inline-block csnton-tit-other">{{ __('auth.stories_from_our_customers') }}</h2>
                    <span> <img src="{{ asset('assets/images/border.png') }}" class="w-25 vcard-img"
                                alt="vcard-img"></span>
                </div>
                <div class="testimonial bg-light pt-50 pb-50">
                    <!--style="background:url('{{ asset('assets/images/testimonials.png') }}');background-repeat: no-repeat; background-size: cover;"-->
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="testimonial-slider">
                                    @foreach ($testimonials as $testimonial)
                                        <div class="">
                                            <div class="testimonial-card mb-60">
                                                <div class="quote-img">
                                                    <img src="{{ asset('assets/img/new_home_page/quote-img.png') }}"
                                                         alt="quotation" class="w-sm-100 w-50 h-auto">
                                                </div>
                                                <div class="profile-img">
                                                    <img src="{{ $testimonial->testimonial_url }}" alt="profile-img"
                                                         class="w-100 h-100 object-fit-cover">
                                                </div>
                                                <div class="profile-desc ps-3">
                                                    <p class="fs-20 mb-0 fw-6">{{ $testimonial->name }}</p>
                                                </div>
                                                <p class="mt-4 mb-0 profile-text text-gray-100">{!! $testimonial->description !!}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section>
        @endif
        <!-- end testimonial section -->


        <!-- Plans Start Here -->

        <section class="pricing-plan-section pb-100 mt-4" id="frontPricingTab">
            <div class="container">
                <div class="section-heading text-center mb-60 d-flex flex-column">
                    <h2 class="d-inline-block csnton-tit-other"> Choose a plan that's right for you</h2>
                    <span> <img src="{{ asset('assets/images/border.png') }}" class="w-25 vcard-img"
                                alt="vcard-img"></span>
                </div>
                <div class="pricing-slider slick-initialized slick-slider">
                    <div class="slick-list draggable" style="padding: 0px 50px;">
                        <div class="slick-track"
                             style="opacity: 1; width: 1116px; transform: translate3d(0px, 0px, 0px);">
                            @foreach($plans as $plan)
                                <div class="slick-slide slick-current slick-center" data-slick-index="0" aria-hidden="true"
                                     style="width: 372px;">
                                    <div>
                                        <div class="" style="width: 100%; display: inline-block;">
                                            <div class="pricing-card h-100">
                                                <div class="text-center">
                                                    <h3 class="card-title text-primary">{{ $plan->name ?? 'Plan Name' }}</h3>
                                                    <h2 class="price text-center fw-5 mb-30">
                                                        ₹ {{ $plan->price ?? '' }}
                                                        <span class="fs-18">/ {{ $plan->frequency == 1 ? 'Monthly' : 'Yearly' }}</span>
                                                    </h2>
                                                    <label class="fs-18 my-2 text-gray-100">No of ShareTap
                                                        : {{ $plan->no_of_vcards ?? '' }}</label><br>

                                                </div>

                                                <div class="text-center mb-4">
                                                    <div class="mx-auto">
                                                        <a href="{{ url('card/create?plan='.$plan->id ?? '1') }}"
                                                           class="btn btn-primary rounded-3 mx-auto w-100 " data-id="188"
                                                           data-plan-price="299" data-turbo="false" tabindex="-1">
                                                            Choose Plan</a>
                                                    </div>
                                                </div>

                                                <ul class="pricing-plan-list ps-xl-4 ps-lg-3 ps-md-4 ps-3 mb-60">
                                                    <li class="active-check">
                                        <span class="check-box">
                                            <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false"
                                                 data-prefix="fas" data-icon="check" role="img"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                 data-fa-i2svg=""><path fill="currentColor"
                                                                        d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg>
                                            <!-- <i class="fa-solid fa-check"></i> Font Awesome fontawesome.com -->
                                        </span>
                                                        Services
                                                    </li>
                                                    <li class="active-check">
                                        <span class="check-box">
                                            <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false"
                                                 data-prefix="fas" data-icon="check" role="img"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                 data-fa-i2svg=""><path fill="currentColor"
                                                                        d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg>
                                            <!-- <i class="fa-solid fa-check"></i> Font Awesome fontawesome.com -->
                                        </span>
                                                        Testimonials
                                                    </li>
                                                    <li class="active-check">
                                        <span class="check-box">
                                            <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false"
                                                 data-prefix="fas" data-icon="check" role="img"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                 data-fa-i2svg=""><path fill="currentColor"
                                                                        d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg>
                                            <!-- <i class="fa-solid fa-check"></i> Font Awesome fontawesome.com -->
                                        </span>
                                                        Hide Branding
                                                    </li>
                                                    <li class="active-check">
                                        <span class="check-box">
                                            <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false"
                                                 data-prefix="fas" data-icon="check" role="img"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                 data-fa-i2svg=""><path fill="currentColor"
                                                                        d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg>
                                            <!-- <i class="fa-solid fa-check"></i> Font Awesome fontawesome.com -->
                                        </span>
                                                        Enquiry Form
                                                    </li>
                                                    <li class="active-check">
                                        <span class="check-box">
                                            <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false"
                                                 data-prefix="fas" data-icon="check" role="img"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                 data-fa-i2svg=""><path fill="currentColor"
                                                                        d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg>
                                            <!-- <i class="fa-solid fa-check"></i> Font Awesome fontawesome.com -->
                                        </span>
                                                        Social Links
                                                    </li>
                                                    <li class="active-check">
                                        <span class="check-box">
                                            <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false"
                                                 data-prefix="fas" data-icon="check" role="img"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                 data-fa-i2svg=""><path fill="currentColor"
                                                                        d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg>
                                            <!-- <i class="fa-solid fa-check"></i> Font Awesome fontawesome.com -->
                                        </span>
                                                        Password Protection
                                                    </li>
                                                    <li class="active-check">
                                        <span class="check-box">
                                            <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false"
                                                 data-prefix="fas" data-icon="check" role="img"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                 data-fa-i2svg=""><path fill="currentColor"
                                                                        d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg>
                                            <!-- <i class="fa-solid fa-check"></i> Font Awesome fontawesome.com -->
                                        </span>
                                                        Custom Fonts
                                                    </li>
                                                    <li class="active-check">
                                        <span class="check-box">
                                            <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false"
                                                 data-prefix="fas" data-icon="check" role="img"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                 data-fa-i2svg=""><path fill="currentColor"
                                                                        d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg>
                                            <!-- <i class="fa-solid fa-check"></i> Font Awesome fontawesome.com -->
                                        </span>
                                                        Products
                                                    </li>
                                                    <li class="active-check">
                                        <span class="check-box">
                                            <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false"
                                                 data-prefix="fas" data-icon="check" role="img"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                 data-fa-i2svg=""><path fill="currentColor"
                                                                        d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg>
                                            <!-- <i class="fa-solid fa-check"></i> Font Awesome fontawesome.com -->
                                        </span>
                                                        Appointments
                                                    </li>
                                                    <li class="active-check">
                                        <span class="check-box">
                                            <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false"
                                                 data-prefix="fas" data-icon="check" role="img"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                 data-fa-i2svg=""><path fill="currentColor"
                                                                        d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg>
                                            <!-- <i class="fa-solid fa-check"></i> Font Awesome fontawesome.com -->
                                        </span>
                                                        Gallery
                                                    </li>
                                                    <div class="all-features d-none" style="display: none;">
                                                        <li class="active-check">
                                            <span class="check-box">
                                                <svg class="svg-inline--fa fa-check" aria-hidden="true"
                                                     focusable="false" data-prefix="fas" data-icon="check" role="img"
                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                     data-fa-i2svg=""><path fill="currentColor"
                                                                            d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg>
                                                <!-- <i class="fa-solid fa-check"></i> Font Awesome fontawesome.com -->
                                            </span>
                                                            Analytics
                                                        </li>
                                                        <li class="active-check">
                                            <span class="check-box">
                                                <svg class="svg-inline--fa fa-check" aria-hidden="true"
                                                     focusable="false" data-prefix="fas" data-icon="check" role="img"
                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                     data-fa-i2svg=""><path fill="currentColor"
                                                                            d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg>
                                                <!-- <i class="fa-solid fa-check"></i> Font Awesome fontawesome.com -->
                                            </span>
                                                            SEO
                                                        </li>
                                                        <li class="active-check">
                                            <span class="check-box">
                                                <svg class="svg-inline--fa fa-check" aria-hidden="true"
                                                     focusable="false" data-prefix="fas" data-icon="check" role="img"
                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                     data-fa-i2svg=""><path fill="currentColor"
                                                                            d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg>
                                                <!-- <i class="fa-solid fa-check"></i> Font Awesome fontawesome.com -->
                                            </span>
                                                            Blog
                                                        </li>
                                                        <li class="active-check">
                                            <span class="check-box">
                                                <svg class="svg-inline--fa fa-check" aria-hidden="true"
                                                     focusable="false" data-prefix="fas" data-icon="check" role="img"
                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                     data-fa-i2svg=""><path fill="currentColor"
                                                                            d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg>
                                                <!-- <i class="fa-solid fa-check"></i> Font Awesome fontawesome.com -->
                                            </span>
                                                            Affiliation
                                                        </li>
                                                        <li class="active-check">
                                            <span class="check-box">
                                                <svg class="svg-inline--fa fa-check" aria-hidden="true"
                                                     focusable="false" data-prefix="fas" data-icon="check" role="img"
                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                     data-fa-i2svg=""><path fill="currentColor"
                                                                            d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg>
                                                <!-- <i class="fa-solid fa-check"></i> Font Awesome fontawesome.com -->
                                            </span>
                                                            Custom QR Code
                                                        </li>
                                                        <li class="active-check">
                                            <span class="check-box">
                                                <svg class="svg-inline--fa fa-check" aria-hidden="true"
                                                     focusable="false" data-prefix="fas" data-icon="check" role="img"
                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                     data-fa-i2svg=""><path fill="currentColor"
                                                                            d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg>
                                                <!-- <i class="fa-solid fa-check"></i> Font Awesome fontawesome.com -->
                                            </span>
                                                            Dynamic vCard
                                                        </li>
                                                        <li class="unactive-check">
                                            <span class="check-box">
                                                <svg class="svg-inline--fa fa-xmark" aria-hidden="true"
                                                     focusable="false" data-prefix="fas" data-icon="xmark" role="img"
                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                                     data-fa-i2svg=""><path fill="currentColor"
                                                                            d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg>
                                                <!-- <i class="fa-solid fa-xmark"></i> Font Awesome fontawesome.com -->
                                            </span>
                                                            Custom CSS
                                                        </li>
                                                        <li class="unactive-check">
                                            <span class="check-box">
                                                <svg class="svg-inline--fa fa-xmark" aria-hidden="true"
                                                     focusable="false" data-prefix="fas" data-icon="xmark" role="img"
                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                                     data-fa-i2svg=""><path fill="currentColor"
                                                                            d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg>
                                                <!-- <i class="fa-solid fa-xmark"></i> Font Awesome fontawesome.com -->
                                            </span>
                                                            Custom JS
                                                        </li>
                                                        <li class="unactive-check">
                                            <span class="check-box">
                                                <svg class="svg-inline--fa fa-xmark" aria-hidden="true"
                                                     focusable="false" data-prefix="fas" data-icon="xmark" role="img"
                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                                     data-fa-i2svg=""><path fill="currentColor"
                                                                            d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg>
                                                <!-- <i class="fa-solid fa-xmark"></i> Font Awesome fontawesome.com -->
                                            </span>
                                                            Instagram Feed
                                                        </li>
                                                        <li class="unactive-check">
                                            <span class="check-box">
                                                <svg class="svg-inline--fa fa-xmark" aria-hidden="true"
                                                     focusable="false" data-prefix="fas" data-icon="xmark" role="img"
                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                                     data-fa-i2svg=""><path fill="currentColor"
                                                                            d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg>
                                                <!-- <i class="fa-solid fa-xmark"></i> Font Awesome fontawesome.com -->
                                            </span>
                                                            Iframes
                                                        </li>
                                                    </div>
                                                </ul>
                                                <div class="text-center show-plan-features" id="seeMorePlanFeatures">
                                                    <svg class="svg-inline--fa fa-circle-chevron-down show-plan-icon-btn"
                                                         aria-hidden="true" focusable="false" data-prefix="fas"
                                                         data-icon="circle-chevron-down" role="img"
                                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                         data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                              d="M256 0C114.6 0 0 114.6 0 256c0 141.4 114.6 256 256 256s256-114.6 256-256C512 114.6 397.4 0 256 0zM390.6 246.6l-112 112C272.4 364.9 264.2 368 256 368s-16.38-3.125-22.62-9.375l-112-112c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L256 290.8l89.38-89.38c12.5-12.5 32.75-12.5 45.25 0S403.1 234.1 390.6 246.6z"></path>
                                                    </svg>
                                                    <!-- <i class="fa-solid fa-circle-chevron-down show-plan-icon-btn"></i> Font Awesome fontawesome.com -->
                                                </div>
                                                <div class="text-center d-none less-plan-features"
                                                     id="lessMorePlanFeatures">
                                                    <svg class="svg-inline--fa fa-circle-chevron-up less-plan-icon-btn"
                                                         aria-hidden="true" focusable="false" data-prefix="fas"
                                                         data-icon="circle-chevron-up" role="img"
                                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                         data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                              d="M256 0C114.6 0 0 114.6 0 256c0 141.4 114.6 256 256 256s256-114.6 256-256C512 114.6 397.4 0 256 0zM390.6 310.6c-12.5 12.5-32.75 12.5-45.25 0L256 221.3L166.6 310.6c-12.5 12.5-32.75 12.5-45.25 0s-12.5-32.75 0-45.25l112-112C239.6 147.1 247.8 144 256 144s16.38 3.125 22.62 9.375l112 112C403.1 277.9 403.1 298.1 390.6 310.6z"></path>
                                                    </svg>
                                                    <!-- <i class="fa-solid fa-circle-chevron-up less-plan-icon-btn"></i> Font Awesome fontawesome.com -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Plans End Here -->

        <!-- start contact section -->
        <section class="contact-section pt-100 pb-100" id="frontContactUsTab">
            <div style="width: 100%; display: flex;justify-content: space-between;">
                <span class="border13-new" style="position: absolute;width:100%;"> <img
                        src="{{ asset('assets/images/border5.png') }}" alt="vcard-bg" class="w-100 h-auto"></span>
                <span class="border14-new" style="position: absolute;width:100%;"> <img
                        src="{{ asset('assets/images/border6.png') }}" alt="vcard-bg" class="w-100 h-auto"></span>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="contact-info">
                            <div class="section-heading ms-0 mb-60 d-flex flex-column text-center">
                                <h2 class="d-inline-block csnton-tit-other">{{ __('messages.vcard_11.get_in_touch') }}</h2>
                                <span> <img src="{{ asset('assets/images/border.png') }}" class="w-25 vcard-img"
                                            alt="vcard-img"></span>
                            </div>
                            <div class="d-flex align-items-center contact-info__block">
                                <div class="contact-icon fs-2 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-location-dot icon-purpul"></i>
                                </div>
                                <p class="address-text text-light mb-0">
                                    {{ $setting['address'] }}
                                </p>
                            </div>
                            <div class="d-flex align-items-center contact-info__block">
                                <div class="contact-icon fs-2 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-at icon-purpul"></i>
                                </div>
                                <a href="mailto:{{ $setting['email'] }}"
                                   class="text-decoration-none text-light">{{ $setting['email'] }}</a>
                            </div>
                            <div class="d-flex align-items-center contact-info__block">
                                <div class="contact-icon fs-2 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-phone icon-purpul"></i>
                                </div>
                                <a href=" tel:{{ $setting['phone'] }}"
                                   class="text-decoration-none text-light">{{ '+' . $setting['prefix_code'] . ' ' . $setting['phone'] }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <form class="contact-form" id="myForm">
                            @csrf
                            <div id="contactError" class="alert alert-danger d-none"></div>

                            <p class="text-center mb-40 fs-4 fw-6">{{ __('messages.contact_us.send_message') }}</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input name="name" id="name" type="text" class="form-control front-input"
                                               placeholder="{{ __('messages.front.enter_your_name') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input name="email" id="email" type="email" class="form-control front-input"
                                               placeholder="{{ __('messages.front.enter_your_email') }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <input name="subject" id="subject" type="text" class="form-control front-input"
                                               placeholder="{{ __('messages.common.subject') }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                    <textarea name="message" id="message" rows="4"
                                              class="form-control h-100 form-textarea front-input"
                                              placeholder="{{ __('messages.front.enter_your_message') }}"
                                              required></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <input type="submit" id="submit" name="send"
                                           class="contact-section-submit-btn btn btn-primary w-auto front-input "
                                           value="{{ __('messages.contact_us.send_message') }}">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div style="width: 100%; display: flex; justify-content: space-between;">
                <span class="border3-new" style="position: absolute;width:100%;"> <img
                        src="{{ asset('assets/images/border3.png') }}" alt="vcard-bg" class="w-100 h-auto"></span>
                <span class="border4-new" style="position: absolute;width:100%;"> <img
                        src="{{ asset('assets/images/border4.png') }}" alt="vcard-bg" class="w-100 h-auto"></span>
            </div>
        </section>
        <!-- end contact section -->

    </section>
@endsection
