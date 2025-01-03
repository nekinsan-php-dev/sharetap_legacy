@extends('layouts.auth')
@section('title')
    {{ __('messages.common.register') }}
@endsection
@section('content')
<div class="container py-5">
    <!-- Header Section -->
    <div class="text-center mb-5">
        <x-main-logo class="mb-4"/>
        <h2 class="text-primary fw-bold">Choose Your Template</h2>
        <p class="text-muted">Select up to 3 templates that best represent your profile</p>
    </div>
 <!-- Error Message -->
                <div class="alert alert-danger mt-4" id="error-message" style="display: none;">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <span id="error-text"></span>
                </div>
    <form id="templateForm" action="{{ route('card.temp-store-step-two-store') }}" method="post">
        @csrf
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <!-- Progress Section -->
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                        <span class="fw-bold">2</span>
                    </div>
                    <h4 class="ms-3 mb-0">Template Selection</h4>
                </div>

                <!-- Templates Grid -->
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                    @foreach($templates as $template)
                    <div class="col">
                        <div class="card h-100 template-card border-2">
    <div class="position-relative image-container">
        <div class="scroll-wrapper">
            <img src="{{ asset($template->path) }}" class="card-img-top" alt="{{ $template->name }}">
        </div>
        <div class="template-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center"
             style="background: rgba(0,0,0,0.5); opacity: 0; transition: all 0.3s;">
            <div class="text-center text-white p-3">
                <h5 class="mb-2">{{ $template->name }}</h5>
                <p class="mb-0 small">Click to select this template</p>
            </div>
        </div>
        <div class="position-absolute top-2 end-2 p-2">
            <div class="form-check">
                <input class="form-check-input template-checkbox" type="checkbox"
                       name="template_id[]" value="{{ $template->id }}"
                       id="template{{ $template->id }}"
                       style="width: 20px; height: 20px;">
            </div>
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
                    <a href="{{ route('card.create') }}" class="btn btn-outline-secondary px-4">
                        <i class="fas fa-arrow-left me-2"></i> Previous
                    </a>
                    <button type="submit" class="btn btn-primary px-4">
                        Next <i class="fas fa-arrow-right ms-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<style>
.template-card {
    transition: all 0.3s ease;
    cursor: pointer;
}

.template-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

.template-card:hover .template-overlay {
    opacity: 1;
}

.template-card.selected {
    border-color: #0d6efd;
}

.top-2 {
    top: 0.5rem;
}

.end-2 {
    right: 0.5rem;
}

/* Custom checkbox styling */
.form-check-input {
    cursor: pointer;
    background-color: white;
    border: 2px solid #dee2e6;
}

.form-check-input:checked {
    background-color: #0d6efd;
    border-color: #0d6efd;
}

@media (max-width: 576px) {
    .row-cols-1 > * {
        padding: 0.5rem;
    }

    .template-card img {
        height: 150px;
    }
}

.image-container {
    height: 200px;
    overflow: hidden;
    position: relative;
}

.scroll-wrapper {
    transition: transform 4s ease-in-out; /* Faster scroll */
}

.scroll-wrapper img {
    min-height: 100%;
    width: 100%;
    object-fit: cover;
}


.template-card:hover .scroll-wrapper {
    transform: translateY(calc(-100% + 200px)); /* 200px is container height */
}

/* Reset transform when not hovering */
.template-card .scroll-wrapper {
    transform: translateY(0);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.template-checkbox');
    const errorMessage = document.getElementById('error-message');
    const errorText = document.getElementById('error-text');

    // Function to update card selected state
    function updateCardState(checkbox) {
        const card = checkbox.closest('.template-card');
        if (checkbox.checked) {
            card.classList.add('selected');
        } else {
            card.classList.remove('selected');
        }
    }

    // Handle checkbox changes
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const selectedCount = document.querySelectorAll('.template-checkbox:checked').length;

            if (selectedCount > 3) {
                this.checked = false;
                errorText.textContent = 'You can select up to 3 templates.';
                errorMessage.style.display = 'block';
                return;
            }

            updateCardState(this);
            errorMessage.style.display = 'none';
        });

        // Add click handler for the entire card
        const card = checkbox.closest('.template-card');
        card.addEventListener('click', function(e) {
            if (!e.target.classList.contains('template-checkbox')) {
                const checkbox = this.querySelector('.template-checkbox');
                checkbox.checked = !checkbox.checked;
                checkbox.dispatchEvent(new Event('change'));
            }
        });
    });

    // Form submission validation
    document.getElementById('templateForm').addEventListener('submit', function(e) {
        const selectedCount = document.querySelectorAll('.template-checkbox:checked').length;

        if (selectedCount < 1 || selectedCount > 3) {
            e.preventDefault();
            errorText.textContent = 'Please select between 1 and 3 templates.';
            errorMessage.style.display = 'block';

            // Smooth scroll to error message
            errorMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    });

     const templateCards = document.querySelectorAll('.template-card');

     templateCards.forEach(card => {
        const scrollWrapper = card.querySelector('.scroll-wrapper');
        const img = card.querySelector('img');

        // Wait for image to load to get proper height
        img.addEventListener('load', function() {
            const containerHeight = 200; // Fixed container height
            const imageHeight = this.offsetHeight;
            const scrollDistance = imageHeight - containerHeight;

            card.addEventListener('mouseenter', () => {
                if (scrollWrapper && scrollDistance > 0) {
                    scrollWrapper.style.transform = `translateY(-${scrollDistance}px)`;
                }
            });

            card.addEventListener('mouseleave', () => {
                if (scrollWrapper) {
                    scrollWrapper.style.transform = 'translateY(0)';
                }
            });
        });
    });
});
</script>
@endsection
