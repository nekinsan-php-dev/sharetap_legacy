<header class='d-flex align-items-center justify-content-between flex-grow-1 header px-3 px-xl-0'>
    <button type="button"
        class="btn px-0 aside-menu-container__aside-menubar d-block d-xl-none sidebar-btn sidemenu-btn">
        <i class="fa-solid fa-bars fs-1"></i>
    </button>
    <nav class="navbar navbar-expand-xl navbar-light top-navbar d-xl-flex d-block px-3 px-xl-0 py-4 py-xl-0 {{ !getLogInUser()->theme_mode ? 'bg-white' : '' }}"
        id="nav-header">
        <div class="container-fluid pe-0">
            <div class="navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @include('layouts.sub_menu')
                </ul>
            </div>
        </div>
    </nav>
    <ul class="nav align-items-center flex-nowrap">
        @php
            $currentTemplateStatus = getLogInUser()->vcard->status;
        @endphp
        @if (getLogInUser()->hasrole('user'))
            <li class="px-xxl-3 px-2">
                <a class="btn btn-light" data-turbo="false"
                    href="{{ route('user.vcard.change-status', getLogInUser()->vcard->id) }}"
                    title="Profile has been {{ $currentTemplateStatus == 0 ? 'Inactive' : 'Active' }}">
                    @if ($currentTemplateStatus == 0)
                        Inactive
                    @else
                        Active
                    @endif
                </a>
            </li>
        @endif


        <li class="px-xxl-3 px-2">
            <div class="dropdown d-flex align-items-center py-4">
                <div class="image image-circle image-mini">
                    <img src="{{ getLogInUser()->profile_img }}" class="img-fluid" alt="profile image">
                </div>
                <button class="btn dropdown-toggle ps-2 pe-0" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                    {!! getLogInUser()->full_name !!}
                </button>
                <div class="dropdown-menu py-7 pb-4 my-2" aria-labelledby="dropdownMenuButton1"
                    data-bs-auto-close="outside" style="z-index: 999999">
                    <div class="text-center border-bottom pb-5">
                        <div class="image image-circle image-tiny mb-5">
                            <img src="{{ getLogInUser()->profile_img }}" class="img-fluid" alt="profile image">
                        </div>
                        <h3 class="text-gray-900">{{ getLogInUser()->full_name }}</h3>
                        <h4 class="mb-0 fw-400 fs-6">{{ getLogInUser()->email }}</h4>
                    </div>
                    <ul class="pt-4">
                        <li>
                            <a class="dropdown-item text-gray-900" href="{{ route('user.profile.edit') }}">
                                <span class="dropdown-icon me-4 text-gray-600">
                                    <i class="fa-solid fa-user icon-color-bs-green"></i>
                                </span>
                                {{ __('messages.user.account_setting') }}
                            </a>
                        </li>
                        @role(\App\Models\Role::ROLE_ADMIN)
                            <li>
                                <a class="dropdown-item text-gray-900" href="{{ route('subscription.index') }}">
                                    <span class="dropdown-icon me-4 text-gray-600">
                                        <i class="fa-solid fa-money-bill icon-color-bs-purple"></i>
                                    </span>
                                    {{ __('messages.subscription.manage_subscription') }}</a>
                            </li>
                        @endrole
                        @if (is_impersonating() === false)
                            <li>
                                <a class="dropdown-item text-gray-900" id="changePassword" href="javascript:void(0)">
                                    <span class="dropdown-icon me-4 text-gray-600">
                                        <i class="fa-solid fa-lock icon-color-bs-orange"></i>
                                    </span>
                                    {{ __('messages.user.change_password') }}
                                </a>
                            </li>
                        @endif
                        @role(\App\Models\Role::ROLE_ADMIN)
                            <li>
                                <a class="dropdown-item text-gray-900" href="{{ route('delete-account') }}">
                                    <span class="dropdown-icon me-4 text-gray-600">
                                        <i class="fa-solid fa-trash icon-color-bs-red"></i>
                                    </span>
                                    {{ __('messages.user.delete_my_account') }}</a>
                            </li>
                        @endrole
                        <li>
                            <a class="dropdown-item text-gray-900 d-flex" href="javascript:void(0)">
                                <span class="dropdown-icon me-4 text-gray-600">
                                    <i class="fa-solid fa-right-from-bracket icon-color-bs-blue"></i>
                                </span>
                                <form id="logout-form" action="{{ route('user.logout') }}" method="post">
                                    @csrf
                                </form>
                                <span
                                    onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                                    {{ __('messages.sign_out') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </li>

    </ul>
</header>
<div class="bg-overlay" id="nav-overly"></div>
