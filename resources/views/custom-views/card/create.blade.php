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
    <form class="form-custom needs-validation" action="{{ route('card.tempStore') }}" method="post">
        @csrf
        <div class="card shadow border-0 bg-white mb-5">
            <div class="card-body">
                <div class="step" id="step1">
                    <h4 class="mb-4 text-primary">Step 1: Personal Information</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group position-relative">
                                <label for="first_name" class="text-dark">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="Enter First Name" required style="border-radius: 10px;">
                                <div class="invalid-feedback"></div>

                                @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group position-relative">
                                <label for="last_name" class="text-dark">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="Enter Last Name" required style="border-radius: 10px;">
                                <div class="invalid-feedback"></div>

                                @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group position-relative">
                                <label for="date_of_birth" class="text-dark">Date of Birth</label>
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                    required style="border-radius: 10px;">
                                <div class="invalid-feedback"></div>

                                @error('date_of_birth') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group position-relative">
                                <label for="gender" class="text-dark">Gender</label>
                                <select class="form-control" id="gender" name="gender" required style="border-radius: 10px;">
                                    <option value="" selected disabled>Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                                <div class="invalid-feedback"></div>

                                @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group position-relative">
                                <label for="email" class="text-dark">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter Email" required style="border-radius: 10px;">
                                <div class="invalid-feedback"></div>

                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label for="mobile_number" class="text-dark">Mobile Number</label>
                                <input type="text" class="form-control" id="mobile_number" name="mobile_number"
                                    placeholder="Enter Mobile Number" required style="border-radius: 10px;">
                                <div class="invalid-feedback"></div>

                                @error('mobile_number') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 2 remains mostly the same but let's add validation for required fields -->
                <div class="step d-none" id="step2">
                    <h4 class="mb-4 text-primary">Step 2: Additional Information</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group position-relative">
                                <label for="occupation" class="text-dark">Occupation</label>
                                <input type="text" class="form-control" id="occupation" name="occupation"
                                    placeholder="Enter Occupation" style="border-radius: 10px;">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group position-relative">
                                <label for="company_name" class="text-dark">Company Name (optional)</label>
                                <input type="text" class="form-control" id="company_name" name="company_name"
                                    placeholder="Enter Company Name" style="border-radius: 10px;">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group position-relative">
                                <label for="location" class="text-dark">Location</label>
                                <input type="text" class="form-control" id="location" name="location"
                                    placeholder="Enter Location" required style="border-radius: 10px;">
                                <div class="invalid-feedback">Please enter your location</div>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="description" class="text-dark">Description</label>
                                <textarea class="form-control" id="description" name="description"
                                    placeholder="Enter Description" rows="3" style="border-radius: 10px;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer border-1 d-flex justify-content-between py-4">
                <button type="button" class="btn btn-outline-primary px-5 d-none" id="prevStep">
                    <i class="fas fa-arrow-left me-2"></i>Previous
                </button>
                <button type="button" class="btn btn-primary px-5" id="nextStep">
                    Next<i class="fas fa-arrow-right ms-2"></i>
                </button>
                <button type="submit" class="btn btn-success px-5 d-none" id="submitBtn">
                    <i class="fas fa-check me-2"></i>Submit
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
document.addEventListener('DOMContentLoaded', function() {
   const step1 = document.getElementById('step1');
    const step2 = document.getElementById('step2');
    const prevBtn = document.getElementById('prevStep');
    const nextBtn = document.getElementById('nextStep');
    const submitBtn = document.getElementById('submitBtn');
    const form = document.querySelector('.needs-validation');

    const errorMessages = {
        firstName: {
            required: 'First name is required',
            invalid: 'First name should only contain letters (2-50 characters)',
            tooShort: 'First name must be at least 2 characters long'
        },
        lastName: {
            required: 'Last name is required',
            invalid: 'Last name should only contain letters (2-50 characters)',
            tooShort: 'Last name must be at least 2 characters long'
        },
        email: {
            required: 'Email address is required',
            invalid: 'Please enter a valid email address',
            exists: 'This email is already registered'
        },
        mobile: {
            required: 'Mobile number is required',
            invalid: 'Please enter a valid 10-digit mobile number',
            exists: 'This mobile number is already registered'
        },
    };

    const checkEmailAvailability = async (email) => {
        try {
            const response = await fetch('/check-email', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ email })
            });

            const data = await response.json();
            const emailInput = document.getElementById('email');

            if (!data.status) {
                setFieldError(emailInput, errorMessages.email.exists);
                return false;
            }
            setFieldValid(emailInput);
            return true;
        } catch (error) {
            console.error('Error checking email:', error);
            return true;
        }
    };

    const checkMobileAvailability = async (mobile) => {
        try {
            const response = await fetch('/check-mobile', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ mobile })
            });

            const data = await response.json();
            const mobileInput = document.getElementById('mobile_number');

            if (!data.status) {
                setFieldError(mobileInput, errorMessages.mobile.exists);
                return false;
            }
            setFieldValid(mobileInput);
            return true;
        } catch (error) {
            console.error('Error checking mobile:', error);
            return true;
        }
    };

    const setFieldError = (element, message) => {
        element.classList.add('is-invalid');
        element.classList.remove('is-valid');
        const feedback = element.nextElementSibling;
        if (feedback && feedback.classList.contains('invalid-feedback')) {
            feedback.textContent = message;
            feedback.style.display = 'block';
        }
    };

    const setFieldValid = (element) => {
        element.classList.remove('is-invalid');
        element.classList.add('is-valid');
        const feedback = element.nextElementSibling;
        if (feedback && feedback.classList.contains('invalid-feedback')) {
            feedback.textContent = '';
            feedback.style.display = 'none';
        }
    };

    const validateEmail = (email) => {
        return String(email)
            .toLowerCase()
            .match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/);
    };

    // Mobile number input handler
    const mobileInput = document.getElementById('mobile_number');
    if (mobileInput) {
        mobileInput.addEventListener('input', function(e) {
            // Remove any non-digit characters
            let value = this.value.replace(/\D/g, '');

            // Limit to 10 digits
            if (value.length > 10) {
                value = value.slice(0, 10);
            }

            // Update input value
            this.value = value;

            // Validate and show/hide error message
            if (value.length === 10) {
                setFieldValid(this);
            } else if (value.length > 0) {
                setFieldError(this, errorMessages.mobile.invalid);
            } else {
                setFieldError(this, errorMessages.mobile.required);
            }
        });
    }

    const validateStep1Fields = async () => {
        const firstNameEl = document.getElementById('first_name');
        const lastNameEl = document.getElementById('last_name');
        const emailEl = document.getElementById('email');
        const mobileEl = document.getElementById('mobile_number');
        const dateOfBirthEl = document.getElementById('date_of_birth');
        const genderEl = document.getElementById('gender');

        let isValid = true;

        // First Name validation
        if (!firstNameEl.value.trim()) {
            setFieldError(firstNameEl, errorMessages.firstName.required);
            isValid = false;
        } else if (firstNameEl.value.trim().length < 2) {
            setFieldError(firstNameEl, errorMessages.firstName.tooShort);
            isValid = false;
        } else if (!firstNameEl.value.match(/^[A-Za-z ]{2,50}$/)) {
            setFieldError(firstNameEl, errorMessages.firstName.invalid);
            isValid = false;
        } else {
            setFieldValid(firstNameEl);
        }

        // Last Name validation
        if (!lastNameEl.value.trim()) {
            setFieldError(lastNameEl, errorMessages.lastName.required);
            isValid = false;
        } else if (lastNameEl.value.trim().length < 2) {
            setFieldError(lastNameEl, errorMessages.lastName.tooShort);
            isValid = false;
        } else if (!lastNameEl.value.match(/^[A-Za-z ]{2,50}$/)) {
            setFieldError(lastNameEl, errorMessages.lastName.invalid);
            isValid = false;
        } else {
            setFieldValid(lastNameEl);
        }

        // Email validation
        if (!emailEl.value.trim()) {
            setFieldError(emailEl, errorMessages.email.required);
            isValid = false;
        } else if (!validateEmail(emailEl.value)) {
            setFieldError(emailEl, errorMessages.email.invalid);
            isValid = false;
        } else {
            const emailAvailable = await checkEmailAvailability(emailEl.value);
            isValid = emailAvailable && isValid;
        }

        // Mobile validation
        if (!mobileEl.value.trim()) {
            setFieldError(mobileEl, errorMessages.mobile.required);
            isValid = false;
        } else if (mobileEl.value.length !== 10) {
            setFieldError(mobileEl, errorMessages.mobile.invalid);
            isValid = false;
        } else {
            const mobileAvailable = await checkMobileAvailability(mobileEl.value);
            isValid = mobileAvailable && isValid;
        }

        // Date of Birth validation
        if (!dateOfBirthEl.value) {
            setFieldError(dateOfBirthEl, 'Date of birth is required');
            isValid = false;
        } else {
            setFieldValid(dateOfBirthEl);
        }

        // Gender validation
        if (!genderEl.value) {
            setFieldError(genderEl, 'Please select your gender');
            isValid = false;
        } else {
            setFieldValid(genderEl);
        }

        return isValid;
    };

     nextBtn.addEventListener('click', async function() {
        const isValid = await validateStep1Fields();
        if (isValid) {
            step1.classList.add('d-none');
            step2.classList.remove('d-none');
            prevBtn.classList.remove('d-none');
            this.classList.add('d-none');
            submitBtn.classList.remove('d-none');
        }
    });

    prevBtn.addEventListener('click', function() {
        step2.classList.add('d-none');
        step1.classList.remove('d-none');
        nextBtn.classList.remove('d-none');
        this.classList.add('d-none');
        submitBtn.classList.add('d-none');
    });

    // Real-time validation handlers
    const addInputValidator = (elementId, validationFn) => {
        const element = document.getElementById(elementId);
        if (element) {
            element.addEventListener('input', validationFn);
            element.addEventListener('blur', validationFn);
        }
    };

    // Add input validators for all fields
    addInputValidator('first_name', function() {
        if (!this.value.trim()) {
            setFieldError(this, errorMessages.firstName.required);
        } else if (this.value.trim().length < 2) {
            setFieldError(this, errorMessages.firstName.tooShort);
        } else if (!this.value.match(/^[A-Za-z ]{2,50}$/)) {
            setFieldError(this, errorMessages.firstName.invalid);
        } else {
            setFieldValid(this);
        }
    });

    addInputValidator('last_name', function() {
        if (!this.value.trim()) {
            setFieldError(this, errorMessages.lastName.required);
        } else if (this.value.trim().length < 2) {
            setFieldError(this, errorMessages.lastName.tooShort);
        } else if (!this.value.match(/^[A-Za-z ]{2,50}$/)) {
            setFieldError(this, errorMessages.lastName.invalid);
        } else {
            setFieldValid(this);
        }
    });

     addInputValidator('email', async function() {
        if (!this.value.trim()) {
            setFieldError(this, errorMessages.email.required);
        } else if (!validateEmail(this.value)) {
            setFieldError(this, errorMessages.email.invalid);
        } else {
            await checkEmailAvailability(this.value);
        }
    });

     addInputValidator('mobile_number', async function() {
        this.value = this.value.replace(/\D/g, '');
        if (!this.value.trim()) {
            setFieldError(this, errorMessages.mobile.required);
        } else if (this.value.length < 10) {
            setFieldError(this, errorMessages.mobile.tooShort);
        } else if (!this.value.match(/^[0-9]{10}$/)) {
            setFieldError(this, errorMessages.mobile.invalid);
        } else {
            await checkMobileAvailability(this.value);
        }
    });


 const validateStep2Fields = () => {
        const locationEl = document.getElementById('location');
        const occupationEl = document.getElementById('occupation');
        let isValid = true;

        // Location is required
        if (!locationEl.value.trim()) {
            setFieldError(locationEl, 'Location is required');
            isValid = false;
        } else {
            setFieldValid(locationEl);
        }

        // Add validation for occupation if it's required
        if (occupationEl && !occupationEl.value.trim()) {
            setFieldError(occupationEl, 'Occupation is required');
            isValid = false;
        } else if (occupationEl) {
            setFieldValid(occupationEl);
        }

        return isValid;
    };
    // Form submission handler
      form.addEventListener('submit', async function(event) {
        event.preventDefault();

        const isStep1Valid = await validateStep1Fields();
        const isStep2Valid = validateStep2Fields();

        if (isStep1Valid && isStep2Valid) {
            this.submit();
        } else {
            if (!isStep1Valid && !step1.classList.contains('d-none')) {
                step2.classList.add('d-none');
                step1.classList.remove('d-none');
                nextBtn.classList.remove('d-none');
                prevBtn.classList.add('d-none');
                submitBtn.classList.add('d-none');
            }
        }
    });

    // Add focus effect for form groups
    const formControls = document.querySelectorAll('.form-control, .form-select');
    formControls.forEach(control => {
        control.addEventListener('focus', function() {
            this.closest('.form-group').classList.add('focused');
        });

        control.addEventListener('blur', function() {
            this.closest('.form-group').classList.remove('focused');
        });
    });
});
</script>
@endsection
