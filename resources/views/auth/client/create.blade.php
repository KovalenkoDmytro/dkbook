@extends('layouts.dashboard')
@section('dashboard.content')
    <h1> {{__('Add new employee')}}</h1>
    @if (Session::has('error'))
        <div class="alert alert-error">
            <h2>{!! Session::get('error') !!}</h2>
        </div>
    @endif
    <div class="page-client __create">
        <form action="{{route('client.store')}}" method="post">
            @csrf
            <x-input
                for="client_name"
                text="{{__('Name')}}"
                id="client_name"
                name="name"
                error="{{$errors->first('name') ?? false}}"
                value="{{ old('name') }}"
                placeholder="{{__('Steve Jobs')}}">
            </x-input>
            <x-input
                for="client_email"
                text="{{__('Email')}}"
                id="client_email"
                name="email"
                error="{{$errors->first('email') ?? false}}"
                value="{{ old('email') }}"
                placeholder="{{__('SteveJobs@apple.com')}}">
            </x-input>
            <x-input
                for="client_phone"
                text="{{__('Phone')}}"
                id="client_phone"
                name="phone"
                error="{{$errors->first('phone') ?? false}}"
                value="{{ old('phone') }}"
                placeholder="{{__('+48333-333-333')}}">
            </x-input>
            <button class="btn" type="submit">{{__('Add employee')}}</button>
        </form>
    </div>
@endsection
