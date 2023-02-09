@extends('layouts.dashboard')
@section('dashboard.content')
    <h1> {{__('Add new client')}}</h1>
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
                error="{{$errors->first('name')}}"
                value="{{ old('name') }}"
                placeholder="{{__('Steve Jobs')}}">
                <i class="fi fi-rr-user"></i>
            </x-input>
            <x-input
                for="client_email"
                text="{{__('Email')}}"
                id="client_email"
                name="email"
                error="{{$errors->first('email')}}"
                value="{{ old('email') }}"
                placeholder="{{__('SteveJobs@apple.com')}}">
                <i class="fi fi-rr-envelope"></i>
            </x-input>
            <x-input
                for="client_phone"
                text="{{__('Phone')}}"
                id="client_phone"
                name="phone"
                error="{{$errors->first('phone')}}"
                value="{{ old('phone') }}"
                placeholder="{{__('+48333-333-333')}}">
                <i class="fi fi-rr-users-alt"></i>
            </x-input>
            <button class="btn" type="submit">{{__('Add employee')}}</button>
        </form>
    </div>
@endsection
