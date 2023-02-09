@extends('layouts.dashboard')
@section('dashboard.content')
    <h1> {{__('Add new employee')}}</h1>
    @if (Session::has('error'))
        <div class="alert alert-error">
            <h2>{!! Session::get('error') !!}</h2>
        </div>
    @endif
    <form action="{{route('employee.store')}}" method="post">
        @csrf
        <x-input
            for="employee_name"
            text="{{__('Name')}}"
            id="employee_name"
            name="name"
            error="{{$errors->first('name')}}"
            value="{{ old('name') }}"
            placeholder="{{__('SteveJobs@apple.com')}}">
            <i class="fi fi-rr-user"></i>
        </x-input>
        <x-input
            for="employee_email"
            text="{{__('Email')}}"
            id="employee_email"
            name="email"
            error="{{$errors->first('email')}}"
            value="{{ old('email') }}"
            placeholder="{{__('SteveJobs@apple.com')}}">
            <i class="fi fi-rr-envelope"></i>
        </x-input>
        <x-input
            for="employee_position"
            text="{{__('Position')}}"
            id="employee_position"
            name="position"
            error="{{$errors->first('position')}}"
            value="{{ old('position') }}"
            placeholder="{{__('CEO')}}">
            <i class="fi fi-rr-users-alt"></i>
        </x-input>
        <x-input
            for="employee_phone"
            text="{{__('Phone')}}"
            id="employee_phone"
            name="phone"
            error="{{$errors->first('phone')}}"
            value="{{ old('phone') }}"
            placeholder="{{__('+48333-333-333')}}">
            <i class="fi fi-rr-phone-call"></i>
        </x-input>

        <x-dropDownList
            name="services[]"
            label="{{__('Services')}}"
            multiple
        >
            <x-slot:options>
                @foreach($services as $service)
                    <option value="{{$service->id}}">{{$service->name}}</option>
                @endforeach
            </x-slot:options>

        </x-dropDownList>

        <button class="btn" type="submit">{{__('Add employee')}}</button>
    </form>
@endsection
