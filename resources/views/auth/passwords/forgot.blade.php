@extends('layouts.main')

@section('content')
    <main class="container">
        <div class="page-password_forgot">
            @if(session('status'))
                <p>{{session()->get('status')}}</p>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <x-input
                    text="{{ __('Email Address') }}"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                    autofocus
                    error="{{$errors->first('email')}}"
                >
                </x-input>

                <button type="submit" class="btn">
                    {{ __('Send Password Reset Link') }}
                </button>

            </form>
        </div>
    </main>
@endsection
