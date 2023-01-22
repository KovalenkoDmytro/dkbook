@extends('layouts.main')

@section('content')
    @dump($errors)
    <main class="container">
        <div class="page-password_reset">
            <form method="POST" action="{{ route('password.reset') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <x-input
                    text="{{ __('Email Address') }}"
                    id="email"
                    type="email"
                    name="email"
                    value="{{ $email ?? old('email') }}"
                    required
                    autocomplete="email"
                    autofocus
                    error="{{$errors->first('name')}}"
                >
                </x-input>

                <x-input
                    for="password"
                    text="{{__('Password')}}"
                    type="password"
                    id="password"
                    name="password"
                    error="{{$errors->first('password')}}"
                    value="{{ old('password') }}"
                    placeholder="{{__('min 8 characters, 1 uppercase, 1 lowercase, 1 number, and 1 special character?')}}"
                >
                </x-input>

                <x-input
                    for="password_confirmation"
                    text="{{__('Confirm password')}}"
                    type="password_confirmation"
                    id="password_confirmation"
                    name="password_confirmation"
                    error="{{$errors->first('password_confirmation')}}"
                    value="{{ old('password_confirmation') }}">
                </x-input>

                <button type="submit" class="btn">{{ __('Reset Password') }}</button>

            </form>
        </div>
    </main>
@endsection
