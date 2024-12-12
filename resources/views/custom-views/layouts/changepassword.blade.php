<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>{{ __('messages.user.change_password') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="changePasswordForm" method="POST" action="">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="alert alert-danger d-none" id="editPasswordValidationErrorsBox"></div>
                    <div class="mb-5">
                        <label for="current_password" class="form-label required">
                            {{ __('messages.user.current_password') }}:
                        </label>
                        <div class="mb-3 position-relative">
                            <input type="password" id="current_password" name="current_password"
                                   class="form-control" placeholder="{{ __('messages.user.current_password') }}"
                                   autocomplete="off" aria-label="Password" data-toggle="password">
                            <span class="position-absolute d-flex align-items-center top-0 bottom-0 end-0 me-4 input-icon input-password-hide cursor-pointer text-gray-600">
                                <i class="bi bi-eye-slash-fill"></i>
                            </span>
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="new_password" class="form-label required">
                            {{ __('messages.user.new_password') }}:
                        </label>
                        <div class="mb-3 position-relative">
                            <input type="password" id="new_password" name="new_password"
                                   class="form-control" placeholder="{{ __('messages.user.new_password') }}"
                                   autocomplete="off" aria-label="Password" data-toggle="password">
                            <span class="position-absolute d-flex align-items-center top-0 bottom-0 end-0 me-4 input-icon input-password-hide cursor-pointer text-gray-600">
                                <i class="bi bi-eye-slash-fill"></i>
                            </span>
                        </div>
                    </div>
                    <div>
                        <label for="confirm_password" class="form-label required">
                            {{ __('messages.user.confirm_password') }}:
                        </label>
                        <div class="mb-3 position-relative">
                            <input type="password" id="confirm_password" name="confirm_password"
                                   class="form-control" placeholder="{{ __('messages.user.confirm_password') }}"
                                   autocomplete="off" aria-label="Password" data-toggle="password">
                            <span class="position-absolute d-flex align-items-center top-0 bottom-0 end-0 me-4 input-icon input-password-hide cursor-pointer text-gray-600">
                                <i class="bi bi-eye-slash-fill"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pt-0">
                    <button type="submit" class="btn btn-primary m-0" id="passwordChangeBtn">
                        {{ __('messages.common.save') }}
                    </button>
                    <button type="button" class="btn btn-secondary my-0 ms-5 me-0" data-bs-dismiss="modal">
                        {{ __('messages.common.discard') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
