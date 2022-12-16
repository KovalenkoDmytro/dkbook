{{--@dump($owner)--}}
{{--@dump($chose_date)--}}
{{--@dump($available_employees)--}}
@extends('layouts.dashboard')
@section('dashboard.content')
    <div class="page__create_appointment">
        <div class="modal_window __create_appointment" id="create_appointment">
            @php($minutes = [5,10,15,20,25,30,35,40,45,50,55])
        </div>

        <form action="{{route('dashboard.store')}}" method="POST">
            <x-input type="hidden" id="chose_data" value="{{$chose_date->toDateTimeString()}}"></x-input>
            <x-drop-down-selector
                id="select_service"
                label="{{__('service')}}"
                :options="$owner->company->services"
            >
            </x-drop-down-selector>

            <x-drop-down-selector
                id="select_employee"
                label="{{__('employees')}}"
                placeholder="Employee..."
            >
            </x-drop-down-selector>


            <div class="time">
                <p>{{__('hour')}} {{$chose_date->hour}}</p>
                <div class="minutes">
                    <label for="select_minutes">{{__("minutes")}}</label>
                    <select id="select_minutes" autocomplete="off">
                        @foreach($minutes as $minute)
                            <option value="{{$minute}}">{{$minute}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <x-drop-down-selector
                id="select_clients"
                label="{{__('clients')}}"
                :options="$owner->company->clients"
            >
            </x-drop-down-selector>


            <div id="create_client__form" class="create_client__form">
                <x-input
                    id="client_name"
                    name="client[][name]"
                    placeholder="{{__('David Indeed')}}"
                    text="{{__('Client name')}}"
                ></x-input>
                <x-input
                    name="client[][phone]"
                    placeholder="{{__('+48-222-222-222')}}"
                    text="{{__('Client phone')}}"
                ></x-input>
                <x-input
                    name="client[][email]"
                    placeholder="{{__('davidIndeed@ukr.net')}}"
                    text="{{__('Client email')}}"
                ></x-input>
            </div>

        </form>
    </div>




@endsection

