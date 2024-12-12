@extends('custom-views.layouts.app')

@section('title')
    {{ __('messages.dashboard') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="p-2">
            <div class="p-2" style="font-size: 1.5rem;">
                Sharetap Permission
            </div>
            <div class="p-2">Select what you want to activate</div>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('user.sharetap.permissions.update') }}" method="POST">
                    @csrf

                    <div class="row row-cols-2 row-cols-md-4 row-cols-lg-6 g-3">
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
                            <div class="col col-4">
                                <div class="card h-100 shadow-sm permission-card" data-id="{{ $item['id'] }}"
                                    @if (isset($shareTapPermissions) && $shareTapPermissions->{$item['id']} == 1) class="permission-selected" @endif>
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                        <i class="{{ $item['icon'] }} fa-2x mb-3"></i>
                                        <h6 class="card-title mb-0">{{ $item['name'] }}</h6>
                                        <label for="{{ $item['id'] }}" class="d-block">
                                            <input type="checkbox" name="{{ $item['id'] }}" id="{{ $item['id'] }}"
                                                value="1"
                                                {{ isset($shareTapPermissions) && $shareTapPermissions->{$item['id']} == 1 ? 'checked' : '' }}
                                                class="d-none">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="p-3">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.permission-card').forEach(card => {
                const checkbox = card.querySelector('input[type="checkbox"]');

                // Set initial state based on checkbox
                if (checkbox.checked) {
                    card.classList.add('permission-selected');
                }

                card.addEventListener('click', () => {
                    // Toggle the checked state
                    checkbox.checked = !checkbox.checked;

                    // Toggle the background color of the card
                    card.classList.toggle('permission-selected', checkbox.checked);
                });
            });
        });
    </script>
@endsection
