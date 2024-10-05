
@extends('custom-views.layouts.app')
@section('title')
    {{__('messages.dashboard')}}
@endsection
@section('content')
    <style>
    .schedule-row {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }
    .schedule-row label {
        width: 100px;
        margin-right: 10px;
    }
    .schedule-row .form-check {
        margin-right: 20px;
    }
    .schedule-row select {
        width: 150px;
    }
</style>
<div>
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-body p-0">
                <div class="row p-2">
                      <div class="col-md-12 p-2">
                        @if(isset($businessHours))
                            <form action="{{ route('user.business-hours.update') }}" method="post">
                                @csrf
                                <table width="60%">
                                    @php
                                        $days = [
                                            'monday' => 1,
                                            'tuesday' => 2,
                                            'wednesday' => 3,
                                            'thursday' => 4,
                                            'friday' => 5,
                                            'saturday' => 6,
                                            'sunday' => 0,
                                        ];
                                    @endphp

                                    @foreach ($days as $day => $index)
                                        <tr>
                                            <td>
                                                <label for="{{ $day }}">{{ ucfirst($day) }}</label>
                                            </td>
                                            <td>
                                                <input class="form-control" type="time" id="{{ $day }}_start" name="{{ $day }}_start" value="{{ old($day.'_start', $businessHours[$index]->start_time ?? '09:00') }}">
                                            </td>
                                            <td width="50" class="text-center">
                                                To
                                            </td>
                                            <td>
                                                <input class="form-control" type="time" id="{{ $day }}_end" name="{{ $day }}_end" value="{{ old($day.'_end', $businessHours[$index]->end_time ?? '17:00') }}">
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                <div>
                                    <button class="btn btn-primary float-right" type="submit">Update</button>
                                </div>
                            </form>
                        @else
                            <form action="{{ route('user.business-hours.update') }}" method="post">
                                @csrf
                                <table width="60%">
                                    <tr>
                                        <td>
                                            <label for="monday">Monday</label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="time" id="monday" name="monday_start" value="09:00">
                                        </td>
                                        <td width="50" class="text-center">
                                            To
                                        </td>
                                        <td>
                                            <input class="form-control" type="time" id="monday" name="monday_end" value="17:00">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="tuesday">Tuesday</label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="time" id="tuesday" name="tuesday_start" value="09:00">
                                        </td>
                                        <td width="50" class="text-center">
                                            To
                                        </td>
                                        <td>
                                            <input class="form-control" type="time" id="tuesday" name="tuesday_end" value="17:00">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="wednesday">Wednesday</label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="time" id="wednesday" name="wednesday_start" value="09:00">
                                        </td>
                                        <td width="50" class="text-center">
                                            To
                                        </td>
                                        <td>
                                            <input class="form-control" type="time" id="wednesday" name="wednesday_end" value="17:00">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="thursday">Thursday</label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="time" id="thursday" name="thursday_start" value="09:00">
                                        </td>
                                        <td width="50" class="text-center">
                                            To
                                        </td>
                                        <td>
                                            <input class="form-control" type="time" id="thursday" name="thursday_end" value="17:00">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="friday">Friday</label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="time" id="friday" name="friday_start" value="09:00">
                                        </td>
                                        <td width="50" class="text-center">
                                            To
                                        </td>
                                        <td>
                                            <input class="form-control" type="time" id="friday" name="friday_end" value="17:00">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="saturday">Saturday</label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="time" id="saturday" name="saturday_start" value="09:00">
                                        </td>
                                        <td width="50" class="text-center">
                                            To
                                        </td>
                                        <td>
                                            <input class="form-control" type="time" id="saturday" name="saturday_end" value="17:00">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="sunday">Sunday</label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="time" id="sunday" name="sunday_start" value="09:00">
                                        </td>
                                        <td width="50" class="text-center">
                                            To
                                        </td>
                                        <td>
                                            <input class="form-control" type="time" id="sunday" name="sunday_end" value="17:00">
                                        </td>
                                    </tr>
                                </table>
                                <div>
                                    <button class="btn btn-primary float-right" type="submit">Update</button>
                                </div>
                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div></div>
@endsection
