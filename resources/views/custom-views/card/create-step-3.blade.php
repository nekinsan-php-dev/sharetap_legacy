@extends('layouts.auth')
@section('title')
    {{ __('messages.common.register') }}
@endsection
@section('content')
<div class="bg-light py-5">
    <div class="container">
        <div class="text-center mb-5">
            <x-main-logo class="mb-4"/>
            <h2 class="text-primary font-weight-bold">Complete Your Profile</h2>
            <p class="lead text-muted">Add your images and social media links to personalize your card</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('card.temp-store-step-three-store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-body p-5">
                    <div class="mb-5">
                        <div class="position-relative" style="height: 300px;">
                            <div class="cover-image-container" style="height: 250px; overflow: hidden;">
                                <div id="coverPreview" class="text-center p-4 bg-light border rounded" style="height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <i class="fas fa-image fa-3x text-muted mb-3"></i>
                                    <h5 class="text-primary">Upload Cover Picture</h5>
                                    <p class="text-muted">Recommended size: 1200x300 pixels</p>
                                    <p class="text-muted">Max file size: 5MB</p>
                                    <p class="text-muted">Supported formats: JPG, PNG, GIF</p>
                                </div>
                                <label for="coverImg" class="position-absolute top-0 end-0 m-3 btn btn-light btn-sm" style="cursor: pointer;">
                                    <i class="fas fa-camera"></i> Change Cover
                                    <input type="file" id="coverImg" name="cover_img" class="d-none" accept="image/*" onchange="previewImage(this, 'coverPreview')">
                                </label>
                            </div>
                            <div class="profile-image-container position-absolute" style="bottom: 0; left: 30px; width: 150px; height: 150px;">
                                <div id="profilePreview" class="rounded-circle border border-4 border-white d-flex justify-content-center align-items-center bg-light" style="width: 100%; height: 100%; overflow: hidden;">
                                    <i class="fas fa-user fa-3x text-muted"></i>
                                </div>
                                <label for="profile_image" class="position-absolute bottom-0 end-0 bg-primary text-white rounded-circle p-2" style="cursor: pointer; width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
                                    <i class="fas fa-camera"></i>
                                    <input type="file" id="profile_image" name="profile_img" class="d-none" accept="image/*" onchange="previewImage(this, 'profilePreview')">
                                </label>
                            </div>
                        </div>
                    </div>
                    <h4 class="mb-4 text-primary">Social Media Links</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-globe fa-fw text-primary"></i></span>
                                <input type="text" class="form-control" placeholder="Website URL" name="website">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-twitter fa-fw text-info"></i></span>
                                <input type="text" class="form-control" placeholder="Twitter URL" name="twitter">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-facebook fa-fw text-primary"></i></span>
                                <input type="text" class="form-control" placeholder="Facebook URL" name="facebook">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-instagram fa-fw text-danger"></i></span>
                                <input type="text" class="form-control" placeholder="Instagram URL" name="instagram">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-youtube fa-fw text-danger"></i></span>
                                <input type="text" class="form-control" placeholder="Youtube URL" name="youtube">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-linkedin fa-fw text-primary"></i></span>
                                <input type="text" class="form-control" placeholder="LinkedIn URL" name="linkedin">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-whatsapp fa-fw text-success"></i></span>
                                <input type="text" class="form-control" placeholder="WhatsApp URL" name="whatsapp">
                            </div>
                        </div>
                    </div>

                    <h4 class="mt-5 mb-4 text-primary">Additional Information</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" value="{{ $user['email'] }}" disabled>
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <textarea class="form-control" name="address" placeholder="Enter your address" style="height: 100px"></textarea>
                                <label for="address">Address</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <textarea class="form-control" name="delivery_address" placeholder="Enter your shipping address" style="height: 100px"></textarea>
                                <label for="delivery_address">Shipping Address</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white border-top-0 text-center d-flex justify-content-between p-4">
                    <a href="{{ route('card.temp-store-step-two') }}" class="btn btn-outline-danger">Previous</a>
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </div>
        </form>
    </div>
</div>

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

    document.getElementById('profile_image').addEventListener('change', function() {
        previewImage(this, 'profilePreview');
    });

    document.getElementById('coverImg').addEventListener('change', function() {
        previewImage(this, 'coverPreview');
    });
</script>
@endsection
