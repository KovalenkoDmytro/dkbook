@extends('layouts.guest')

@section('guest.content')
    @if(session('status'))
        <p>{{session()->get('status')}}</p>
    @endif

    @error('error_auth')
        @dump($errors->first('error_auth'))
    @enderror



        <div class="page-login">

                <h1>Login_permanent</h1>
                <form action="" method="post">
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


                    <label for="remember_me">
                        <input type="checkbox" id="remember_me" name="remember_me">
                        <p>{{__('Remember me')}}</p>
                    </label>


                    <a href="{{route('password.request')}}" title="Forget password">{{__('Forget password')}}</a>
                    <button class="btn" type="submit">{{__('Login')}}</button>
                    <p>{{__('No register yet?')}} <a class="btn" href="{{ URL::route('registration.step1')}}" title="Create an Account">{{__('Create an Account')}}</a></p>

                </form>


        </div>

@endsection




