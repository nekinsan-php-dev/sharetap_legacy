@extends('layouts.auth')
@section('title')
    {{ __('messages.common.register') }}
@endsection
@section('content')
<div class="container mt-5">
    <div class="text-center mb-4">
        <x-main-logo class="mb-4"/>
        <h4 class="card-title text-primary">Choose Your Template</h4>
        <p class="text-muted">Select a template that best fits your profile.</p>
    </div>
    <form id="templateForm" action="{{ route('card.temp-store-step-two-store') }}" method="post">
        @csrf
        <div class="card shadow mb-4 border-0" style="border-radius: 15px;">
            <div class="card-body" style="background-color: #f0f8ff;">
                <h5 class="mb-4 text-info">Step 2: Choose Your Template</h5>
                <div class="row">
                    @foreach($templates as $template)
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mb-3 templatecard">
                            <label class="img-radio img-thumbnail" data-id="{{ $template->id }}" style="transition: transform 0.2s; cursor: pointer;">
                                <div class="d-flex justify-content-between">
                                    <div class="text-dark" style="font-size: 14px; padding: 5px;">
                                        <h5>{{ $template->name }}</h5>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="template_id[]" value="{{ $template->id }}" class="template-checkbox">
                                    </div>
                                </div>
                                <img src="{{ asset($template->path) }}" alt="Template" class="img-fluid">
                            </label>
                        </div>
                    @endforeach
                </div>
                <div id="error-message" style="color: red; display: none;">Please select exactly 3 templates.</div>
            </div>
            <div class="card-footer text-center d-flex justify-content-between p-4">
                <a href="{{ route('card.create') }}" class="btn btn-outline-danger">Previous</a>
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </div>
    </form>
</div>

<script>
    // JavaScript for template selection validation
    const checkboxes = document.querySelectorAll('.template-checkbox');
    const errorMessage = document.getElementById('error-message');

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            const checkedCheckboxes = document.querySelectorAll('.template-checkbox:checked');
            if (checkedCheckboxes.length > 3) {
                checkbox.checked = false;
                errorMessage.textContent = 'You can only select up to 3 templates.';
                errorMessage.style.display = 'block';
            } else {
                errorMessage.style.display = 'none';
            }
        });
    });

    document.getElementById('templateForm').addEventListener('submit', (event) => {
        const checkedCheckboxes = document.querySelectorAll('.template-checkbox:checked');
        if (checkedCheckboxes.length !== 3) {
            event.preventDefault();
            errorMessage.textContent = 'Please select exactly 3 templates.';
            errorMessage.style.display = 'block';
        } else {
            errorMessage.style.display = 'none';
        }
    });
</script>
@endsection
