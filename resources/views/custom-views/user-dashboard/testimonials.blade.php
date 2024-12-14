@extends('custom-views.layouts.app')

@section('title')
    {{ __('messages.dashboard') }}
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row mb-4 align-items-center">
            <div class="col">
                <h1 class="h2 mb-0">Testimonials</h1>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#testimonialModal">
                    <i class="fas fa-plus me-2"></i>Add Testimonial
                </button>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0">Image</th>
                                <th class="border-0">Name</th>
                                <th class="border-0">Description</th>
                                <th class="border-0">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimonials as $testimonial)
                                <tr>
                                    <td>
                                        <img src="{{ $testimonial->testimonial_icon }}" alt="{{ $testimonial->name }}"
                                            class="img-thumbnail" style=" height: 40px; object-fit: cover;">
                                    </td>
                                    <td>{{ $testimonial->name }}</td>
                                    <td>
                                        <p class="mb-0 text-muted" style="max-width: 300px;">
                                            {{ Str::limit($testimonial->description, 100) }}
                                        </p>
                                    </td>

                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('user.testimonials.edit', $testimonial->id) }}"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-edit me-1"></i>Edit
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-danger delete-testimonial"
                                                data-id="{{ $testimonial->id }}">
                                                <i class="fas fa-trash-alt me-1"></i>Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Testimonial Modal -->
    <form id="testimonialForm" method="POST" action="{{ route('user.testimonials.update') }}"
        enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="testimonialModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="addServiceModalLabel">Add Testimonial</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label required">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label required">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="testimonialIcon" class="form-label required">Image</label>
                            <div>
                                <div class="image-upload-container me-3">
                                    <img id="testimonialPreview" class="img-thumbnail"
                                        src="{{ asset('assets/images/default_service.png') }}"
                                        alt="Testimonial Image Preview"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="image-upload-overlay">
                                        <label for="testimonialIcon" class="btn btn-sm btn-primary m-0">
                                            <i class="fas fa-pen"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <input type="file" id="testimonialIcon" name="testimonial_icon" class="form-control"
                                        accept="image/*">
                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveTestimonial">Save Testimonial</button>
                    </div>

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
                const testimonialModal = new bootstrap.Modal(document.getElementById('testimonialModal'));
                const deleteConfirmationModal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'));
                const testimonialForm = document.getElementById('testimonialForm');
                const testimonialIcon = document.getElementById('testimonialIcon');
                const testimonialPreview = document.getElementById('testimonialPreview');
                let deleteTestimonialId = null;

                // Image preview
                testimonialIcon.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            testimonialPreview.src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });

                // Form submission


                // Reset form when modal is hidden
                document.getElementById('testimonialModal').addEventListener('hidden.bs.modal', function() {
                    testimonialForm.reset();
                    document.getElementById('testimonial_id').value = '';
                    testimonialPreview.src = "{{ asset('assets/images/default_service.png') }}";
                    document.getElementById('testimonialModalLabel').textContent = 'Add Testimonial';
                });
            });
        </script>
    @endsection
