@extends('layouts.guest')

@section('guest.content')
    <div class="content">
        <div class="window">
            <div class="window__header">
                <x-icon-key/>
                <h1>{{__('Forgot your password?')}}</h1>
            </div>
            <div class="window__content">

                @if(session()->has('success') )
                    <div class="notification __success">
                        <p>{{session()->get('success')}}</p>
                    </div>
                @elseif (session()->has('error'))
                    <div class="notification __error">
                        <p>{{session()->get('error')}}</p>
                    </div>
                @endif

                <form class="credential_window" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <x-input
                        text="{{ __('Email') }}"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        autofocus
                        placeholder="{{__('StevJobs@apple.com')}}"
                        error="{{$errors->first('email')}}"
                    >
                        <i class="fi fi-rr-envelope"></i>
                    </x-input>

                    <button type="submit" class="btn">
                        {{ __('Send reset link') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
