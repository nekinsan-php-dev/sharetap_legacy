@extends('front.layouts.app1')

@section('title')
    {{ getAppName() }} - NFC Cards
@endsection

@section('content')

<style>
    .card-hover {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .modal-card-image {
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease-in-out;
    }
    .modal-card-image:hover {
        transform: scale(1.05);
    }
    .feature-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
    }
</style>

<div class="container py-5">
    <h1 class="text-center mb-5 display-4 fw-bold">Explore Our NFC Cards</h1>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($nfc as $item)
        <div class="col">
            <div class="card h-100 border-0 card-hover">
                <div class="card-body p-4">
                    <div class="position-relative p-4">
                        <img src="{{ asset($item->front_path) }}" class="card-img-top rounded-top" alt="Front of {{ $item->name }}" loading="lazy">
                        <div class="position-absolute top-0 end-0 m-3">
                            <span class="badge bg-primary rounded-pill px-3 py-2">NFC Enabled</span>
                        </div>
                    </div>
                    <div class="p-4">
                        <h5 class="card-title fw-bold mb-2">{{ $item->name }}</h5>
                        <p class="card-text text-muted">Tap to share your digital profile instantly</p>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top-0 p-4">
                    <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#cardModal{{ $item->id }}">
                        View Details
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="cardModal{{ $item->id }}" tabindex="-1" aria-labelledby="cardModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0 shadow-lg">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title fw-bold" id="cardModalLabel{{ $item->id }}">{{ $item->name }} Details</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-5">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <img src="{{ asset($item->front_path) }}" class="img-fluid modal-card-image" alt="Front of {{ $item->name }}">
                                <p class="text-center mt-3 text-muted">Front View</p>
                            </div>
                            <div class="col-md-6">
                                <img src="{{ asset($item->back_path) }}" class="img-fluid modal-card-image" alt="Back of {{ $item->name }}">
                                <p class="text-center mt-3 text-muted">Back View</p>
                            </div>
                        </div>
                        <div class="mt-5">
                            <h6 class="fw-bold mb-4">Key Features:</h6>
                            <div class="d-flex align-items-center mb-3">
                                <div class="feature-icon">
                                    <i class="fas fa-wifi text-primary"></i>
                                </div>
                                <span>NFC-enabled for quick sharing</span>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="feature-icon">
                                    <i class="fas fa-shield-alt text-primary"></i>
                                </div>
                                <span>Durable and stylish design</span>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="feature-icon">
                                    <i class="fas fa-mobile-alt text-primary"></i>
                                </div>
                                <span>Compatible with all smartphones</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 justify-content-center">
                        <button type="button" class="btn btn-outline-secondary px-4 py-2" data-bs-dismiss="modal">Close</button>
                        <a href="{{ url('/card/create') }}" class="btn btn-primary px-4 py-2">Order Now</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    // Add hover effect to cards
    document.querySelectorAll('.hover-shadow').forEach(card => {
        card.addEventListener('mouseenter', () => card.classList.add('shadow'));
        card.addEventListener('mouseleave', () => card.classList.remove('shadow'));
    });
</script>
@endsection
