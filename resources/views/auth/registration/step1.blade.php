@extends('layouts.registration')

@section('registration.content')

    @auth()
        <form action="{{route('companyOwner.update')}}" method="post">.
            @csrf
            @method('PUT')

            @endauth

            @guest()
                <form action="{{route('companyOwner.store')}}" method="post">
                    @csrf
                    @endguest

                    <x-input
                        for="fullName"
                        text="{{__('Full Name')}}"
                        id="fullName"
                        name="fullName"
                        error="{{$errors->first('fullName')}}"
                        value="{{ Auth::check() ? Auth::user()->fullName :old('fullName') }}"
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
                        value="{{Auth::check() ? Auth::user()->login : old('login') }}"
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
                        value="{{ Auth::check() ? Auth::user()->email : old('email') }}"
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
                        value="{{ Auth::check() ? Auth::user()->phone : old('phone') }}"
                        placeholder="{{__('+1(22)333-333-333')}}"
                    >
                        <i class="fi fi-rr-phone-call"></i>
                    </x-input>

                    <!-- get user timezone  start -->
                    <input type="hidden" name="timezone" id="timezone">
                    <!--  end -->

                    @if(Auth::check())
                        <a class="btn" href="{{route('registration.step2')}}">{{__('Next step')}}</a>
                        <button class="btn" type="submit">{{__('Update')}}</button>
                    @else
                        <button class="btn" type="submit">{{__('Create')}}</button>
                    @endif
                </form>

        @endsection


