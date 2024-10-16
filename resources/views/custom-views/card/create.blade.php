@extends('layouts.auth')
@section('title')
    {{ __('messages.common.register') }}
@endsection
@section('content')
<div class="container">
    <div class="text-center my-5">
        <x-main-logo class="mb-4"/>
        <h2 class="text-primary font-weight-bold">Register Your Information</h2>
        <p class="text-muted">Please fill in the details below to create your profile.</p>
    </div>
    <form class="form-custom" action="{{ route('card.tempStore') }}" method="post">
        @csrf
        <div class="card shadow border-0 bg-white mb-5">
            <div class="card-body">
                <div class="step" id="step1">
                    <h4 class="mb-4 text-primary">Step 1: Personal Information</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="first_name" class="text-dark">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" required style="border-radius: 10px;">
                                @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="last_name" class="text-dark">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" required style="border-radius: 10px;">
                                @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="date_of_birth" class="text-dark">Date of Birth</label>
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required style="border-radius: 10px;">
                                @error('date_of_birth') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="gender" class="text-dark">Gender</label>
                                <select class="form-control" id="gender" name="gender" required style="border-radius: 10px;">
                                    <option value="" selected disabled>Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                                @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="email" class="text-dark">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required style="border-radius: 10px;">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile_number" class="text-dark">Mobile Number</label>
                                <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter Mobile Number" required style="border-radius: 10px;">
                                @error('mobile_number') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="step d-none" id="step2">
                    <h4 class="mb-4 text-primary">Step 2: Additional Information</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="occupation" class="text-dark">Occupation</label>
                                <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Enter Occupation" style="border-radius: 10px;">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="company_name" class="text-dark">Company Name (optional)</label>
                                <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter Company Name" style="border-radius: 10px;">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="alternate_email" class="text-dark">Alternate Email</label>
                                <input type="email" class="form-control" id="alternate_email" name="alternate_email" placeholder="Enter Alternate Email" style="border-radius: 10px;">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="location" class="text-dark">Location</label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="Enter Location" required style="border-radius: 10px;">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description" class="text-dark">Description</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Enter Description" rows="3" style="border-radius: 10px;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer border-1 d-flex justify-content-between py-4">
                <button type="button" class="btn btn-outline-primary px-5 d-none" id="prevStep">
                    <i class="fas fa-arrow-left mr-2"></i>Previous
                </button>
                <button type="button" class="btn btn-primary px-5" id="nextStep">
                    Next<i class="fas fa-arrow-right ml-2"></i>
                </button>
                <button type="submit" class="btn btn-success px-5 d-none" id="submitBtn">
                    <i class="fas fa-check mr-2"></i>Submit
                </button>
            </div>
        </div>
    </form>
</div>

<style>
   
    .container {
        max-width: 800px;
    }
</style>

<script>
    const step1 = document.getElementById('step1');
    const step2 = document.getElementById('step2');
    const prevBtn = document.getElementById('prevStep');
    const nextBtn = document.getElementById('nextStep');
    const submitBtn = document.getElementById('submitBtn');

    nextBtn.addEventListener('click', function() {
        step1.classList.add('d-none');
        step2.classList.remove('d-none');
        prevBtn.classList.remove('d-none');
        this.classList.add('d-none');
        submitBtn.classList.remove('d-none');
    });

    prevBtn.addEventListener('click', function() {
        step2.classList.add('d-none');
        step1.classList.remove('d-none');
        nextBtn.classList.remove('d-none');
        this.classList.add('d-none');
        submitBtn.classList.add('d-none');
    });
</script>
@endsection
