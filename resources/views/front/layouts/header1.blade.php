<!-- start header section -->
<header class="bg-white shadow-sm">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ getLogoUrl() }}" alt="ShareTap" class="mr-2" style="height: 40px;">

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('') . '#frontHomeTab' }}">{{ __('auth.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('') . '#aboutUsTab' }}">{{ __('auth.about') }}</a>
                    </li>
                    <li class="nav-item @if($faqs === null) d-none @endif">
                        <a class="nav-link" href="{{ route('fornt-faq') }}">{{ __('messages.faqs.faqs') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('') . '#frontPricingTab' }}">{{ __('auth.pricing') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('') . '#frontContactUsTab' }}">{{ __('auth.contact') }}</a>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-center">

                    <li class="nav-item">
                        <a class="btn btn-primary me-2 hover-text-white" href="{{ route('card.create') }}" role="button">Create New Card</a>
                    </li>
                    @if (empty(getLogInUser()))
                        <li class="nav-item sign-in-btn">
                            <a class="btn btn-outline-secondary" href="{{ route('user.login') }}" role="button">{{ __('auth.sign_in') }}</a>
                        </li>
                    @else
                        @if(getLogInUser()->hasrole('user'))
                            <li class="nav-item">
                                <a class="btn btn-outline-secondary" href="{{ route('user.dashboard.index') }}" role="button">{{ __('messages.dashboard') }}</a>
                            </li>
                        @endif
                        @if (getLogInUser()->hasrole('admin'))
                            <li class="nav-item">
                                <a class="btn btn-outline-secondary" href="{{ route('admin.dashboard') }}" role="button">{{ __('messages.dashboard') }}</a>
                            </li>
                        @endif
                        @if (getLogInUser()->hasrole('super_admin'))
                            <li class="nav-item">
                                <a class="btn btn-outline-secondary" href="{{ route('sadmin.dashboard') }}" role="button">{{ __('messages.dashboard') }}</a>
                            </li>
                        @endif
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- end header section -->
