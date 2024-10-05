
@extends('custom-views.layouts.app')
@section('title')
    {{__('messages.dashboard')}}
@endsection
@section('content')
<div >
<div class="container-fluid">
    <div class="card shadow card-cyuston-sacht">
        <div class="card-body p-0">
            <div class="row p-2">
                <div class="col-md-12 p-2">
                     <div style="position:relative;padding-botton:4rem;">

                    <form action="{{ route('user.basic-info.update') }}" method="post" style="padding: 29px;">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" value="{{ $user->vcard->first_name ?? '' }}" required>
                                    @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="{{ $user->vcard->last_name ?? '' }}" required>
                                    @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="date_of_birth">Date of Birth</label>
                                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Enter Date of Birth" value="{{ $user->vcard->dob ?? '' }}" required>
                                    @error('date_of_birth') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select class="form-control" id="gender" name="gender" required>
                                        <option value="" selected disabled>Select Gender</option>
                                        <option {{ $user->vcard->gender == 'male' ? 'selected' : '' }} value="male">Male</option>
                                        <option {{ $user->vcard->gender == 'female' ? 'selected' : '' }} value="female">Female</option>
                                        <option {{ $user->vcard->gender == 'other' ? 'selected' : '' }} value="other">Other</option>
                                    </select>
                                    @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="occupation">Occupation</label>
                                    <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Enter Occupation" value="{{ $user->vcard->occupation ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="company_name">Company Name(optional)</label>
                                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter Company Name" value="{{ $user->vcard->company ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required value="{{ $user->vcard->email ?? '' }}">
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="alternate_email">Alternate Email</label>
                                    <input type="email" class="form-control" id="alternate_email" name="alternate_email" placeholder="Enter Alternate Email" value="{{ $user->vcard->alternative_email ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="mobile_number">Mobile Number</label>
                                    <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter Mobile Number" required value="{{ $user->vcard->phone ?? '' }}">
                                    @error('mobile_number') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="alternate_mobile_number">Alternate Mobile Number</label>
                                    <input type="text" class="form-control" id="alternate_mobile_number" name="alternate_mobile_number" placeholder="Enter Alternate Mobile Number" value="{{ $user->vcard->alternative_phone ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control" id="location" name="location" placeholder="Enter Location" required value="{{ $user->vcard->location ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="location_url">Location URL</label>
                                    <input type="text" class="form-control" id="location_url" name="location_url" placeholder="Enter Location URL" value="{{ $user->vcard->location_url ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" placeholder="Enter Description" rows="3">{{ $user->vcard->description ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6 mb-5">
                                <div class="d-flex">
                                    <label for="enable_enquiry_form" class="form-label">Enable Inquiry Form:</label>
                                    <div class="mx-4">
                                        <div class="form-check form-switch form-check-custom form-check-solid form-switch-sm col-6">
                                            <div class="fv-row d-flex align-items-center">
                                                <input class="form-check-input mt-0 " {{ $user->vcard->enable_enquiry_form == 1 ? 'checked' : '' }} id="enableEnquiryForm"  name="enable_enquiry_form" type="checkbox" value="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-5">
                                <div class="d-flex">
                                    <label for="enable_download_qr_code" class="form-label">Enable Download QR Code:</label>
                                    <div class="mx-4">
                                        <div class="form-check form-switch form-check-custom form-check-solid form-switch-sm col-6">
                                            <div class="fv-row d-flex align-items-center">
                                                <input class="form-check-input mt-0 " id="enableDownloadQrCode" {{ $user->vcard->enable_download_qr_code == 1 ? 'checked' : '' }} name="enable_download_qr_code" type="checkbox" value="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-5">
                                <div class="d-flex">
                                    <label for="show_qr_code" class="form-label">Show QR Code:</label>
                                    <div class="mx-3">
                                        <div class="form-check form-switch form-check-custom form-check-solid form-switch-sm col-6">
                                            <div class="fv-row d-flex align-items-center">
                                                <input class="form-check-input mt-0 " id="enableQrCode" {{ $user->vcard->show_qr_code == 1 ? 'checked' : '' }} name="show_qr_code" type="checkbox" value="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-5">
                                <div class="d-flex">
                                    <label for="enable_addcontact" class="form-label">Enable Add to contact:</label>
                                    <span data-bs-toggle="tooltip" class="mb-3" data-placement="top" data-bs-original-title="By enabling this the contact details will be visible on all your Vcards ">
                            <svg class="svg-inline--fa fa-circle-question ml-1 mx-1 general-question-mark" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-question" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM256 400c-18 0-32-14-32-32s13.1-32 32-32c17.1 0 32 14 32 32S273.1 400 256 400zM325.1 258L280 286V288c0 13-11 24-24 24S232 301 232 288V272c0-8 4-16 12-21l57-34C308 213 312 206 312 198C312 186 301.1 176 289.1 176h-51.1C225.1 176 216 186 216 198c0 13-11 24-24 24s-24-11-24-24C168 159 199 128 237.1 128h51.1C329 128 360 159 360 198C360 222 347 245 325.1 258z"></path></svg>
                        </span>
                                    <div class="mx-4">
                                        <div class="form-check form-switch form-check-custom form-check-solid form-switch-sm col-6">
                                            <div class="fv-row d-flex align-items-center">
                                                <input class="form-check-input mt-0 " id="enableContact" {{ $user->vcard->enable_contact == 1 ? 'checked' : '' }} name="enable_contact" type="checkbox" value="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-5">
                                <div class="d-flex">
                                    <label for="whatsapp_share" class="form-label">WhatsApp Share:</label>
                                    <span data-bs-toggle="tooltip" class="mb-3" data-placement="top" data-bs-original-title="By enabling this, the WhatsApp Share button will be visible on all your VCards">
                            <svg class="svg-inline--fa fa-circle-question ml-1 mx-1 general-question-mark" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-question" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM256 400c-18 0-32-14-32-32s13.1-32 32-32c17.1 0 32 14 32 32S273.1 400 256 400zM325.1 258L280 286V288c0 13-11 24-24 24S232 301 232 288V272c0-8 4-16 12-21l57-34C308 213 312 206 312 198C312 186 301.1 176 289.1 176h-51.1C225.1 176 216 186 216 198c0 13-11 24-24 24s-24-11-24-24C168 159 199 128 237.1 128h51.1C329 128 360 159 360 198C360 222 347 245 325.1 258z"></path></svg>
                        </span>
                                    <div class="mx-4">
                                        <div class="form-check form-switch form-check-custom form-check-solid form-switch-sm col-6">
                                            <div class="fv-row d-flex align-items-center">
                                                <input class="form-check-input mt-0 " id="whatsappShare" {{ $user->vcard->whatsapp_share == 1 ? 'checked' : '' }} name="whatsapp_share" type="checkbox" value="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-5">
                                <div class="p-2 text-center footer-card-ctrumm">
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                  </div>
                </div>
            </div>
        </div>
    </div>
</div></div>
@endsection
