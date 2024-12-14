@extends('custom-views.layouts.app')
@section('title')
    {{ __('messages.dashboard') }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="pt-2 pb-2">
        <h2 class="text-2xl font-weight-bold">Basic Information</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">

                <div class="card-body">
                    <form action="{{ route('user.basic-info.update') }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        placeholder="Enter First Name" value="{{ $user->vcard->first_name ?? '' }}" required>
                                    @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                        placeholder="Enter Last Name" value="{{ $user->vcard->last_name ?? '' }}" required>
                                    @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date_of_birth">Date of Birth</label>
                                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                        value="{{ $user->vcard->dob ?? '' }}" required>
                                    @error('date_of_birth')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select class="form-control" id="gender" name="gender" required>
                                        <option value="" selected disabled>Select Gender</option>
                                        <option {{ $user->vcard->gender == 'male' ? 'selected' : '' }} value="male">Male</option>
                                        <option {{ $user->vcard->gender == 'female' ? 'selected' : '' }} value="female">Female</option>
                                        <option {{ $user->vcard->gender == 'other' ? 'selected' : '' }} value="other">Other</option>
                                    </select>
                                    @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="occupation">Occupation</label>
                                    <input type="text" class="form-control" id="occupation" name="occupation"
                                        placeholder="Enter Occupation" value="{{ $user->vcard->occupation ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company_name">Company Name (optional)</label>
                                    <input type="text" class="form-control" id="company_name" name="company_name"
                                        placeholder="Enter Company Name" value="{{ $user->vcard->company ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <h4 class="mt-4 mb-3">Contact Information</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter Email" required value="{{ $user->vcard->email ?? '' }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alternate_email">Alternate Email</label>
                                    <input type="email" class="form-control" id="alternate_email" name="alternate_email"
                                        placeholder="Enter Alternate Email" value="{{ $user->vcard->alternative_email ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mobile_number">Mobile Number</label>
                                    <input type="text" class="form-control" id="mobile_number" name="mobile_number"
                                        placeholder="Enter Mobile Number" required value="{{ $user->vcard->phone ?? '' }}">
                                    @error('mobile_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alternate_mobile_number">Alternate Mobile Number</label>
                                    <input type="text" class="form-control" id="alternate_mobile_number"
                                        name="alternate_mobile_number" placeholder="Enter Alternate Mobile Number"
                                        value="{{ $user->vcard->alternative_phone ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <h4 class="mt-4 mb-3">Location Information</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control" id="location" name="location"
                                        placeholder="Enter Location" required value="{{ $user->vcard->location ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="location_url">Location URL</label>
                                    <input type="text" class="form-control" id="location_url" name="location_url"
                                        placeholder="Enter Location URL" value="{{ $user->vcard->location_url ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Enter Description" rows="3">{{ $user->vcard->description ?? '' }}</textarea>
                        </div>

                        <h4 class="mt-4 mb-3">Settings</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="enableEnquiryForm"
                                               name="enable_enquiry_form" value="1"
                                               {{ $user->vcard->enable_enquiry_form == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="enableEnquiryForm">Enable Inquiry Form</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="enableDownloadQrCode"
                                               name="enable_download_qr_code" value="1"
                                               {{ $user->vcard->enable_download_qr_code == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="enableDownloadQrCode">Enable Download QR Code</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="enableQrCode"
                                               name="show_qr_code" value="1"
                                               {{ $user->vcard->show_qr_code == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="enableQrCode">Show QR Code</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="enableContact"
                                               name="enable_contact" value="1"
                                               {{ $user->vcard->enable_contact == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="enableContact">Enable Add to Contact</label>
                                        <i class="fas fa-question-circle text-muted ml-2" data-toggle="tooltip" title="By enabling this, the contact details will be visible on all your Vcards"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="whatsappShare"
                                               name="whatsapp_share" value="1"
                                               {{ $user->vcard->whatsapp_share == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="whatsappShare">WhatsApp Share</label>
                                        <i class="fas fa-question-circle text-muted ml-2" data-toggle="tooltip" title="By enabling this, the WhatsApp Share button will be visible on all your VCards"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card-primary.card-outline {
        border-top: 3px solid #007bff;
    }
    .form-control:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
    }
    .custom-switch .custom-control-label::before {
        height: 1.5rem;
        width: 2.75rem;
        border-radius: 0.75rem;
    }
    .custom-switch .custom-control-label::after {
        width: calc(1.5rem - 4px);
        height: calc(1.5rem - 4px);
        border-radius: calc(2rem - (1.5rem / 2));
    }
    .custom-control-input:checked ~ .custom-control-label::before {
        background-color: #28a745;
        border-color: #28a745;
    }
</style>
@endpush

@push('scripts')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endpush
