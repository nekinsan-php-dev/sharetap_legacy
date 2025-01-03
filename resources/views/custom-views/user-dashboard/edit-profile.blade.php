@extends('custom-views.layouts.app')
@section('title')
    {{__('messages.dashboard')}}
@endsection
@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-12">
            @include('layouts.errors')
            @include('flash::message')

            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h4 class="mb-0">Edit Profile</h4>
                </div>

                <form method="POST" action="{{ route('user.profile.edit') }}"
                      id="userProfileEditForm"
                      enctype="multipart/form-data"
                      class="needs-validation"
                      novalidate>
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <!-- Profile Image -->
                        <div class="row mb-4">
                            <div class="col-lg-4">
                                <label class="form-label fw-bold required">Profile Picture</label>
                            </div>
                            <div class="col-lg-8">
                                <div class="position-relative d-inline-block">
                                    <img src="{{ $user->profile_img }}" class="rounded-circle" alt="Profile Picture"
                                         style="width: 120px; height: 120px; object-fit: cover;" id="profileImagePreview">
                                    <label class="position-absolute bottom-0 end-0 mb-2 me-2 bg-white rounded-circle p-2 shadow-sm"
                                           style="cursor: pointer;">
                                        <i class="fas fa-camera text-primary"></i>
                                        <input type="file" name="profile_img" class="d-none" accept="image/*"
                                               onchange="document.getElementById('profileImagePreview').src = URL.createObjectURL(this.files[0])">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Cover Image -->
                        <div class="row mb-4">
                            <div class="col-lg-4">
                                <label class="form-label fw-bold required">Cover Image</label>
                            </div>
                            <div class="col-lg-8">
                                <div class="position-relative">
                                    <img src="{{ $user->cover_img }}" class="rounded" alt="Cover Image"
                                         style="height: 200px; object-fit: cover;" id="coverImagePreview">
                                    <label class="position-absolute bottom-0 end-0 mb-3 me-3 bg-white rounded-circle p-2 shadow-sm"
                                           style="cursor: pointer;">
                                        <i class="fas fa-camera text-primary"></i>
                                        <input type="file" name="cover_img" class="d-none" accept="image/*"
                                               onchange="document.getElementById('coverImagePreview').src = URL.createObjectURL(this.files[0])">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Full Name -->
                        <div class="row mb-4">
                            <div class="col-lg-4">
                                <label class="form-label fw-bold">Full Name</label>
                            </div>
                            <div class="col-lg-8">
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <input type="text"
                                               name="first_name"
                                               class="form-control"
                                               value="{{ $user->first_name }}"
                                               placeholder="First Name"
                                               required>
                                        <div class="invalid-feedback">Please enter first name</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text"
                                               name="last_name"
                                               class="form-control"
                                               value="{{ $user->last_name }}"
                                               placeholder="Last Name"
                                               required>
                                        <div class="invalid-feedback">Please enter last name</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="row mb-4">
                            <div class="col-lg-4">
                                <label class="form-label fw-bold required">Email Address</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       value="{{ $user->email }}"
                                       placeholder="Email Address"
                                       required>
                                <div class="invalid-feedback">Please enter a valid email address</div>
                            </div>
                        </div>

                        <!-- Contact Number -->
                        <div class="row mb-4">
                            <div class="col-lg-4">
                                <label class="form-label fw-bold required">Contact Number</label>
                            </div>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <span class="input-group-text">+{{ $user->region_code ?? '' }}</span>
                                    <input type="tel"
                                           name="contact"
                                           class="form-control"
                                           value="{{ $user->contact }}"
                                           placeholder="Contact Number"
                                           pattern="[0-9]{10}"
                                           required>
                                    <input type="hidden" name="region_code" value="{{ $user->region_code }}">
                                </div>
                                <div class="form-text text-danger">Enter a valid contact number</div>
                                <div class="invalid-feedback">Please enter a valid contact number</div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-light">
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Save Changes
                            </button>
                            @role(\App\Models\Role::ROLE_ADMIN)
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i> Cancel
                            </a>
                            @endrole
                            @role(\App\Models\Role::ROLE_SUPER_ADMIN)
                            <a href="{{ route('sadmin.dashboard') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i> Cancel
                            </a>
                            @endrole
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Form validation
(function () {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')
    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
            form.classList.add('was-validated')
        }, false)
    })
})()

// Initialize phone input validation
const phoneInput = document.querySelector('input[name="contact"]');
phoneInput.addEventListener('input', function(e) {
    this.value = this.value.replace(/[^0-9]/g, '');
});


function initImagePreview(inputElement, previewElement) {
    const fileInput = document.querySelector(inputElement);
    const preview = document.querySelector(previewElement);

    if (!fileInput || !preview) return;

    fileInput.addEventListener('change', function(e) {
        const file = this.files[0];

        if (!file) {
            return;
        }

        // Validate file type
        if (!file.type.startsWith('image/')) {
            alert('Please select an image file');
            this.value = '';
            return;
        }

        // Validate file size (max 5MB)
        const maxSize = 5 * 1024 * 1024; // 5MB in bytes
        if (file.size > maxSize) {
            alert('Image size should not exceed 5MB');
            this.value = '';
            return;
        }

        // Create and revoke object URL to prevent memory leaks
        const objectUrl = URL.createObjectURL(file);

        // Update preview image
        preview.src = objectUrl;

        // Add load event to revoke object URL after image loads
        preview.onload = function() {
            URL.revokeObjectURL(objectUrl);
        };
    });
}

// Initialize preview for both profile and cover images
document.addEventListener('DOMContentLoaded', function() {
    // Initialize profile image preview
    initImagePreview(
        'input[name="profile_img"]',
        '#profileImagePreview'
    );

    // Initialize cover image preview
    initImagePreview(
        'input[name="cover_img"]',
        '#coverImagePreview'
    );

    // Add loading state during upload
    const form = document.getElementById('userProfileEditForm');
    if (form) {
        form.addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Saving...';
            }
        });
    }
});

</script>

@endsection
