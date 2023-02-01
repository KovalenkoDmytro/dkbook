@extends('layouts.guest')

@section('guest.content')


    <div class="top">
        <div class="logo">
            <img src="" alt="Logo">
        </div>
        <div class="content">
            <p>{{__('No register yet?')}} </p>
            <a class="btn" href="{{ URL::route('registration.step1')}}"
               title="Create an Account">{{__('Create an Account')}}</a>
        </div>

    </div>

    <div class="content">
        <div class="window">
            <div class="window__header">
                <x-icon-hi/>
                <h1>{{__('Welcome!')}}</h1>
            </div>

            <div class="window__content">
                @error('error_auth')
                <div class="notification __error">
                    <i class="fi fi-rr-exclamation"></i>
                    <span>
                        {{$errors->first('error_auth')}}
                    </span>
                </div>
                @enderror
                @if(session('success'))
                    <div class="notification __success">
                        <i class="fi fi-br-check"></i>
                        <span>{{session()->get('success')}}</span>
                    </div>
                @endif

                <form class="credential_window" action="" method="post">
                    @csrf
                    <x-input
                        for="email"
                        text="{{__('Email')}}"
                        id="email"
                        name="email"
                        error="{{$errors->first('incorrect') ?? false}}"
                        value="{{ old('email') }}"
                        placeholder="{{__('StevJobs@apple.com')}}"
                    >
                        <i class="fi fi-rr-envelope"></i>
                    </x-input>

                    <x-input
                        for="password"
                        text="{{__('Password')}}"
                        id="password"
                        name="password"
                        error="{{$errors->first('incorrect') ?? false}}"
                        value="{{ old('password') }}"
                        placeholder="{{__('Min. 8 characters')}}"
                    >
                        <i class="fi fi-rr-lock"></i>
                    </x-input>


                    <div class="forget_password">
                        <x-input
                            type="checkbox"
                            id="remember_me"
                            name="remember_me"
                            label="{{__('Remember me')}}"
                        ></x-input>
                        <a href="{{route('password.request')}}" title="Forget password">{{__('Forget password')}}</a>
                    </div>

                    <button class="btn" type="submit">{{__('Login')}}</button>
                </form>
            </div>

        </div>
    </div>

@endsection




