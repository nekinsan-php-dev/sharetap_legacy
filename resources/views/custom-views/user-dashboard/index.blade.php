@extends('custom-views.layouts.app')
@section('content')
<style>
    .permission-card {
        cursor: pointer;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        padding: 20px;
        border-radius: 10px;
    }

    .permission-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .permission-card.permission-selected {
        background-color: #27ae60;
        color: white;
    }

    .permission-card.permission-selected i {
        color: white;
    }

    .permission-card i {
        color: #007bff;
        transition: color 0.3s ease;
    }

    .permission-card .card-body {
        padding: 10px;
    }

    .permission-card .card-title {
        font-size: 16px;
    }

    .card-body {
        padding: 20px;
    }

    .btn {
        width: 100%;
    }

    /* Custom Checkbox Hide */
    .permission-card input[type="checkbox"] {
        display: none;
    }

    .permission-card input[type="checkbox"]:checked + .card-body {
        background-color: #27ae60;
        color: white;
    }

    /* Active/Inactive Status */
    .status-circle {
        width: 12px;
        height: 12px;
        border-radius: 50%;
    }
</style>

<div class="container-fluid">
    <div class="pt-2 pb-2">
        <h2 class="text-2xl font-weight-bold">ShareTap Permissions</h2>
        <p class="text-muted">Select what you want to activate</p>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex align-items-center">
                        <span class="bg-success me-2 p-2 rounded-circle status-circle"></span>&nbsp;
                        <span class="me-4">Active</span>&nbsp;&nbsp;&nbsp;
                        <span class="bg-white me-2 p-2 rounded-circle status-circle" style="border: 1px solid #ccc;"></span>&nbsp;
                        <span>Inactive</span>
                    </div>
                </div>
            </div>
            <form action="{{ route('user.sharetap.permissions.update') }}" method="POST">
                @csrf

                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
                    @php
                        $items = [
                            ['id' => 'facebook', 'name' => 'Facebook', 'icon' => 'fab fa-facebook-f'],
                            ['id' => 'twitter', 'name' => 'Twitter', 'icon' => 'fab fa-twitter'],
                            ['id' => 'linkedin', 'name' => 'LinkedIn', 'icon' => 'fab fa-linkedin-in'],
                            ['id' => 'instagram', 'name' => 'Instagram', 'icon' => 'fab fa-instagram'],
                            ['id' => 'youtube', 'name' => 'YouTube', 'icon' => 'fab fa-youtube'],
                            ['id' => 'whatsapp', 'name' => 'WhatsApp', 'icon' => 'fab fa-whatsapp'],
                            ['id' => 'website', 'name' => 'Website', 'icon' => 'fas fa-globe'],
                            ['id' => 'services', 'name' => 'Services', 'icon' => 'fas fa-concierge-bell'],
                            ['id' => 'testimonials', 'name' => 'Testimonials', 'icon' => 'fas fa-quote-right'],
                            ['id' => 'business_hours', 'name' => 'Business Hours', 'icon' => 'far fa-clock'],
                            [
                                'id' => 'basic_info',
                                'name' => 'Basic Information',
                                'icon' => 'fas fa-info-circle',
                            ],
                        ];
                    @endphp

                    @foreach ($items as $item)
                        <div class="col-md-2 col-lg-2 col-4">
                            <div class="card permission-card  shadow" data-id="{{ $item['id'] }}"
                                @if (isset($shareTapPermissions) && $shareTapPermissions->{$item['id']} == 1) class="permission-selected" @endif>
                                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                    <i class="{{ $item['icon'] }} fa-2x mb-3"></i>
                                    <h6 class="card-title mb-2">{{ $item['name'] }}</h6>
                                    <label for="{{ $item['id'] }}" class="d-block">
                                        <input type="checkbox" name="{{ $item['id'] }}" id="{{ $item['id'] }}"
                                            value="1"
                                            {{ isset($shareTapPermissions) && $shareTapPermissions->{$item['id']} == 1 ? 'checked' : '' }}>
                                    </label>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="p-3">
                    <button class="btn btn-primary" type="submit">Update Permissions</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="pb-4"></div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.permission-card').forEach(card => {
            const checkbox = card.querySelector('input[type="checkbox"]');

            if (checkbox.checked) {
                card.classList.add('permission-selected');
            }

            card.addEventListener('click', () => {
                checkbox.checked = !checkbox.checked;
                card.classList.toggle('permission-selected', checkbox.checked);
            });
        });
    });
</script>
@endsection
