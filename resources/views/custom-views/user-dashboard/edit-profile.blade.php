@extends('custom-views.layouts.app')
@section('title')
    {{__('messages.dashboard')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="col-12">
                @include('layouts.errors')
                @include('flash::message')
                <div class="card">
                    <form id="userProfileEditForm" method="POST" action="{{ route('user.profile.edit') }}"
                          class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body pb-0">
                            <div class="row mb-6">
                                <label class="col-lg-4 form-label required">{{ __('messages.user.avatar') . ':' }}</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <div class="d-block">
                                        <div class="image-picker">
                                            <div class="image previewImage" id="exampleInputImage"
                                                 style="background-image: url('{{ !empty($user->profile_img) ? $user->profile_img : asset('web/media/avatars/user.png') }}')">
                                            </div>
                                            <span class="picker-edit rounded-circle text-gray-500 fs-small" title="edit">
                                                <label>
                                                    <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                                    <input type="file" id="profile_image" name="profile_img"
                                                           class="image-upload file-validation d-none" accept="image/*" />
                                                </label>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 form-label required">Cover Image</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <div class="d-block">
                                        <div class="images-picker">
                                            <div class="image previewImage" id="coverPreview"
                                                 style="background-image: url('{{ !empty($user->cover_img) ? $user->cover_img : asset('web/media/avatars/user.png') }}')">
                                            </div>
                                            <span class="picker-edit rounded-circle text-gray-500 fs-small"
                                                  data-bs-toggle="tooltip" data-placement="top"
                                                  data-bs-original-title="Change Cover Image">
                                                    <label>
                                                        <svg class="svg-inline--fa fa-pen click-image" id="profileImageIcon" aria-hidden="true"
                                                             focusable="false" data-prefix="fas" data-icon="pen" role="img"
                                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path
                                                                fill="currentColor"
                                                                d="M362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75C517.7 83.74 517.7 124.3 492.7 149.3L444.3 197.7L314.3 67.72L362.7 19.32zM421.7 220.3L188.5 453.4C178.1 463.8 165.2 471.5 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L291.7 90.34L421.7 220.3z"></path></svg>
                                                        <input type="file" id="coverImg" name="cover_img" class="d-none" accept="image/*, video/*">
                                                    </label>
                                                </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 form-label">{{ __('messages.user.full_name') . ':' }}</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            {!! Form::text('first_name', $user->first_name, [
                                                'class' => 'form-control',
                                                'placeholder' => __('messages.form.first_name'),
                                                'required',
                                                'id' => 'editProfileFirstName',
                                            ]) !!}
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            {!! Form::text('last_name', $user->last_name, [
                                                'class' => 'form-control',
                                                'placeholder' => __('messages.form.last_name'),
                                                'required',
                                                'id' => 'editProfileLastName',
                                            ]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 form-label required">{{ __('messages.user.email') . ':' }}</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    {!! Form::email('email', $user->email, [
                                        'class' => 'form-control',
                                        'placeholder' => __('messages.user.email'),
                                        'required',
                                        'id' => 'isEmailEditProfile',
                                    ]) !!}
                                </div>
                            </div>
                            <div class="row">
                                <label
                                    class="col-lg-4 form-label required">{{ __('messages.user.contact_number') . ':' }}</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    {{ Form::tel('contact', isset($user) ? (isset($user->region_code) ? '+' . $user->region_code . '' . $user->contact : $user->contact) : null, ['class' => 'form-control', 'placeholder' => __('messages.form.contact'), 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")', 'id' => 'phoneNumber']) }}
                                    {{ Form::hidden('region_code', isset($user) ? $user->region_code : null, ['id' => 'prefix_code']) }}
                                    <span id="valid-msg"
                                          class="text-success d-none fw-400 fs-small mt-2">{{ __('messages.placeholder.valid_number') }}</span>
                                    <span id="error-msg" class="text-danger d-none fw-400 fs-small mt-2">Invalid
                                        Number</span>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex">
                            {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-2']) }}
                            @role(\App\Models\Role::ROLE_ADMIN)
                            <a href="{{ route('admin.dashboard') }}"
                               class="btn btn-secondary">{{ __('messages.common.discard') }}</a>
                            @endrole
                            @role(\App\Models\Role::ROLE_SUPER_ADMIN)
                            <a href="{{ route('sadmin.dashboard') }}"
                               class="btn btn-secondary">{{ __('messages.common.discard') }}</a>
                            @endrole
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
