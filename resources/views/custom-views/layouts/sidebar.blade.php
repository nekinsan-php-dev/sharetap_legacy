<aside class="main-sidebar sidebar-light-primary elevation-4">
    <a href="{{ url('/user/dashboard') }}" class="brand-link">
        <img src="{{ getDashboardLogoUrl() }}" alt="sharetap logo" style="height: 25px;">
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ auth()->user()->profile_img }}" style="height: 40px; width: 40px; border-radius: 50%; object-fit: cover;" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('user.profile.edit') }}"
                    class="d-block">{{ auth()->user()->first_name . ' ' . (auth()->user()->last_name ?? 'Full Name') }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('user.dashboard.index') }}"
                        class="nav-link {{ request()->is('user/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.basic.info') }}"
                        class="nav-link {{ request()->is('user/basic-info') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Basic Information</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.profile.templates') }}"
                        class="nav-link {{ request()->is('user/profile/templates') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-palette"></i>
                        <p>Templates</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.services') }}"
                        class="nav-link {{ request()->is('user/services*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Services</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.testimonials') }}"
                        class="nav-link {{ request()->is('user/testimonials*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>Testimonials</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.business-hours') }}"
                        class="nav-link {{ request()->is('user/business-hours*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-business-time"></i>
                        <p>Business Hours</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.social-links') }}"
                        class="nav-link {{ request()->is('user/social-links*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-share-alt"></i>
                        <p>Social Media</p>
                    </a>
                </li>
                <li class="nav-item">
                    @php
                        $url_alias = auth()->user()->vcard->url_alias;
                        $portfolio_url = url($url_alias);
                    @endphp
                    <a href="{{ $portfolio_url }}" target="_blank" class="nav-link">
                        <i class="nav-icon fas fa-eye"></i>
                        <p>Preview</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
