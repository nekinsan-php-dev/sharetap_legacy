<div id="mySidebar" class=" d-lg-block d-xl-block  p-3">
    <button class="btn-close d-lg-none d-block mb-4" onclick="closeNav()"></button>
    <ul class="nav flex-column gap-3">
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center p-2 {{ request()->is('user/dashboard*') ? 'active' : '' }}"
                href="{{ route('user.dashboard.index') }}">
                <span class="me-2"><i class="fas fa-dashboard"></i></span>
                <span>Dashboard</span>
            </a>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center p-2 {{ request()->is('user/dashboard*') ? 'active' : '' }}"
                href="{{ route('user.basic.info') }}">
                <span class="me-2"><i class="fas fa-circle-question"></i></span>
                <span>Basic Details</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center p-2 {{ request()->is('user/profile/templates') ? 'active' : '' }}"
                href="{{ route('user.profile.templates') }}">
                <span class="me-2"><i class="fas fa-note-sticky"></i></span>
                <span>Profile Templates</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center p-2 {{ request()->is('user/business-hours') ? 'active' : '' }}"
                href="{{ route('user.business-hours') }}">
                <span class="me-2"><i class="fas fa-clock"></i></span>
                <span>Business Hours</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center p-2 {{ request()->is('user/services*') ? 'active' : '' }}"
                href="{{ route('user.services') }}">
                <span class="me-2"><i class="fas fa-wrench"></i></span>
                <span>Services</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center p-2 {{ request()->is('user/testimonials*') ? 'active' : '' }}"
                href="{{ route('user.testimonials') }}">
                <span class="me-2"><i class="fas fa-comment"></i></span>
                <span>Testimonials</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center p-2 {{ request()->is('user/social-links') ? 'active' : '' }}"
                href="{{ route('user.social-links') }}">
                <span class="me-2"><i class="fas fa-link"></i></span>
                <span>Social Links - Website</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center p-2 {{ request()->is('sharetap/permissions') ? 'active' : '' }}"
                href="{{ route('user.sharetap.permissions') }}">
                <span class="me-2"><i class="fas fa-lock"></i></span>
                <span>Permission</span>
            </a>
        </li>
        <li class="nav-item">
            @php
                $url_alias = auth()->user()->vcard->url_alias;
                $portfolio_url = url($url_alias);
            @endphp
            <a href="{{ $portfolio_url }}" target="_blank" class="nav-link d-flex align-items-center p-2">
               <span class="me-2"><i class="fas fa-link"></i></span>
                <span>View Portfolio</span>
            </a>
        </li>
    </ul>
</div>
