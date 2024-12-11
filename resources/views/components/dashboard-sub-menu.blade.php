<div id="mySidebar" class="sidebar d-lg-block d-xl-block">
    <a href="javascript:void(0)" class="closebtn d-lg-none d-block pt-3" onclick="closeNav()">×</a>
    <ul class="nav nav-tabs-1 mb-sm-7 mb-5 pb-1 flex-nowrap text-nowrap flex-sm-column d-sm-flex d-block">
        <div class="d-sm-flex flex-sm-column overflow-auto">
            <li class="nav-item nav-item-1 position-relative">
                <a class="nav-link-1 nav-link p-3 {{ request()->is('user/dashboard*') ? 'active' : '' }}" href="{{ route('user.dashboard.index') }}">

                    <!-- <i class="fa-solid fa-circle-question p-1 icon-color-bs-blue"></i> Font Awesome fontawesome.com -->
                    Basic Details
                </a>
            </li>
            <li class="nav-item nav-item-1 position-relative vcards-templates">
                <a class="nav-link-1 nav-link p-3 {{ request()->is('user/profile/templates') ? 'active' : '' }}" href="{{ route('user.profile.templates') }}">

                    <!-- <i class="fa-solid fa-note-sticky p-1 icon-color-bs-red"></i> Font Awesome fontawesome.com -->
                    Profile Templates
                </a>
            </li>
            <li class="nav-item nav-item-1 position-relative">
                <a class="nav-link-1 nav-link p-3 {{ request()->is('user/business-hours') ? 'active' : '' }}"
                   href="{{ route('user.business-hours') }}">

                    <!-- <i class="fa-solid fa-clock p-1 icon-color-bs-yellow"></i> Font Awesome fontawesome.com -->
                    Business Hours
                </a>
            </li>
            <li class="nav-item nav-item-1 position-relative">
                <a class="nav-link-1 nav-link p-3 {{ request()->is('user/services*') ? 'active' : '' }}" href="{{ route('user.services') }}">

                    <!-- <i class="fa-solid fa-wrench p-1 icon-color-bs-darkyellow"></i> Font Awesome fontawesome.com -->
                    Services
                </a>
            </li>
            <li class="nav-item nav-item-1 position-relative">
                <a class="nav-link-1 nav-link p-3 {{ request()->is('user/testimonials*') ? 'active' : '' }}" href="{{ route('user.testimonials') }}">

                    <!-- <i class="fa-solid fa-comment p-1 icon-color-bs-red"></i> Font Awesome fontawesome.com -->
                    Testimonials
                </a>
            </li>
            <li class="nav-item nav-item-1 position-relative">
                <a class="nav-link-1 nav-link p-3 {{ request()->is('user/social-links') ? 'active' : '' }}" href="{{ route('user.social-links') }}">

                    Social links - Website
                </a>
            </li>
            <li class="nav-item nav-item-1 position-relative">
                <a class="nav-link-1 nav-link p-3 {{ request()->is('sharetap/permissions') ? 'active' : '' }}" href="{{ route('user.sharetap.permissions') }}">

                    Permission
                </a>
            </li>

        </div>
    </ul>
</div>
