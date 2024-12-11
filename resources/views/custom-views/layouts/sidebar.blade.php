<div class="aside-menu-container" id="sidebar">
    <div class="aside-menu-container__aside-logo flex-column-auto">
        <a data-turbo="false" href="{{ url('/') }}" class="text-decoration-none sidebar-logo" target="_blank">
            <div class="image">
                <img src="{{ getDashboardLogoUrl() }}" alt="Logo" class="object-fit-cover sidebar-app-logo"/>
            </div>
            <!--<span class="text-gray-900 fs-4">{{ (strlen(getAppName()) > 12 ) ? substr(getAppName(), 0,12).'...' : getAppName() }}</span>-->
        </a>
        <button type="button" class="btn px-0 aside-menu-container__aside-menubar d-lg-block d-none sidebar-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="29" height="28" fill="#6C757D" class="bi bi-list"
                 viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </button>
    </div>
    <div class="sidebar-scrolling">
        <ul class="aside-menu-container__aside-menu nav flex-column">
            @include('custom-views.layouts.menu')
            <div class="no-record text-center d-none">{{ __('messages.no_matching_records_found')}}</div>
        </ul>
    </div>
</div>
<div class="bg-overlay" id="sidebar-overly"></div>

