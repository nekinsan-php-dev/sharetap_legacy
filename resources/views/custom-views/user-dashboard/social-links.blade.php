@extends('custom-views.layouts.app')
@section('title')
    {{__('messages.dashboard')}}
@endsection
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-share-alt mr-2"></i>
                        Social Media Links
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.social-links.update') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="website" class="col-md-3 col-form-label">Website</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary text-white">
                                            <i class="fas fa-globe"></i>
                                        </span>
                                    </div>
                                    <input type="url" class="form-control" id="website" placeholder="Website URL"
                                           name="website" value="{{ $socialLinks->website }}">
                                </div>
                            </div>
                        </div>
                <div class="form-group row">
                        <label for="twitter" class="col-md-3 col-form-label">Twitter</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="background-color: #1DA1F2; color: white;">
                                        <i class="fab fa-twitter"></i>
                                    </span>
                                </div>
                                <input type="url" class="form-control" id="twitter" placeholder="Twitter Profile URL"
                                       name="twitter" value="{{ $socialLinks->twitter }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="facebook" class="col-md-3 col-form-label">Facebook</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary text-white">
                                        <i class="fab fa-facebook-f"></i>
                                    </span>
                                </div>
                                <input type="url" class="form-control" id="facebook" placeholder="Facebook Page URL"
                                       name="facebook" value="{{ $socialLinks->facebook }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="instagram" class="col-md-3 col-form-label">Instagram</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger text-white">
                                        <i class="fab fa-instagram"></i>
                                    </span>
                                </div>
                                <input type="url" class="form-control" id="instagram" placeholder="Instagram Profile URL"
                                       name="instagram" value="{{ $socialLinks->instagram }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="youtube" class="col-md-3 col-form-label">YouTube</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger text-white">
                                        <i class="fab fa-youtube"></i>
                                    </span>
                                </div>
                                <input type="url" class="form-control" id="youtube" placeholder="YouTube Channel URL"
                                       name="youtube" value="{{ $socialLinks->youtube }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="linkedin" class="col-md-3 col-form-label">LinkedIn</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-info text-white">
                                        <i class="fab fa-linkedin-in"></i>
                                    </span>
                                </div>
                                <input type="url" class="form-control" id="linkedin" placeholder="LinkedIn Profile URL"
                                       name="linkedin" value="{{ $socialLinks->linkedin }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="whatsapp" class="col-md-3 col-form-label">WhatsApp</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white">
                                        <i class="fab fa-whatsapp"></i>
                                    </span>
                                </div>
                                <input type="url" class="form-control" id="whatsapp" placeholder="WhatsApp Contact URL"
                                       name="whatsapp" value="{{ $socialLinks->whatsapp }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mr-2"></i>Update Social Links
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
