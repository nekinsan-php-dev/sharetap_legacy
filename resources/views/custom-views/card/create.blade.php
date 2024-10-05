@extends('layouts.auth')
@section('title')
    {{ __('messages.common.register') }}
@endsection
@section('content')
<div style="background:url('https://nekinsan.co/sharetap/public/assets/images/bg-shapes.png'); margin-top: -16px;padding-top: 2rem;">
   <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0">
              <div class="card-header text-center py-4" style="background-color: #f8f9fa;">
                <h2 class="card-title font-weight-bold">Personal Information</h2>
                <p class="text-muted">Please fill out the form below with accurate information</p>
              </div>
              <div class="card-body p-4">
                <form>
                  <div class="row g-4">
                    <!-- First Name -->
                    <div class="col-md-6">
                      <label for="first_name" class="form-label">First Name</label>
                      <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Enter First Name" required>
                    </div>
                    <!-- Last Name -->
                    <div class="col-md-6">
                      <label for="last_name" class="form-label">Last Name</label>
                      <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Enter Last Name" required>
                    </div>
                    <!-- Date of Birth -->
                    <div class="col-md-6">
                      <label for="date_of_birth" class="form-label">Date of Birth</label>
                      <div class="input-group">
                        <input type="text" id="date_of_birth" name="date_of_birth" class="form-control" placeholder="Pick a date">
                        <span class="input-group-text">
                          <i class="bi bi-calendar"></i>
                        </span>
                      </div>
                    </div>
                    <!-- Gender -->
                    <div class="col-md-6">
                      <label for="gender" class="form-label">Gender</label>
                      <select id="gender" name="gender" class="form-select">
                        <option selected disabled>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                      </select>
                    </div>
                    <!-- Occupation -->
                    <div class="col-md-6">
                      <label for="occupation" class="form-label">Occupation</label>
                      <input type="text" id="occupation" name="occupation" class="form-control" placeholder="Enter Occupation">
                    </div>
                    <!-- Company Name -->
                    <div class="col-md-6">
                      <label for="company_name" class="form-label">Company Name (optional)</label>
                      <input type="text" id="company_name" name="company_name" class="form-control" placeholder="Enter Company Name">
                    </div>
                    <!-- Email -->
                    <div class="col-md-6">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email" required>
                    </div>
                    <!-- Alternate Email -->
                    <div class="col-md-6">
                      <label for="alternate_email" class="form-label">Alternate Email</label>
                      <input type="email" id="alternate_email" name="alternate_email" class="form-control" placeholder="Enter Alternate Email">
                    </div>
                    <!-- Mobile Number -->
                    <div class="col-md-6">
                      <label for="mobile_number" class="form-label">Mobile Number</label>
                      <input type="text" id="mobile_number" name="mobile_number" class="form-control" placeholder="Enter Mobile Number" required>
                    </div>
                    <!-- Alternate Mobile Number -->
                    <div class="col-md-6">
                      <label for="alternate_mobile_number" class="form-label">Alternate Mobile Number</label>
                      <input type="text" id="alternate_mobile_number" name="alternate_mobile_number" class="form-control" placeholder="Enter Alternate Mobile Number">
                    </div>
                    <!-- Location -->
                    <div class="col-md-6">
                      <label for="location" class="form-label">Location</label>
                      <input type="text" id="location" name="location" class="form-control" placeholder="Enter Location" required>
                    </div>
                    <!-- Location URL -->
                    <div class="col-md-6">
                      <label for="location_url" class="form-label">Location URL</label>
                      <input type="text" id="location_url" name="location_url" class="form-control" placeholder="Enter Location URL">
                    </div>
                    <!-- Description -->
                    <div class="col-12">
                      <label for="description" class="form-label">Description</label>
                      <textarea id="description" name="description" class="form-control" rows="3" placeholder="Enter Description"></textarea>
                    </div>
                  </div>
                  <!-- Form Switches -->
                  <div class="mt-4">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="enable_enquiry_form" name="enable_enquiry_form">
                      <label class="form-check-label" for="enable_enquiry_form">Enable Inquiry Form</label>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="enable_download_qr_code" name="enable_download_qr_code">
                      <label class="form-check-label" for="enable_download_qr_code">Enable Download QR Code</label>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="show_qr_code" name="show_qr_code">
                      <label class="form-check-label" for="show_qr_code">Show QR Code</label>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="enable_addcontact" name="enable_addcontact">
                      <label class="form-check-label" for="enable_addcontact">Enable Add to Contact</label>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="whatsapp_share" name="whatsapp_share">
                      <label class="form-check-label" for="whatsapp_share">WhatsApp Share</label>
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-footer text-center py-4">
                <button type="submit" class="btn btn-primary w-100 w-sm-auto">Next</button>
              </div>
            </div>
          </div>
        </div>
      </div>
   </div>
</div>
@endsection
