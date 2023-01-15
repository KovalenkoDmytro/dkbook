@extends('layouts.dashboard')
@section('dashboard.content')
    <h1> {{__('Add new employee')}}</h1>
    @if (Session::has('error'))
        <div class="alert alert-error">
            <h2>{!! Session::get('error') !!}</h2>
        </div>
    @endif
{{--    @dump($services)--}}
    <form action="{{route('employee.store')}}" method="post">
        @csrf
        <x-input
            for="employee_name"
            text="{{__('Name')}}"
            id="employee_name"
            name="name"
            error="{{$errors->first('name') ?? false}}"
            value="{{ old('name') }}"
            placeholder="{{__('SteveJobs@apple.com')}}">
        </x-input>
        <x-input
            for="employee_email"
            text="{{__('Email')}}"
            id="employee_email"
            name="email"
            error="{{$errors->first('email') ?? false}}"
            value="{{ old('email') }}"
            placeholder="{{__('SteveJobs@apple.com')}}">
        </x-input>
        <x-input
            for="employee_position"
            text="{{__('Position')}}"
            id="employee_position"
            name="position"
            error="{{$errors->first('position') ?? false}}"
            value="{{ old('position') }}"
            placeholder="{{__('CEO')}}">
        </x-input>
        <x-input
            for="employee_phone"
            text="{{__('Phone')}}"
            id="employee_phone"
            name="phone"
            error="{{$errors->first('phone') ?? false}}"
            value="{{ old('phone') }}"
            placeholder="{{__('+48333-333-333')}}">
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
