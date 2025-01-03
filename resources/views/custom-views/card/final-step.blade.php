@extends('layouts.auth')
@section('title')
    {{ __('Choose Your NFC Card Design') }}
@endsection
@section('content')
<div class="container py-5">
    <!-- Header Section -->
    <div class="text-center mb-5">
        <x-main-logo class="mb-4"/>
        <h2 class="text-primary fw-bold">Choose Your NFC Card Design</h2>
        <p class="text-muted">Select a design that best represents you or your business</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('card.checkout') }}" method="get" enctype="multipart/form-data">
        @csrf
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <!-- Progress Section -->
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                        <span class="fw-bold">4</span>
                    </div>
                    <h4 class="ms-3 mb-0">Card Design Selection</h4>
                </div>

                <!-- NFC Cards Grid -->
                <div class="row g-4">
                    @foreach($nfcTemplates as $template)
                    <div class="col-md-6">
                        <div class="card h-100 template-card border-2 shadow-sm" onclick="selectTemplate(this, {{ $template->id }})">
                            <div class="card-body p-4">
                                <h5 class="card-title text-primary fw-bold mb-3">{{ $template->name }}</h5>
                                <div class="row g-3">
                                    <!-- Front Image -->
                                    <div class="col-6">
                                        <div class="card-image-container">
                                            <img src="{{ asset($template->front_path) }}"
                                                 alt="Front of {{ $template->name }}"
                                                 loading="lazy">
                                            <p class="text-muted small mt-2 text-center mb-0">Front View</p>
                                        </div>
                                    </div>
                                    <!-- Back Image -->
                                    <div class="col-6">
                                        <div class="card-image-container">
                                            <img src="{{ asset($template->back_path) }}"
                                                 alt="Back of {{ $template->name }}"
                                                 loading="lazy">
                                            <p class="text-muted small mt-2 text-center mb-0">Back View</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check mt-4">
                                    <input class="form-check-input"
                                           type="radio"
                                           name="nfc_card_id"
                                           value="{{ $template->id }}"
                                           id="template-{{ $template->id }}">
                                    <label class="form-check-label fw-medium" for="template-{{ $template->id }}">
                                        Select This Design
                                    </label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title text-primary fw-bold mb-0">{{ $template->name }}</h5>
                <button type="button"
                        class="btn btn-light btn-sm shadow-sm preview-btn"
                        onclick="event.stopPropagation(); previewTemplate('{{ $template->name }}', '{{ asset($template->front_path) }}', '{{ asset($template->back_path) }}', {{ $template->id }})">
                    <i class="fas fa-eye me-1"></i> Preview
                </button>
            </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Footer -->
            <div class="card-footer bg-light p-4">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('card.temp-store-step-three') }}" class="btn btn-outline-secondary px-4">
                        <i class="fas fa-arrow-left me-2"></i> Previous
                    </a>
                    <button type="submit" class="btn btn-primary px-4">
                        Proceed to Checkout <i class="fas fa-arrow-right ms-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="templatePreviewModal" tabindex="-1" aria-labelledby="templatePreviewModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title text-primary fw-bold" id="previewTemplateTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="preview-image-container">
                            <img id="previewFrontImage" src="" alt="Front View" class="w-100 rounded-3">
                            <p class="text-muted text-center mt-2">Front View</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="preview-image-container">
                            <img id="previewBackImage" src="" alt="Back View" class="w-100 rounded-3">
                            <p class="text-muted text-center mt-2">Back View</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="selectTemplateBtn">Select This Design</button>
            </div>
        </div>
    </div>
</div>

<style>
.template-card {
    pointer-events: none;
}

.template-card > * {
    pointer-events: auto;
}

.template-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1) !important;
}

.template-card.selected {
    border-color: #0d6efd !important;
    background-color: rgba(13, 110, 253, 0.02);
}
.template-card .form-check {
    z-index: 1;
    position: relative;
}

/* Image container styles */
.card-image-container {
    position: relative;
    width: 100%;
    height: 200px;
    border-radius: 8px;
    overflow: hidden;
    background-color: #f8f9fa;
}

.card-image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.template-card:hover .card-image-container img {
    transform: scale(1.05);
}

.form-check-input {
    cursor: pointer;
    width: 1.2em;
    height: 1.2em;
}

.form-check-input:checked {
    background-color: #0d6efd;
    border-color: #0d6efd;
}

.form-check-label {
    cursor: pointer;
}

@media (max-width: 768px) {
    .col-md-6 {
        padding: 0.5rem;
    }

    .card-body {
        padding: 1rem !important;
    }

    .card-image-container {
        height: 150px;
    }
}

.preview-btn {
    transition: all 0.2s ease;
    border-radius: 20px;
    padding: 0.4rem 1rem;
}

.preview-btn:hover {
    background-color: #e9ecef;
    transform: scale(1.05);
}

.modal-content {
    border: none;
    border-radius: 15px;
}

.preview-image-container {
    position: relative;
    overflow: hidden;
    border-radius: 12px;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.preview-image-container img {
    width: 100%;
    height: auto;
    transition: transform 0.3s ease;
}

.preview-image-container:hover img {
    transform: scale(1.05);
}
</style>

<script>
let currentTemplateId = null;

function previewTemplate(name, frontImage, backImage, templateId) {
    currentTemplateId = templateId;

    // Update modal content
    document.getElementById('previewTemplateTitle').textContent = name;
    document.getElementById('previewFrontImage').src = frontImage;
    document.getElementById('previewBackImage').src = backImage;

    // Show modal
    const modal = new bootstrap.Modal(document.getElementById('templatePreviewModal'));
    modal.show();
}

document.addEventListener('DOMContentLoaded', function() {
    // Initialize any pre-selected template
    const selectedInput = document.querySelector('input[name="nfc_card_id"]:checked');
    if (selectedInput) {
        const card = selectedInput.closest('.template-card');
        if (card) {
            card.classList.add('selected');
        }
    }
});

 document.getElementById('selectTemplateBtn').addEventListener('click', function() {
        if (currentTemplateId) {
            // Find the template card and select it
            const templateCard = document.querySelector(`.template-card input[value="${currentTemplateId}"]`).closest('.template-card');
            selectTemplate(templateCard, currentTemplateId);

            // Close the modal
            bootstrap.Modal.getInstance(document.getElementById('templatePreviewModal')).hide();
        }
    });

window.selectTemplate = function(card, id) {
        // Remove selection from all cards
        document.querySelectorAll('.template-card').forEach(el => {
            el.classList.remove('selected');
        });

        // Remove checked from all radio buttons
        document.querySelectorAll('input[name="nfc_card_id"]').forEach(el => {
            el.checked = false;
        });

        // Add selection to clicked card
        card.classList.add('selected');

        // Check the radio button
        const radio = card.querySelector('input[name="nfc_card_id"]');
        if (radio) {
            radio.checked = true;
        }
    };
</script>
@endsection
