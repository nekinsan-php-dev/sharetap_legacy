@extends('front.layouts.app1')
@section('title')
    {{ getAppName() }}
@endsection
@section('content')

    <!-- start hero section -->
    <section class="hero-section bg-primary pt-100 pb-60">
        <div class="container pt-60 mt-3">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="fs-40 text-white"> ShareTap Templates</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- end hero section -->
    <!--start vcard-template-section -->

    @php

 $TEMPLATE_NAME = [
        1 => 'Simple_Contact',
        2 => 'Executive_Profile',
        3 => 'Clean_Canvas',
        4 => 'Professional',
        5 => 'Corporate_Connect',
        6 => 'Modern_Edge',
        7 => 'Business_Beacon',
        8 => 'Corporate_Classic',
        9 => 'Corporate_Identity',
        10 => 'Pro_Network',
        11 => 'Portfolio',
        12 => 'Gym',
        13 => 'Hospital',
        14 => 'Event_Management',
        15 => 'Salon',
        16 => 'Lawyer',
        17 => 'Programmer',
        18 => 'CEO/CXO',
        19 => 'Fashion_Beauty',
        20 => 'Culinary_Food_Services',
        21 => 'Social_Media',
        22 => 'Dynamic_vcard',
        23 => 'Consulting_Services',
        24 => 'School_Templates',
        25 => 'Social_Services',
        26 => 'Retail_E-commerce',
        27 => 'Pet_Shop',
        28 => 'Pet_Clinic',


    ];
    @endphp
    <div class="vcard-template-section pt-60 pb-60 position-relative">
        <div class="container">
            <div class="row">
                @foreach (getTemplateUrls() as $id => $url)
                    <div class="col-lg-4 col-sm-6 mb-60">
                        <div class="template-card h-100 @if($id == 22) ribbon-box position-relative @endif">
                            <div class="card-img">
                                <img src="{{ $url }}" class="w-100 img-fluid">
                            </div>
                            @if($id == 22)
                            <div class="ribbon-wrapper">
                                <div class="ribbon fw-bold">{{ __('messages.feature.dynamic_vcard') }}</div>
                            </div>
                            @endif
                            <div class="card-body p-0 pt-4 mt-1">
                                <h6 class="fs-20 text-center">{{ __('messages.' . $TEMPLATE_NAME[$id]) }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end vcard-template-section -->
@endsection
