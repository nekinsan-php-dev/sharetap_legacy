@extends('custom-views.layouts.app')

@section('title')
    {{ __('messages.dashboard') }}
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white py-3">
            <h2 class="h3 mb-0 text-gray-800">Edit Service</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('user.services.update.data', $service->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="form-label required">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $service->name }}" required>
                </div>

                <div class="mb-4">
                    <label for="service_url" class="form-label">Service URL</label>
                    <input type="url" class="form-control" id="service_url" name="service_url" value="{{ $service->service_url }}">
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label required">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required>{{ $service->description }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="serviceIcon" class="form-label required">Service Icon</label>
                    <div>
                        <div class="image-upload-container me-3">
                            <img id="servicePreview" class="img-thumbnail" src="{{ $service->service_icon }}" alt="Service Icon" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="image-upload-overlay">
                                <label for="serviceIcon" class="btn btn-sm btn-primary m-0">
                                    <i class="fas fa-pen"></i>
                                </label>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <input type="file" id="serviceIcon" name="service_icon" class="form-control" accept="image/*">
                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('user.services') }}" class="btn btn-secondary mr-2">Cancel</a>
                    <button type="submit" class="btn btn-primary" id="serviceSave">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .required:after {
        content: " *";
        color: red;
    }
    .image-upload-container {
        position: relative;
        display: inline-block;
    }
    .image-upload-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: opacity 0.3s;
    }
    .image-upload-container:hover .image-upload-overlay {
        opacity: 1;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const serviceIcon = document.getElementById('serviceIcon');
        const servicePreview = document.getElementById('servicePreview');

        if (serviceIcon && servicePreview) {
            serviceIcon.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        servicePreview.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
    });
    </script>
@endsection
