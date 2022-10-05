@extends('layouts.registration')

@section('registration.content')
    <form action="{{route('company.createOwner')}}" method="post">
        @csrf
        <x-input
            for="fullName"
            text="{{__('Full Name')}}"
            id="fullName"
            name="fullName"
            error="{{$errors->first('fullName') ?? false}}"
            value="{{ old('fullName') }}">
        </x-input>

        <x-input
            for="login"
            text="{{__('Login')}}"
            id="login"
            name="login"
            error="{{$errors->first('login') ?? false}}"
            value="{{ old('login') }}">
        </x-input>

        <x-input
            for="password"
            text="{{__('Password')}}"
            type="password"
            id="password"
            name="password"
            error="{{$errors->first('password') ?? true}}"
            value="{{ old('password') }}"
        >
        </x-input>

        <x-input
            for="confirmPassword"
            text="{{__('Confirm password')}}"
            type="confirmPassword"
            id="confirmPassword"
            name="confirmPassword"
            error="{{$errors->first('confirmPassword') ?? true}}"
            value="{{ old('confirmPassword') }}">
        </x-input>

        <x-input
            for="email"
            text="{{__('Email')}}"
            type="email"
            id="email"
            name="email"
            error="{{$errors->first('email') ?? true}}"
            value="{{ old('email') }}">
        </x-input>

        <x-input
            for="phone"
            text="{{__('Phone')}}"
            id="phone"
            name="phone"
            error="{{$errors->first('phone') ?? true}}"
            value="{{ old('phone') }}">
        </x-input>

        <button class="btn" type="submit">{{__('Next step')}}</button>
    </form>

@endsection


