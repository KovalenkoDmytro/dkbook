@php
    $services = Auth::user()->company->services;
    $minutes = array();
    $employees =Auth::user()->company->employees;


@endphp

{{--@dump($services)--}}
@dump($chose_date)
@extends('layouts.dashboard')
@section('dashboard.content')
    <div class="modal_window">
        @php($minutes = [5,10,15,20,25,30,35,40,45,50,55])
    </div>

    <form action="{{route('dashboard.createAppointment')}}" method="POST">

        <div class="services">
            <label for="select_service">{{__("service")}}</label>
            <select id="select_service" autocomplete="off">
                @foreach($services as $service)
                    <option value="{{$service->id}}"
                            data-hour="{{$service->timeRange_hour}}"
                            data-minutes="{{$service->timeRange_minutes}}"
                            data-price="{{$service->price}}">
                        {{$service->name}}
                    </option>
                @endforeach
            </select>
        </div>
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
        <x-input
            name="client_name"
            placeholder="{{__('Adam Leen')}}"
            text="{{__('Add new client')}}"
        ></x-input>
        <div class="employees">
            <label for="select_employee">{{__("employees")}}</label>
            <select id="select_employee" autocomplete="off">

            </select>
        </div>
    </form>


@endsection

