@extends('custom-views.layouts.app')
@section('title')
    {{ __('messages.dashboard') }}
@endsection
@section('content')
    <div class="container py-4">
        <div class="card shadow border-0">
            <div class="card-header">
                <h2 class="h4 mb-0">Business Hours</h2>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <ul class="m-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('user.business-hours.update') }}" method="post">
                    @csrf
                    @php
                        $days = [
                            'monday' => 'Monday',
                            'tuesday' => 'Tuesday',
                            'wednesday' => 'Wednesday',
                            'thursday' => 'Thursday',
                            'friday' => 'Friday',
                            'saturday' => 'Saturday',
                            'sunday' => 'Sunday',
                        ];

                        // Map the days to their weekday number (1 for Monday, 7 for Sunday)
                        $dayMapping = [
                            'monday' => 1,
                            'tuesday' => 2,
                            'wednesday' => 3,
                            'thursday' => 4,
                            'friday' => 5,
                            'saturday' => 6,
                            'sunday' => 7,
                        ];
                    @endphp

                    <div class="row g-3">
                        @foreach ($days as $key => $label)
                            @php
                                $dayNumber = $dayMapping[$key];
                                $businessHour = $businessHours[$dayNumber] ?? null;
                                $startTime = $businessHour?->start_time ?? '09:00';
                                $endTime = $businessHour?->end_time ?? '17:00';
                            @endphp
                            <div class="col-12 col-md-6">
                                <div class="card border shadow-sm">
                                    <div class="card-body d-flex flex-column">
                                        <div class="d-flex align-items-center mb-3">
                                            <i class="fas fa-calendar-day text-primary me-2"></i>&nbsp;&nbsp;
                                            <h5 class="mb-0 text-capitalize">{{ $label }}</h5>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-6">
                                                <label for="{{ $key }}_start" class="form-label">Start Time</label>
                                                <input type="time" id="{{ $key }}_start"
                                                    name="{{ $key }}_start"
                                                    class="form-control @error($key . '_start') is-invalid @enderror"
                                                    value="{{ old($key . '_start', $startTime) }}">
                                                @error($key . '_start')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <label for="{{ $key }}_end" class="form-label">End Time</label>
                                                <input type="time" id="{{ $key }}_end"
                                                    name="{{ $key }}_end"
                                                    class="form-control @error($key . '_end') is-invalid @enderror"
                                                    value="{{ old($key . '_end', $endTime) }}">
                                                @error($key . '_end')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>&nbsp;Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
