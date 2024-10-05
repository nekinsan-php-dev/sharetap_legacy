<div id="mySidebar" class="sidebar d-lg-block d-xl-block">
    <a href="javascript:void(0)" class="closebtn d-lg-none d-block pt-3" onclick="closeNav()">×</a>
    <ul class="nav nav-tabs-1 mb-sm-7 mb-5 pb-1 flex-nowrap text-nowrap flex-sm-column d-sm-flex d-block">
        <div class="d-sm-flex flex-sm-column overflow-auto">
            <li class="nav-item nav-item-1 position-relative">
                <a class="nav-link-1 nav-link p-3 {{ request()->is('user/dashboard*') ? 'active' : '' }}" href="{{ route('user.dashboard.index') }}">
                    <svg class="svg-inline--fa fa-circle-question p-1 icon-color-bs-blue" aria-hidden="true"
                         focusable="false" data-prefix="fas" data-icon="circle-question" role="img"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                        <path fill="currentColor"
                              d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM256 400c-18 0-32-14-32-32s13.1-32 32-32c17.1 0 32 14 32 32S273.1 400 256 400zM325.1 258L280 286V288c0 13-11 24-24 24S232 301 232 288V272c0-8 4-16 12-21l57-34C308 213 312 206 312 198C312 186 301.1 176 289.1 176h-51.1C225.1 176 216 186 216 198c0 13-11 24-24 24s-24-11-24-24C168 159 199 128 237.1 128h51.1C329 128 360 159 360 198C360 222 347 245 325.1 258z"></path>
                    </svg>
                    <!-- <i class="fa-solid fa-circle-question p-1 icon-color-bs-blue"></i> Font Awesome fontawesome.com -->
                    Basic Details
                </a>
            </li>
            <li class="nav-item nav-item-1 position-relative vcards-templates">
                <a class="nav-link-1 nav-link p-3 {{ request()->is('user/profile/templates') ? 'active' : '' }}" href="{{ route('user.profile.templates') }}">
                    <svg class="svg-inline--fa fa-note-sticky p-1 icon-color-bs-red" aria-hidden="true"
                         focusable="false" data-prefix="fas" data-icon="note-sticky" role="img"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                        <path fill="currentColor"
                              d="M400 32h-352C21.49 32 0 53.49 0 80v352C0 458.5 21.49 480 48 480h245.5c16.97 0 33.25-6.744 45.26-18.75l90.51-90.51C441.3 358.7 448 342.5 448 325.5V80C448 53.49 426.5 32 400 32zM64 96h320l-.001 224H320c-17.67 0-32 14.33-32 32v64H64V96z"></path>
                    </svg>
                    <!-- <i class="fa-solid fa-note-sticky p-1 icon-color-bs-red"></i> Font Awesome fontawesome.com -->
                    Profile Templates
                </a>
            </li>
            <li class="nav-item nav-item-1 position-relative">
                <a class="nav-link-1 nav-link p-3 {{ request()->is('user/business-hours') ? 'active' : '' }}"
                   href="{{ route('user.business-hours') }}">
                    <svg class="svg-inline--fa fa-clock p-1 icon-color-bs-yellow" aria-hidden="true" focusable="false"
                         data-prefix="fas" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 512 512" data-fa-i2svg="">
                        <path fill="currentColor"
                              d="M256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512zM232 256C232 264 236 271.5 242.7 275.1L338.7 339.1C349.7 347.3 364.6 344.3 371.1 333.3C379.3 322.3 376.3 307.4 365.3 300L280 243.2V120C280 106.7 269.3 96 255.1 96C242.7 96 231.1 106.7 231.1 120L232 256z"></path>
                    </svg>
                    <!-- <i class="fa-solid fa-clock p-1 icon-color-bs-yellow"></i> Font Awesome fontawesome.com -->
                    Business Hours
                </a>
            </li>
            <li class="nav-item nav-item-1 position-relative">
                <a class="nav-link-1 nav-link p-3 {{ request()->is('user/services*') ? 'active' : '' }}" href="{{ route('user.services') }}">
                    <svg class="svg-inline--fa fa-wrench p-1 icon-color-bs-darkyellow" aria-hidden="true"
                         focusable="false" data-prefix="fas" data-icon="wrench" role="img"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                        <path fill="currentColor"
                              d="M507.6 122.8c-2.904-12.09-18.25-16.13-27.04-7.338l-76.55 76.56l-83.1-.0002l0-83.1l76.55-76.56c8.791-8.789 4.75-24.14-7.336-27.04c-23.69-5.693-49.34-6.111-75.92 .2484c-61.45 14.7-109.4 66.9-119.2 129.3C189.8 160.8 192.3 186.7 200.1 210.1l-178.1 178.1c-28.12 28.12-28.12 73.69 0 101.8C35.16 504.1 53.56 512 71.1 512s36.84-7.031 50.91-21.09l178.1-178.1c23.46 7.736 49.31 10.24 76.17 6.004c62.41-9.84 114.6-57.8 129.3-119.2C513.7 172.1 513.3 146.5 507.6 122.8zM80 456c-13.25 0-24-10.75-24-24c0-13.26 10.75-24 24-24s24 10.74 24 24C104 445.3 93.25 456 80 456z"></path>
                    </svg>
                    <!-- <i class="fa-solid fa-wrench p-1 icon-color-bs-darkyellow"></i> Font Awesome fontawesome.com -->
                    Services
                </a>
            </li>
            <li class="nav-item nav-item-1 position-relative">
                <a class="nav-link-1 nav-link p-3 {{ request()->is('user/testimonials*') ? 'active' : '' }}" href="{{ route('user.testimonials') }}">
                    <svg class="svg-inline--fa fa-comment p-1 icon-color-bs-red" aria-hidden="true" focusable="false"
                         data-prefix="fas" data-icon="comment" role="img" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 512 512" data-fa-i2svg="">
                        <path fill="currentColor"
                              d="M256 32C114.6 32 .0272 125.1 .0272 240c0 49.63 21.35 94.98 56.97 130.7c-12.5 50.37-54.27 95.27-54.77 95.77c-2.25 2.25-2.875 5.734-1.5 8.734C1.979 478.2 4.75 480 8 480c66.25 0 115.1-31.76 140.6-51.39C181.2 440.9 217.6 448 256 448c141.4 0 255.1-93.13 255.1-208S397.4 32 256 32z"></path>
                    </svg>
                    <!-- <i class="fa-solid fa-comment p-1 icon-color-bs-red"></i> Font Awesome fontawesome.com -->
                    Testimonials
                </a>
            </li>
            <li class="nav-item nav-item-1 position-relative">
                <a class="nav-link-1 nav-link p-3 {{ request()->is('user/social-links') ? 'active' : '' }}" href="{{ route('user.social-links') }}">
                    <svg class="svg-inline--fa fa-globe p-1 icon-color-bs-blue" aria-hidden="true" focusable="false"
                         data-prefix="fas" data-icon="globe" role="img" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 512 512" data-fa-i2svg="">
                        <path fill="currentColor"
                              d="M352 256C352 278.2 350.8 299.6 348.7 320H163.3C161.2 299.6 159.1 278.2 159.1 256C159.1 233.8 161.2 212.4 163.3 192H348.7C350.8 212.4 352 233.8 352 256zM503.9 192C509.2 212.5 512 233.9 512 256C512 278.1 509.2 299.5 503.9 320H380.8C382.9 299.4 384 277.1 384 256C384 234 382.9 212.6 380.8 192H503.9zM493.4 160H376.7C366.7 96.14 346.9 42.62 321.4 8.442C399.8 29.09 463.4 85.94 493.4 160zM344.3 160H167.7C173.8 123.6 183.2 91.38 194.7 65.35C205.2 41.74 216.9 24.61 228.2 13.81C239.4 3.178 248.7 0 256 0C263.3 0 272.6 3.178 283.8 13.81C295.1 24.61 306.8 41.74 317.3 65.35C328.8 91.38 338.2 123.6 344.3 160H344.3zM18.61 160C48.59 85.94 112.2 29.09 190.6 8.442C165.1 42.62 145.3 96.14 135.3 160H18.61zM131.2 192C129.1 212.6 127.1 234 127.1 256C127.1 277.1 129.1 299.4 131.2 320H8.065C2.8 299.5 0 278.1 0 256C0 233.9 2.8 212.5 8.065 192H131.2zM194.7 446.6C183.2 420.6 173.8 388.4 167.7 352H344.3C338.2 388.4 328.8 420.6 317.3 446.6C306.8 470.3 295.1 487.4 283.8 498.2C272.6 508.8 263.3 512 255.1 512C248.7 512 239.4 508.8 228.2 498.2C216.9 487.4 205.2 470.3 194.7 446.6H194.7zM190.6 503.6C112.2 482.9 48.59 426.1 18.61 352H135.3C145.3 415.9 165.1 469.4 190.6 503.6V503.6zM321.4 503.6C346.9 469.4 366.7 415.9 376.7 352H493.4C463.4 426.1 399.8 482.9 321.4 503.6V503.6z"></path>
                    </svg><!-- <i class="fa-solid fa-globe p-1 icon-color-bs-blue"></i> Font Awesome fontawesome.com -->
                    Social links - Website
                </a>
            </li>
            <li class="nav-item nav-item-1 position-relative">
                <a class="nav-link-1 nav-link p-3 {{ request()->is('sharetap/permissions') ? 'active' : '' }}" href="{{ route('user.sharetap.permissions') }}">
                    <svg class="svg-inline--fa fa-globe p-1 icon-color-bs-blue" aria-hidden="true" focusable="false"
                         data-prefix="fas" data-icon="globe" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z"/></svg>
                    Permission
                </a>
            </li>

        </div>
    </ul>
</div>
