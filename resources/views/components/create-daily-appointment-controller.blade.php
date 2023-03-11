@extends('layouts.dashboard')
@section('dashboard.content')
    <div class="page__create_appointment">
        <form action="{{route('dashboard.store')}}" method="POST">
            @csrf
            <div type="hidden" id="chose_data" data-date="{{$chose_date->toDateTimeString()}}"></div>
            <x-drop-down-selector
                id="select_service"
                label="{{__('service')}}"
                :options="$owner->company->services"
                name="service_id"
                error="{{$errors->first('service_id') ?? false}}"
            >
            </x-drop-down-selector>
            <x-drop-down-selector
                id="select_employee"
                label="{{__('employees')}}"
                placeholder="Employee..."
                name="employee_id"
                error="{{$errors->first('employee_id') ?? false}}"
            >
            </x-drop-down-selector>
            <div class="time_range">
                <p>{{__('hour')}} {{$chose_date->hour}}</p>
                <div class="minutes">
                    <label for="select_minutes">{{__("minutes")}}</label>
                    <select id="select_minutes" autocomplete="off" name="booked_date">
                        @foreach($minutes_range as $minute)
                            <option value="{{$chose_date->copy()->addMinutes($minute->format('i'))->toDateTimeString()}}">{{$minute->format('i')}}min</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <x-drop-down-selector
                id="select_clients"
                label="{{__('clients')}}"
                :options="$owner->company->clients"
                name="client[id]"
            >
            </x-drop-down-selector>
            <div id="create_client__form" class="create_client__form">
                <x-input
                    id="client_name"
                    name="client[name]"
                    placeholder="{{__('David Indeed')}}"
                    text="{{__('Client name')}}"
                ></x-input>
                <x-input
                    name="client[phone]"
                    placeholder="{{__('+48-222-222-222')}}"
                    text="{{__('Client phone')}}"
                ></x-input>
                <x-input
                    name="client[email]"
                    placeholder="{{__('davidIndeed@ukr.net')}}"
                    text="{{__('Client email')}}"

                ></x-input>
            </div>
            <button type="submit" class="btn">{{__('Create')}} </button>
        </form>
    </div>
@endsection

