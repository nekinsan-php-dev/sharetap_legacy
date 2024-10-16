    <!-- start footer section -->
    <footer class="bg-dark text-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img src="{{ getLogoUrl() }}" alt="{{ getAppName() }}" class="img-fluid mb-3" style="max-height: 50px;">
                    
                    <p class="text-muted">Empowering your digital presence with innovative solutions.</p>
                    @if (isset($setting['mobile_app_enable']) && $setting['mobile_app_enable'] == 1)
                        <h6 class="text-white mt-4 mb-3">{{ __('messages.get_the_free_app') }}</h6>
                        <div class="d-flex flex-wrap gap-2">
                            @if (isset($setting['play_store_link']) && !empty($setting['play_store_link']))
                                <a href="{{ $setting['play_store_link'] }}" target="_blank" class="btn btn-outline-light btn-sm">
                                    <i class="fab fa-google-play me-2"></i>Google Play
                                </a>
                            @endif
                            @if (isset($setting['app_store_link']) && !empty($setting['app_store_link']))
                                <a href="{{ $setting['app_store_link'] }}" target="_blank" class="btn btn-outline-light btn-sm">
                                    <i class="fab fa-apple me-2"></i>App Store
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5 class="text-white mb-3">{{ __('messages.Subscribe_Our_Newsletter') }}</h5>
                    <p class="text-muted">{{ __('messages.Receive_latest_news_update_and_many_other_things_every_week') }}</p>
                    <form action="{{ route('email.sub') }}" method="post" id="addEmail" class="mt-3">
                        @csrf()
                        <div class="input-group">
                            <input type="email" name="email" class="form-control" placeholder="{{ __('messages.front.enter_your_email') }}" required>
                            <button type="submit" class="btn btn-primary">{{ __('messages.subscribe') }}</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <h5 class="text-white mb-3">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('terms.conditions') }}" class="text-muted text-decoration-none">{!! __('messages.vcard.term_condition') !!}</a></li>
                        <li class="mb-2"><a href="{{ route('privacy.policy') }}" class="text-muted text-decoration-none">{{ __('messages.vcard.privacy_policy') }}</a></li>
                        <li><a href="{{ route('refund.policy') }}" class="text-muted text-decoration-none">Refund Policy</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 bg-secondary">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0 text-muted">© {{ \Carbon\Carbon::now()->year }} {{ __('auth.copyright_by') }} <span class="fw-bold">Nek Insan</span></p>
                </div>
                <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
                    <p class="mb-0 text-muted">Powered by Jiyo India Sales Marketing Pvt. Ltd.</p>
                </div>
            </div>
        </div>
    </footer>

    @if (isset($setting['banner_enable']) && $setting['banner_enable'] == 1)
        <!-- Support Banner Section -->
        <div class="position-fixed bottom-0 start-0 end-0 p-3 bg-primary text-white banner-cookie d-none">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h5 class="mb-1">{{ $setting['banner_title'] }}</h5>
                        <p class="mb-0 small">{{ $setting['banner_description'] }}</p>
                    </div>
                    <div class="col-md-4 text-md-end mt-3 mt-md-0">
                        <a href="{{ $setting['banner_url'] }}" class="btn btn-light btn-sm me-2" target="_blank" data-turbo="false">{{ $setting['banner_button'] }}</a>
                        <button type="button" class="btn btn-outline-light btn-sm disbale-cookie">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
