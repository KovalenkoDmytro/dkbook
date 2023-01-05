@extends('layouts.dashboard')

@section('dashboard.content')

    @if (Session::has('error'))
        <div class="alert alert-error">
            <h2>{!! Session::get('error') !!}</h2>
        </div>
    @endif
{{--    @dump($employee_scheduled)--}}
    <div class="page-employee __show">
        <form action="{{route('employee.update',[$employee ->id])}}" method="post">
            @method('PUT')
            @csrf
            <a class="btn" href="{{url()->previous()}}">{{__('Preview page')}}</a>
            <input type="hidden" name="id" value="{{$employee ->id}}">
            <x-input
                for="employee_name"
                text="{{__('Name')}}"
                id="employee_name"
                name="name"
                error="{{$errors->first('name') ?? false}}"
                value="{{$employee->name }}"
                placeholder="{{__('SteveJobs@apple.com')}}">
            </x-input>
            <x-input
                for="employee_email"
                text="{{__('Email')}}"
                id="employee_email"
                name="email"
                error="{{$errors->first('email') ?? false}}"
                value="{{ $employee -> email }}"
                placeholder="{{__('SteveJobs@apple.com')}}">
            </x-input>
            <x-input
                for="employee_position"
                text="{{__('Position')}}"
                id="employee_position"
                name="position"
                error="{{$errors->first('position') ?? false}}"
                value="{{ $employee ->position }}"
                placeholder="{{__('CEO')}}">
            </x-input>
            <x-input
                for="employee_phone"
                text="{{__('Phone')}}"
                id="employee_phone"
                name="phone"
                error="{{$errors->first('phone') ?? false}}"
                value="{{ $employee -> phone }}"
                placeholder="{{__('+1(22)333-333-333')}}">
            </x-input>
            <button class="btn" type="submit">{{__('Update')}}</button>
        </form>

        <form action="{{route('employee.destroy',[$employee ->id])}}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn">{{__('Destroy')}}</button>
        </form>
    </div>
@endsection
