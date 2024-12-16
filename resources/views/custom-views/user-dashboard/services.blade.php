@extends('custom-views.layouts.app')
@section('title')
    {{ __('messages.dashboard') }}
@endsection
@section('content')
    <div>
        <div class="container-fluid">
            <div class="pt-2 pb-2">
                <h2 class="text-2xl font-weight-bold">Services</h2>
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

            <div class="card shadow">
                <div class="card-header">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#addServiceModal">
                            Add Service
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>

                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ $service->service_icon }}" alt="Service Icon" height="30">
                                    </td>
                                    <td>{{ $service->name }}</td>
                                    <td>{{ $service->description }}</td>

                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('user.services.edit', $service->id) }}"
                                                class="btn btn-primary btn-sm mr-2">Edit</a>
                                            <form method="POST" action="{{ route('user.services.delete', $service->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
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

    <form method="POST" action="{{ route('user.services.update') }}" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="addServiceModalLabel">Add New Service</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label required">Service Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Service Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="service_url" class="form-label">Service URL</label>
                            <input type="url" class="form-control" id="service_url" name="service_url"
                                placeholder="Enter Service URL">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label required">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter Short Description"
                                required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="serviceIcon" class="form-label required">Service Icon</label>
                            <div>
                                <div class="me-3">
                                    <img id="servicePreview" class=" border"
                                        style="width: 80px; height: 80px; object-fit: cover;"
                                        src="http://127.0.0.1:8000/assets/images/default_service.png"
                                        alt="Service Icon Preview">
                                </div>
                                <div>
                                    <input type="file" id="serviceIcon" name="service_icon" class="form-control"
                                        accept="image/*" onchange="previewServiceIcon(event)">
                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </div>
            </div>
        </div>
    </form>

    <script>
        function previewServiceIcon(event) {
            const preview = document.getElementById('servicePreview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.style.backgroundImage = `url(${e.target.result})`;
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
