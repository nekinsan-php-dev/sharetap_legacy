@extends('layouts.auth')
@section('title')
    {{ __('Choose Your NFC Card Design') }}
@endsection
@section('content')
    <div class="container mt-5">
        <div class="text-center mb-4">
            <x-main-logo class="mb-4" />
            <h4 class="card-title text-primary">Choose Your NFC Card Design</h4>
            <p class="text-muted">Select a design that best represents you or your business.</p>
        </div>
        <form action="{{ route('card.checkout') }}" method="get" enctype="multipart/form-data">
            <div class="card shadow mb-4 border-0" style="border-radius: 15px;">
                <div class="card-body" style="background-color: #f0f8ff;">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @csrf
                    <div class="row g-4">
                        @foreach ($nfcTemplates as $template)
                            <div class="col-md-6 mb-3">
                                <div class="card h-100 shadow-sm template-card"
                                    onclick="selectTemplate(this, {{ $template->id }})">
                                    <div class="card-body p-3">
                                        <h5 class="card-title mb-3">{{ $template->name }}</h5>
                                        <div class="row g-2">
                                            <div class="col-6">
                                                <img src="{{ asset($template->front_path) }}" class="img-fluid rounded"
                                                    alt="Front of {{ $template->name }}" loading="lazy">
                                                <p class="text-muted small mt-1">Front</p>
                                            </div>
                                            <div class="col-6">
                                                <img src="{{ asset($template->back_path) }}" class="img-fluid rounded"
                                                    alt="Back of {{ $template->name }}" loading="lazy">
                                                <p class="text-muted small mt-1">Back</p>
                                            </div>
                                        </div>
                                        <div class="form-check mt-3">
                                            <input class="form-check-input" type="radio" name="nfc_card_id"
                                                value="{{ $template->id }}" id="template-{{ $template->id }}"
                                                style="border-radius: 10px;">
                                            <label class="form-check-label" for="template-{{ $template->id }}">
                                                Select This Design
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="card-footer d-flex justify-content-between p-4">
                    <a href="{{ route('card.temp-store-step-three') }}" class="btn btn-outline-danger">Previous</a>
                    <button type="submit" class="btn btn-primary">Proceed to Checkout</button>
                </div>
            </div>
        </form>
    </div>

    <style>
        .template-card {
            transition: all 0.3s ease;
            cursor: pointer;
            border-radius: 15px;
        }

        .template-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        }

        .template-card.selected {
            border: 2px solid #007bff;
        }
    </style>

    <script>
        function selectTemplate(card, id) {
            $('.template-card').removeClass('selected');
            $(card).addClass('selected');
            $('input[name="nfc_card_id"]').prop('checked', false);
            $(card).find('input[name="nfc_card_id"]').prop('checked', true);
            $('input[name="nfc_card_id"]').val(id);
        }
    </script>
@endsection
