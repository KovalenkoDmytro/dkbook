@extends('layouts.guest')

@section('guest.content')
    <div class="content">
        <div class="window">
            <div class="window__header">
                <x-icon-enter/>
                <h1>{{__('Welcome back!')}}</h1>
            </div>
            <div class="window__content">

                @if(session()->has('success') )
                    <div class="notification __success">
                        <i class="fi fi-br-check"></i>
                        <span>{{session()->get('success')}}</span>
                    </div>
                @elseif (session()->has('error'))
                    <div class="notification __error">
                        <i class="fi fi-rr-exclamation"></i>
                        <span>{{session()->get('error')}}</span>
                    </div>
                @endif

            <form method="POST" action="{{ route('password.reset') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <x-input
                    text="{{ __('Email address') }}"
                    id="email"
                    type="email"
                    name="email"
                    value="{{ $email ?? old('email') }}"
                    required
                    autocomplete="email"
                    autofocus
                    error="{{$errors->first('name')}}"
                >
                    <i class="fi fi-rr-envelope"></i>
                </x-input>

                <x-input
                    for="password"
                    text="{{__('Password')}}"
                    type="text"
                    id="password"
                    name="password"
                    error="{{$errors->first('password')}}"
                    value="{{ old('password') }}"
                    placeholder="{{__('min 8 characters, 1 uppercase, 1 lowercase, 1 number, and 1 special character?')}}"
                >
                    <i class="fi fi-rr-lock"></i>
                </x-input>

                <x-input
                    for="password_confirmation"
                    text="{{__('Confirm password')}}"
                    type="password_confirmation"
                    id="password_confirmation"
                    name="password_confirmation"
                    error="{{$errors->first('password_confirmation')}}"
                    value="{{ old('password_confirmation') }}">
                    <i class="fi fi-rr-lock"></i>
                </x-input>

                <button type="submit" class="btn">{{ __('Reset Password') }}</button>

            </form>
            </div>
        </div>
    </div>
@endsection
