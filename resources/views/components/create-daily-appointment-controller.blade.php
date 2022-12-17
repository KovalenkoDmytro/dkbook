@extends('layouts.dashboard')
@section('dashboard.content')




    <div class="page__create_appointment">
        <form action="{{route('dashboard.store')}}" method="POST">
            @csrf
            <x-input type="hidden" id="chose_data" value="{{$chose_date->toDateTimeString()}}"></x-input>
            <x-drop-down-selector
                id="select_service"
                label="{{__('service')}}"
                :options="$owner->company->services"
                name="service"
            >
            </x-drop-down-selector>
            <x-drop-down-selector
                id="select_employee"
                label="{{__('employees')}}"
                placeholder="Employee..."
                name="employee"
            >
            </x-drop-down-selector>
            <div class="time_range">
                <p>{{__('hour')}} {{$chose_date->hour}}</p>
                <div class="minutes">
                    <label for="select_minutes">{{__("minutes")}}</label>
                    <select id="select_minutes" autocomplete="off" name="minutes">
                        @foreach($minutes_range as $minute)
                            <option value="{{$minute->format('i')}}">{{$minute->format('i')}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <x-drop-down-selector
                id="select_clients"
                label="{{__('clients')}}"
                :options="$owner->company->clients"
                name="client"
            >
            </x-drop-down-selector>
            <div id="create_client__form" class="create_client__form">
                <x-input
                    id="client_name"
                    name="client_name"
                    placeholder="{{__('David Indeed')}}"
                    text="{{__('Client name')}}"
                ></x-input>
                <x-input
                    name="client_phone"
                    placeholder="{{__('+48-222-222-222')}}"
                    text="{{__('Client phone')}}"
                ></x-input>
                <x-input
                    name="client_email"
                    placeholder="{{__('davidIndeed@ukr.net')}}"
                    text="{{__('Client email')}}"
                ></x-input>
            </div>
            <button type="submit" class="btn">{{__('Create')}} </button>
        </form>
    </div>
@endsection

