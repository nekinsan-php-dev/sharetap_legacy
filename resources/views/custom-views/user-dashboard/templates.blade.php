@extends('custom-views.layouts.app')
@section('title')
    {{ __('messages.dashboard') }}
@endsection
@section('content')

    @php
        // Reorder templates to place the checked template first
        $checkedTemplate = $templates->firstWhere('id', $user->vcard->template_id);
        $templates = $templates->where('id', '!=', $user->vcard->template_id);
        if ($checkedTemplate) {
            $templates->prepend($checkedTemplate);
        }
        $selectedTemplates = explode(',', $user->vcard->selected_templates);
    @endphp
    <div class="container-fluid">
        <div class="pt-2 pb-2">
            <h2 class="text-2xl font-weight-bold">Choose your template</h2>
        </div>
        <div class="card shadow">
            <div class="card-body">

                <form id="templateForm" action="{{ route('user.template.update') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="d-flex justify-content-end">
                        <div class="pb-2">
                            <button class="btn btn-primary btn-sm" type="submit">Update Template</button>
                        </div>
                    </div>
                    <div class="row g-4">
                        @foreach ($templates as $template)
                            @if ($user->vcard->template_id == $template->id || in_array($template->id, $selectedTemplates))
                                <div class="col-md-4 col-6">

                                    <div class="template-card" data-id="{{ $template->id }}">
                                        <div>
                                            <div class="template-status">
                                                @if ($user->vcard->template_id == $template->id)
                                                    <span class="p-2 shadow-sm bg-success">Current Active</span>
                                                @elseif (in_array($template->id, $selectedTemplates))
                                                    <span class="p-2 shadow-sm bg-primary">{{ $template->name }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <input type="radio" name="template_id" value="{{ $template->id }}" class="d-none"
                                            {{ $user->vcard->template_id == $template->id ? 'checked' : '' }}>
                                        <img src="{{ asset($template->path) }}" alt="{{ $template->name }}" class="img-fluid rounded">

                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .template-card {
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 3px solid transparent;
            border-radius: 8px;
            overflow: hidden;
        }

        .template-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .template-card.selected {
            border-color: #007bff;
        }

        .template-info {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(255, 255, 255, 0.9);
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .template-info h5 {
            margin: 0;
            font-size: 1rem;
        }

        .template-status {
            font-size: 0.8rem;
        }

        .badge {
            font-weight: normal;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const templateCards = document.querySelectorAll('.template-card');

            templateCards.forEach(card => {
                card.addEventListener('click', function() {
                    templateCards.forEach(c => c.classList.remove('selected'));
                    this.classList.add('selected');
                    this.querySelector('input[type="radio"]').checked = true;
                });
            });
        });
    </script>
@endsection
