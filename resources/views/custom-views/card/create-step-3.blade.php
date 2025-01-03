@extends('layouts.auth')
@section('title')
    {{ __('messages.common.register') }}
@endsection
@section('content')
<div class="container py-5">
    <!-- Header Section -->
    <div class="text-center mb-5">
        <x-main-logo class="mb-4"/>
        <h2 class="text-primary fw-bold">Complete Your Profile</h2>
        <p class="text-muted">Add your images and social media links to personalize your card</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Error Message -->
    <div class="alert alert-danger mt-4" id="error-message" style="display: none;">
        <i class="fas fa-exclamation-circle me-2"></i>
        <span id="error-text"></span>
    </div>

    <form id="profileForm" action="{{ route('card.temp-store-step-three-store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <!-- Progress Section -->
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                        <span class="fw-bold">3</span>
                    </div>
                    <h4 class="ms-3 mb-0">Profile Customization</h4>
                </div>

                <!-- Cover & Profile Image Section -->
                <div class="mb-5">
                    <div class="position-relative rounded-3 overflow-hidden" style="height: 300px;">
                        <div class="cover-image-container" style="height: 250px;">
                            <div id="coverPreview" class="w-100 h-100 bg-light d-flex flex-column justify-content-center align-items-center border rounded-3">
                                <i class="fas fa-image fa-3x text-muted mb-3"></i>
                                <h5 class="text-primary mb-2">Upload Cover Picture</h5>
                                <p class="text-muted mb-1 small">Recommended size: 1200x300 pixels</p>
                                <p class="text-muted mb-1 small">Max file size: 5MB</p>
                                <p class="text-muted small">Supported formats: JPG, PNG, GIF</p>
                            </div>
                            <label for="coverImg" class="position-absolute top-0 end-0 m-3 btn btn-light btn-sm shadow-sm">
                                <i class="fas fa-camera me-1"></i> Change Cover
                                <input type="file" id="coverImg" name="cover_img" class="d-none" accept="image/*">
                            </label>
                        </div>
                        <div class="position-absolute" style="bottom: 0; left: 30px; width: 150px; height: 150px;">
                            <div id="profilePreview" class="rounded-circle bg-white shadow d-flex justify-content-center align-items-center border-4 border-white" style="width: 100%; height: 100%;">
                                <i class="fas fa-user fa-3x text-muted"></i>
                            </div>
                            <label for="profile_image" class="position-absolute bottom-0 end-0 btn btn-primary rounded-circle p-2 shadow-sm" style="width: 40px; height: 40px;">
                                <i class="fas fa-camera"></i>
                                <input type="file" id="profile_image" name="profile_img" class="d-none" accept="image/*">
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Social Media Section -->
                <h4 class="text-primary fw-bold mb-4">Social Media Links</h4>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="input-group shadow-sm">
                            <span class="input-group-text bg-white border-end-0"><i class="fas fa-globe fa-fw text-primary"></i></span>
                            <input type="text" class="form-control border-start-0" placeholder="Website URL" name="website">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group shadow-sm">
                            <span class="input-group-text bg-white border-end-0"><i class="fab fa-twitter fa-fw text-info"></i></span>
                            <input type="text" class="form-control border-start-0" placeholder="Twitter URL" name="twitter">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group shadow-sm">
                            <span class="input-group-text bg-white border-end-0"><i class="fab fa-facebook fa-fw text-primary"></i></span>
                            <input type="text" class="form-control border-start-0" placeholder="Facebook URL" name="facebook">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group shadow-sm">
                            <span class="input-group-text bg-white border-end-0"><i class="fab fa-instagram fa-fw text-danger"></i></span>
                            <input type="text" class="form-control border-start-0" placeholder="Instagram URL" name="instagram">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group shadow-sm">
                            <span class="input-group-text bg-white border-end-0"><i class="fab fa-linkedin fa-fw text-primary"></i></span>
                            <input type="text" class="form-control border-start-0" placeholder="LinkedIn URL" name="linkedin">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group shadow-sm">
                            <span class="input-group-text bg-white border-end-0"><i class="fab fa-whatsapp fa-fw text-success"></i></span>
                            <input type="text" class="form-control border-start-0" placeholder="WhatsApp URL" name="whatsapp">
                        </div>
                    </div>
                </div>

                <!-- Additional Information Section -->
                <h4 class="text-primary fw-bold mb-4 mt-5">Additional Information</h4>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="form-floating shadow-sm">
                            <input type="email" class="form-control" id="email" value="{{ $user['email'] }}" disabled>
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating shadow-sm">
                            <textarea class="form-control" name="address" id="address" placeholder="Enter your address" style="height: 100px"></textarea>
                            <label for="address">Address</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating shadow-sm">
                            <textarea class="form-control" name="delivery_address" id="delivery_address" placeholder="Enter your shipping address" style="height: 100px" required></textarea>
                            <label for="delivery_address">Shipping Address<span class="text-danger">*</span></label>
                            <div class="invalid-feedback">
                                Please provide a shipping address.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="card-footer bg-light p-4">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('card.temp-store-step-two') }}" class="btn btn-outline-secondary px-4">
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
.form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
}

.input-group-text {
    border: 1px solid #ced4da;
}

.input-group:hover {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.form-floating > .form-control:focus ~ label,
.form-floating > .form-control:not(:placeholder-shown) ~ label {
    color: #0d6efd;
}

.cover-image-container {
    transition: all 0.3s ease;
}

.profile-image-container label:hover {
    transform: scale(1.1);
    transition: transform 0.2s ease;
}

.was-validated .form-control:invalid,
.form-control.is-invalid {
    border-color: #dc3545;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right calc(0.375em + 0.1875rem) center;
    background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
}

.was-validated .form-control:invalid:focus,
.form-control.is-invalid:focus {
    border-color: #dc3545;
    box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
}
</style>

<script>
function previewImage(input, previewId) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            var preview = document.getElementById(previewId);
            preview.innerHTML = '';
            var img = document.createElement('img');
            img.src = e.target.result;
            img.style.width = '100%';
            img.style.height = '100%';
            img.style.objectFit = 'cover';
            preview.appendChild(img);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('profileForm');
    const shippingAddress = document.getElementById('delivery_address');
    const errorMessage = document.getElementById('error-message');
    const errorText = document.getElementById('error-text');

    // Image preview handlers
    document.getElementById('profile_image').addEventListener('change', function() {
        previewImage(this, 'profilePreview');
    });

    document.getElementById('coverImg').addEventListener('change', function() {
        previewImage(this, 'coverPreview');
    });

    // Form validation
    form.addEventListener('submit', function(e) {
        let isValid = true;
        errorMessage.style.display = 'none';

        // Validate shipping address
        if (!shippingAddress.value.trim()) {
            e.preventDefault();
            isValid = false;
            shippingAddress.classList.add('is-invalid');
            errorText.textContent = 'Shipping address is required.';
            errorMessage.style.display = 'block';
            shippingAddress.focus();

            // Smooth scroll to error message
            errorMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
        } else {
            shippingAddress.classList.remove('is-invalid');
        }

        return isValid;
    });

    // Real-time validation for shipping address
    shippingAddress.addEventListener('input', function() {
        if (this.value.trim()) {
            this.classList.remove('is-invalid');
            errorMessage.style.display = 'none';
        } else {
            this.classList.add('is-invalid');
        }
    });
});
</script>
@endsection
