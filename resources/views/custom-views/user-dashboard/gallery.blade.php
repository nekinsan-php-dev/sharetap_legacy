@extends('custom-views.layouts.app')
@section('title')
    {{__('messages.dashboard')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-body p-0">
                <div class="row p-2">
                    <div class="col-md-3">
                        <x-dashboard-sub-menu/>
                    </div>
                    <div class="col-md-9 p-2">
                        <div class="row">
                            <div class="col-md-8">

                            </div>
                            <div class="col-md-4">
                                <form method="POST" action="{{ route('user.gallery.upload') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">

                                        <div class="col-sm-12 mb-5 mt-3 image_link">

                                            <div class="mb-3" io-image-input="true">
                                                <label for="addGalleryPreview" class="form-label">Galleries</label>
                                                <div class="d-block">
                                                    <div class="image-picker">
                                                        <div class="image previewImage" id="addGalleryPreview" style="background-image: url('https://vcards.infyom.com/assets/images/default_service.png')"></div>
                                                        <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip" data-placement="top" data-bs-original-title="Change Image">
                                        <label>
                                            <svg class="svg-inline--fa fa-pen" id="profileImageIcon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75C517.7 83.74 517.7 124.3 492.7 149.3L444.3 197.7L314.3 67.72L362.7 19.32zM421.7 220.3L188.5 453.4C178.1 463.8 165.2 471.5 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L291.7 90.34L421.7 220.3z"></path></svg><!-- <i class="fa-solid fa-pen" id="profileImageIcon"></i> Font Awesome fontawesome.com -->
                                            <input type="file" id="addImage" name="image" class="image-upload file-validation d-none" accept="image/*"> </label>
                                    </span>
                                                    </div>
                                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button type="submit" class="btn btn-primary me-3" id="GallerySave">Save</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Discard</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


