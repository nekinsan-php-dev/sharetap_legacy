@extends('front.layouts.app1')
@section('title')
    {{ getAppName() }}
@endsection
@section('content')
    <!-- start hero section -->
    <section class="hero-section overflow-hidden">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-6 text-lg-start text-center mb-lg-0 mb-md-5 mb-4">
                    <div class="hero-content">
                        <h1 class="custon-text-sach mb-2 text-uppercase">{{ $setting['home_page_title'] }}</h1>
                        <h2 class="text-white text-weight-700">
                            Revolutionize Your Networking with ShareTap
                        </h2>
                       <p class="text-white">
                        Create, customize, and share your digital business card in seconds. Connect with professionals worldwide and leave a lasting impression.
                       </p>
                    </div>
                </div>
                <div class="col-lg-6 text-center p-5">
                    <div class="hero-img mx-auto">
                        <img src="{{ asset('assets/img/new_home_page/hero-image.png') }}" alt="Vcard"
                            class="zoom-in-zoom-out w-100 h-auto" />
                    </div>

                </div>
            </div>
        </div>
{{--        <div class="main-banner banner-img-1">--}}
{{--            <img src="{{ asset('assets/img/new_home_page/shape-1.png') }}" class="w-100 h-auto" alt="image">--}}
{{--        </div>--}}
{{--        <div class="main-banner banner-img-2">--}}
{{--            <img src="{{ asset('assets/img/new_home_page/shape-2.png') }}" class="w-100 h-auto" alt="image">--}}
{{--        </div>--}}
{{--        <div class="main-banner banner-img-3">--}}
{{--            <img src="{{ asset('assets/img/new_home_page/shape-3.png') }}" class="w-100 h-auto" alt="image">--}}
{{--        </div>--}}
{{--        <div class="main-banner banner-img-4">--}}
{{--            <img src="{{ asset('assets/img/new_home_page/shape-4.png') }}" class="w-100 h-auto" alt="image">--}}
{{--        </div>--}}
{{--        <div class="main-banner banner-img-5">--}}
{{--            <img src="{{ asset('assets/img/new_home_page/shape-5.png') }}" class="w-100 h-auto" alt="image">--}}
{{--        </div>--}}
{{--        <div class="main-banner banner-img-6">--}}
{{--            <img src="{{ asset('assets/img/new_home_page/shape-6.png') }}" class="w-100 h-auto" alt="image">--}}
{{--        </div>--}}
{{--        <div class="main-banner banner-img-7">--}}
{{--            <img src="{{ asset('assets/img/new_home_page/shape-7.png') }}" class="w-100 h-auto" alt="image">--}}
{{--        </div>--}}
{{--        <div class="main-banner banner-img-8">--}}
{{--            <img src="{{ asset('assets/img/new_home_page/shape-8.png') }}" class="w-100 h-auto" alt="image">--}}
{{--        </div>--}}
    </section>
    <!-- end hero section -->


    <section class="bg-gray-100">
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
            {{-- vcard slider --}}
            <section class="vcard-section pb-100" id="">
                <div class="container w-100">
                    <div class="section-heading text-center mb-60 d-flex flex-column">
                        <h2 class="font-weight-700 text-primary">Available Templates</h2>
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
                                <img src="{{ asset('assets/img/templates/home/vcard12.png') }}" class="img-fluid vcard-img"
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

                    </div>
                    <div class="col-12 text-center mt-5">
                        <a href="{{ route('vcard-templates') }}" class="btn btn-outline-primary" role="button"
                            data-turbo="false">{{ __('messages.common.view_more') }}</a>
                    </div>
                </div>
            </section>
        </div>

        <!-- start features section -->
        <section class="features-section" id="frontFeaturesTab" style="background: #e6e0f8; padding-top:30px;">
            <div class="container overflow-hidden">
                <div class="section-heading text-center mb-60 d-flex flex-column">
                    <h2 class="font-weight-700 text-primary">{{ __('messages.plan.features') }}</h2>
                </div>
                <div class="feature-slider">
                    @foreach ($features as $feature)
                        <div class="custon-class-ho">
                            <div class="feature-card" style="background: #fff; border:0px;">
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

        <!-- start testimonial section -->
{{--        @if (!$testimonials->isEmpty())--}}
{{--            <section class="testimonial-section">--}}
{{--                <div class="section-heading text-center mb-60 d-flex flex-column">--}}
{{--                    <h2 class="d-inline-block csnton-tit-other">{{ __('auth.stories_from_our_customers') }}</h2>--}}
{{--                </div>--}}
{{--                <div class="testimonial bg-light pt-50 pb-50">--}}
{{--                    <!--style="background:url('{{ asset('assets/images/testimonials.png') }}');background-repeat: no-repeat; background-size: cover;"-->--}}
{{--                    <div class="container">--}}
{{--                        <div class="row justify-content-center">--}}
{{--                            <div class="col-lg-8">--}}
{{--                                <div class="testimonial-slider">--}}
{{--                                    @foreach ($testimonials as $testimonial)--}}
{{--                                        <div class="">--}}
{{--                                            <div class="testimonial-card mb-60">--}}
{{--                                                <div class="quote-img">--}}
{{--                                                    <img src="{{ asset('assets/img/new_home_page/quote-img.png') }}"--}}
{{--                                                        alt="quotation" class="w-sm-100 w-50 h-auto">--}}
{{--                                                </div>--}}
{{--                                                <div class="profile-img">--}}
{{--                                                    <img src="{{ $testimonial->testimonial_url }}" alt="profile-img"--}}
{{--                                                        class="w-100 h-100 object-fit-cover">--}}
{{--                                                </div>--}}
{{--                                                <div class="profile-desc ps-3">--}}
{{--                                                    <p class="fs-20 mb-0 fw-6">{{ $testimonial->name }}</p>--}}
{{--                                                </div>--}}
{{--                                                <p class="mt-4 mb-0 profile-text text-gray-100">{!! $testimonial->description !!}--}}
{{--                                                </p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                </div>--}}
{{--            </section>--}}
{{--        @endif--}}
        <!-- end testimonial section -->


        <!-- Plans Start Here -->

        <section class="pricing-plan-section py-5" id="frontPricingTab">
            <div class="container">
                <div class="section-heading text-center mb-5">
                    <h2 class="font-weight-bold text-primary">Pricing Plans</h2>
                    <p class="text-muted">Choose a plan that's right for you</p>
                </div>
                <div class="row justify-content-center">
                    @foreach ($plans as $plan)
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                            <div class="card pricing-card h-100 shadow-lg border-0 border-radius-lg hover-scale">
                                <div class="card-body d-flex flex-column p-4">
                                    <h3 class="card-title text-primary text-center mb-3 font-weight-bold">{{ $plan->name ?? 'Plan Name' }}</h3>
                                    <div class="price-wrapper text-center mb-4">
                                        <span class="display-4 font-weight-bold">₹{{ $plan->price ?? '' }}</span>
                                        <small class="text-muted">/ {{ $plan->frequency == 1 ? 'Month' : 'Year' }}</small>
                                    </div>
                                    <p class="text-center mb-4">
                                        <span class="badge bg-primary px-3 py-2 rounded-pill">{{ $plan->no_of_vcards ?? '' }} ShareTaps</span>
                                    </p>
                                    @php
                                        $features = [
                                            'logo' => 'Custom Logo on NFC Card',
                                            'name' => 'Custom Name on NFC Card',
                                            'templates' => ($plan->planFeature->templates > 0 ? "{$plan->planFeature->templates} Profile Template Designs" : 'No Profile Template Designs'),
                                            'nfc_designes' => ($plan->planFeature->nfc_designes > 0 ? "{$plan->planFeature->nfc_designes} ShareTap Card Designs" : 'No ShareTap Card Designs'),
                                            'services' => 'Services',
                                            'testimonials' => 'Testimonials',
                                            'enquiry_form' => 'Enquiry Form',
                                            'social_links' => 'Social Links',
                                            'products' => 'Products',
                                            'gallery' => 'Gallery',
                                        ];
                                    @endphp

                                    <ul class="list-unstyled mb-4">
                                        @foreach ($features as $feature => $label)
                                            <li class="mb-2">
                                                {!! $plan->planFeature->$feature == 1 || $plan->planFeature->$feature > 0
                                                    ? "<i class='fas fa-check-circle text-success me-2'></i> $label"
                                                    : "<i class='fas fa-times-circle text-danger me-2'></i> $label" !!}
                                            </li>
                                        @endforeach
                                    </ul>

                                    <div class="text-center mt-auto">
                                        <a href="{{ url('card/create?plan=' . $plan->id ?? '1') }}"
                                           class="btn btn-primary btn-lg rounded-pill px-4 py-2 font-weight-bold shadow-sm"
                                           data-id="{{ $plan->id }}"
                                           data-plan-price="{{ $plan->price }}"
                                           data-turbo="false">
                                            Choose Plan
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


        <!-- Plans End Here -->

        <section class="about-section py-5 bg-light" id="aboutUsTab">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <div class="section-heading text-center mb-5">
                            <h2 class="font-weight-700 text-primary">{{ __('messages.about_us.about_us') }}</h2>
                            <p class="lead text-muted">Empowering individuals and businesses with innovative digital identity solutions.</p>
                        </div>
                    </div>
                </div>
                <div class="row g-5 align-items-center">
                    <!-- About Content -->
                    <div class="col-12 col-lg-6">
                        <div class="about-info bg-white p-4 p-lg-5 rounded-4 shadow-sm">
                            <h3 class="h3 text-primary mb-4">Our Mission</h3>
                            <p class="text-muted mb-4">
                                ShareTap revolutionizes professional and personal profile sharing. We provide seamless, contactless solutions with personalized NFC cards that bring profiles to life with just a tap. Our goal: make digital identity sharing efficient and innovative for everyone.
                            </p>
                            <h3 class="h3 text-primary mb-4">Our Vision</h3>
                            <p class="text-muted mb-4">
                                We aim to be the leading platform for digital identity sharing, fostering trust and effective connections in our digital world. With 30+ templates, customization options, and cutting-edge NFC technology, ShareTap is transforming self-presentation.
                            </p>
                            <a href="#" class="btn btn-primary btn-lg">Learn More</a>
                        </div>
                    </div>
                    <!-- About Image -->
                    <div class="col-12 col-lg-6">
                        <div class="about-image position-relative overflow-hidden rounded-4 shadow-sm">
                            <img src="https://infyvcards-demo.nyc3.digitaloceanspaces.com/aboutUs/5228/Rectangle-644-(4).png" alt="About ShareTap" class="img-fluid w-100">
                            <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-primary bg-opacity-75">
                                <h3 class="text-white fs-2">Innovating Digital Identity</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- start contact section -->
        <section class="contact-section py-5 bg-white" id="frontContactUsTab">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <div class="section-heading text-center mb-5">
                            <h4 class="font-weight-700 text-primary">{{ __('messages.vcard_11.get_in_touch') }}</h4>
                            <p class="lead text-muted">We're here to help. Send us a message and we'll respond promptly.</p>
                        </div>
                    </div>
                </div>
                <div class="row g-4 align-items-stretch">
                    <div class="col-12 col-lg-5">
                        <div class="contact-info bg-light p-4 p-lg-5 rounded-4 shadow-sm h-100">
                            <h3 class="h3 text-primary mb-4">Contact Information</h3>
                            <div class="d-flex align-items-center mb-4">
                                <div class="contact-icon fs-4 d-flex align-items-center justify-content-center bg-primary text-white rounded-circle me-3" style="width: 50px; height: 50px;">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <p class="fs-5 mb-0">{{ $setting['address'] }}</p>
                            </div>
                            <div class="d-flex align-items-center mb-4">
                                <div class="contact-icon fs-4 d-flex align-items-center justify-content-center bg-primary text-white rounded-circle me-3" style="width: 50px; height: 50px;">
                                    <i class="fa-solid fa-at"></i>
                                </div>
                                <a href="mailto:{{ $setting['email'] }}" class="fs-5 text-decoration-none text-dark">{{ $setting['email'] }}</a>
                            </div>
                            <div class="d-flex align-items-center mb-4">
                                <div class="contact-icon fs-4 d-flex align-items-center justify-content-center bg-primary text-white rounded-circle me-3" style="width: 50px; height: 50px;">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <a href="tel:{{ $setting['phone'] }}" class="fs-5 text-decoration-none text-dark">{{ '+' . $setting['prefix_code'] . ' ' . $setting['phone'] }}</a>
                            </div>
                            <div class="mt-5">
                                <h4 class="h5 mb-3">Follow Us</h4>
                                <div class="d-flex gap-3">
                                    <a href="#" class="btn btn-outline-primary "><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="btn btn-outline-primary "><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="btn btn-outline-primary "><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#" class="btn btn-outline-primary "><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7">
                        <form class="contact-form bg-light p-4 p-lg-5 rounded-4 shadow-sm h-100" id="myForm">
                            @csrf
                            <div id="contactError" class="alert alert-danger d-none"></div>

                            <h3 class="h3 text-primary mb-4">Send Us a Message</h3>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input name="name" id="name" type="text" class="form-control" placeholder="{{ __('messages.front.enter_your_name') }}" required>
                                        <label for="name">{{ __('messages.front.enter_your_name') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input name="email" id="email" type="email" class="form-control" placeholder="{{ __('messages.front.enter_your_email') }}" required>
                                        <label for="email">{{ __('messages.front.enter_your_email') }}</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input name="subject" id="subject" type="text" class="form-control" placeholder="{{ __('messages.common.subject') }}" required>
                                        <label for="subject">{{ __('messages.common.subject') }}</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea name="message" id="message" class="form-control" style="height: 150px" placeholder="{{ __('messages.front.enter_your_message') }}" required></textarea>
                                        <label for="message">{{ __('messages.front.enter_your_message') }}</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" id="submit" name="send" class="btn btn-primary btn-lg w-100">
                                        {{ __('messages.contact_us.send_message') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- end contact section -->

    </section>
@endsection
