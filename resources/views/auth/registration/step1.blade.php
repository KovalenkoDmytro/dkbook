@extends('layouts.registration')

@section('registration.content')
    <form action="{{route('registration.createOwner')}}" method="post">
        @csrf
        <x-input
            for="fullName"
            text="{{__('Full Name')}}"
            id="fullName"
            name="fullName"
            error="{{$errors->first('fullName')}}"
            value="{{ old('fullName') }}"
            placeholder="{{__('Steve Jobs')}}"
        >
            <i class="fi fi-rr-user"></i>
        </x-input>

        <x-input
            for="login"
            text="{{__('Login')}}"
            id="login"
            name="login"
            error="{{$errors->first('login')}}"
            value="{{ old('login') }}"
            placeholder="{{__('Jobs')}}"
        >
            <i class="fi fi-rr-user"></i>
        </x-input>

        <x-input
            for="password"
            text="{{__('Password')}}"
            id="password"
            name="password"
            error="{{$errors->first('password')}}"
            value="{{ old('password') }}"
            placeholder="{{__('min 8 characters, 1 uppercase, 1 lowercase, 1 number, and 1 special character?')}}"
        >
            <i class="fi fi-rr-lock"></i>
        </x-input>

        <x-input
            for="confirmPassword"
            text="{{__('Confirm password')}}"
            id="confirmPassword"
            name="confirmPassword"
            error="{{$errors->first('confirmPassword')}}"
            value="{{ old('confirmPassword') }}">
            <i class="fi fi-rr-lock"></i>
        </x-input>

        <x-input
            for="email"
            text="{{__('Email')}}"
            type="email"
            id="email"
            name="email"
            error="{{$errors->first('email')}}"
            value="{{ old('email') }}"
            placeholder="{{__('SteveJobs@apple.com')}}"
        >
            <i class="fi fi-rr-envelope"></i>
        </x-input>

        <x-input
            for="phone"
            text="{{__('Phone')}}"
            id="phone"
            name="phone"
            error="{{$errors->first('phone')}}"
            value="{{ old('phone') }}"
            placeholder="{{__('+1(22)333-333-333')}}"
        >
            <i class="fi fi-rr-phone-call"></i>
        </x-input>

        <!-- get user timezone  start -->
        <input type="hidden" name="timezone" id="timezone">
        <!--  end -->

        <button class="btn" type="submit">{{__('Next step')}}</button>
    </form>

@endsection


