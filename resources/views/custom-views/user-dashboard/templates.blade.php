
@extends('custom-views.layouts.app')
@section('title')
    {{__('messages.dashboard')}}
@endsection
@section('content')

    @php
        // Reorder templates to place the checked template first
        $checkedTemplate = $templates->firstWhere('id', $user->vcard->template_id);
        $templates = $templates->where('id', '!=', $user->vcard->template_id);
        if ($checkedTemplate) {
            $templates->prepend($checkedTemplate);
        }
    @endphp
<div>
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-body p-0">
                <div>
                    <form action="{{ route('user.template.update') }}" method="post"  style="padding: 29px;">
                        @csrf
                        @method('PUT')
                    @php
                        $selectedTemplates = explode(',', $user->vcard->selected_templates);
                    @endphp
                    <div class="row">
                        @foreach($templates as $template)
                            @if($user->vcard->template_id == $template->id || in_array($template->id, $selectedTemplates))
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="img-radio img-thumbnail" data-id="{{ $template->id }}" style="{{ $user->vcard->template_id == $template->id ? 'background-color: #52BE80;' : (in_array($template->id, $selectedTemplates) ? 'background-color: #FFD700;' : '') }}">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h5>{{ $template->name }}</h5>
                                                </div>
                                                <div>
                                                    <input type="radio" {{ $user->vcard->template_id == $template->id ? 'checked' : '' }} name="template_id" value="{{ $template->id }}">
                                                </div>
                                            </div>
                                            <img src="{{ asset($template->path) }}" alt="Template">
                                        </label>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                        <div>
                            <button class="btn btn-primary float-right" type="submit">Update</button>
                        </div>
                    </form>
                </div>

            </div>
    </div></div>
@endsection
