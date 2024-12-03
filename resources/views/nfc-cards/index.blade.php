@extends('front.layouts.app1')

@section('title')
    {{ getAppName() }}
@endsection

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-4 display-5 fw-bold">NFC Cards</h1>
        <div class="row">
            @foreach ($nfc as $item)
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div style="padding-bottom: 15px;">
                        <div>
                            <h5 class="card-title fw-bold mb-0 text-dark text-capitalize">{{ $item->name }}</h5>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="p-1">
                                <img src="{{ asset($item->front_path) }}" class="img-fluid rounded shadow lazyload"
                                    alt="Front of {{ $item->name }}" loading="lazy">
                            </div>
                            <div class="p-1">
                                <img src="{{ asset($item->back_path) }}" class="img-fluid rounded shadow lazyload"
                                    alt="Back of {{ $item->name }}" loading="lazy">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
