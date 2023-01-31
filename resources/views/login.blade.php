@extends('layouts.guest')

@section('guest.content')
    @if(session('status'))
        <p>{{session()->get('status')}}</p>
    @endif

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
                <svg id="Capa_1" enable-background="new 0 0 512.001 512.001" height="50" viewBox="0 0 512.001 512.001"
                     width="50" xmlns="http://www.w3.org/2000/svg">
                    <g>
                        <path
                            d="m101.019 311.791-7.805 32.413-8.862-30.174c-.938-3.193-3.868-5.386-7.196-5.386s-6.258 2.193-7.196 5.386l-8.861 30.173-7.805-32.412c-.97-4.027-5.023-6.506-9.048-5.536-4.027.97-6.506 5.02-5.536 9.047l14.379 59.713c.796 3.302 3.711 5.658 7.106 5.742 3.405.084 6.425-2.125 7.382-5.384l9.579-32.616 9.58 32.616c.939 3.199 3.875 5.386 7.194 5.386.062 0 .125-.001.188-.002 3.396-.084 6.311-2.44 7.106-5.742l14.379-59.713c.97-4.027-1.509-8.078-5.536-9.047-4.03-.97-8.078 1.51-9.048 5.536z"/>
                        <path
                            d="m405.668 306.049c-3.409-.083-6.425 2.125-7.382 5.384l-9.579 32.616-9.579-32.616c-.957-3.26-4.03-5.468-7.382-5.384-3.396.084-6.311 2.439-7.106 5.742l-14.379 59.713c-.97 4.027 1.509 8.078 5.536 9.047.59.142 1.181.21 1.762.21 3.386 0 6.458-2.309 7.286-5.746l7.805-32.412 8.861 30.173c.938 3.193 3.868 5.386 7.196 5.386s6.258-2.193 7.196-5.386l8.862-30.174 7.805 32.413c.97 4.027 5.016 6.505 9.048 5.536 4.027-.97 6.506-5.021 5.536-9.047l-14.38-59.713c-.795-3.302-3.711-5.658-7.106-5.742z"/>
                        <path
                            d="m466.001 321.047c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5h-23.366c-4.143 0-7.5 3.358-7.5 7.5v59.713c0 4.142 3.357 7.5 7.5 7.5h23.366c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5h-15.866v-14.857h14.568c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5h-14.568v-14.856z"/>
                        <path
                            d="m156.313 321.047c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5h-23.366c-4.143 0-7.5 3.358-7.5 7.5v59.713c0 4.142 3.357 7.5 7.5 7.5h23.366c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5h-15.866v-14.857h14.568c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5h-14.568v-14.856z"/>
                        <path
                            d="m180.789 306.047c-4.143 0-7.5 3.358-7.5 7.5v59.713c0 4.142 3.357 7.5 7.5 7.5h23.528c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5h-16.028v-52.213c0-4.142-3.357-7.5-7.5-7.5z"/>
                        <path
                            d="m273.941 343.404c0 20.599 16.758 37.357 37.356 37.357s37.356-16.758 37.356-37.357c0-20.598-16.758-37.356-37.356-37.356s-37.356 16.757-37.356 37.356zm59.713 0c0 12.327-10.029 22.357-22.356 22.357s-22.356-10.029-22.356-22.357 10.029-22.356 22.356-22.356 22.356 10.028 22.356 22.356z"/>
                        <path
                            d="m248.092 380.76c7.388 0 14.547-2.176 20.703-6.291 3.443-2.302 4.369-6.96 2.067-10.403-2.303-3.444-6.96-4.369-10.403-2.067-3.681 2.461-7.958 3.761-12.367 3.761-12.327 0-22.355-10.029-22.355-22.357s10.028-22.356 22.355-22.356c4.41 0 8.686 1.3 12.364 3.76 3.446 2.303 8.104 1.377 10.403-2.066 2.303-3.443 1.378-8.101-2.065-10.404-6.155-4.115-13.313-6.29-20.702-6.29-20.598 0-37.355 16.758-37.355 37.356-.001 20.599 16.757 37.357 37.355 37.357z"/>
                        <path
                            d="m16.074 466.765h479.853c8.863 0 16.074-7.21 16.074-16.074v-89.788c0-4.142-3.357-7.5-7.5-7.5s-7.5 3.358-7.5 7.5v89.788c0 .592-.481 1.074-1.074 1.074h-242.001c-6.255-6.6-12.819-13.516-19.107-20.14-8.197-8.632-19.729-13.583-31.635-13.583h-77.373c-4.143 0-7.5 3.358-7.5 7.5s3.357 7.5 7.5 7.5h77.373c7.813 0 15.379 3.249 20.758 8.912 3.059 3.222 6.187 6.517 9.312 9.811h-217.18c-.593 0-1.074-.481-1.074-1.074v-17.649h75.811c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5h-75.811v-181.926c0-.592.481-1.074 1.074-1.074h242.001c6.256 6.6 12.819 13.517 19.109 20.14 8.197 8.633 19.728 13.583 31.635 13.583h188.183v57.138c0 4.142 3.357 7.5 7.5 7.5s7.5-3.358 7.5-7.5c0-9.046 0-80.111 0-89.788 0-.554-.028-1.101-.083-1.641-.825-8.095-7.681-14.433-15.99-14.433h-.001-89.632l-123.959-127.479c2.952-4.745 4.664-10.339 4.664-16.327 0-17.094-13.906-31-31-31s-31 13.906-31 31c0 5.988 1.711 11.581 4.664 16.326l-123.958 127.48h-89.633c-8.863.001-16.074 7.212-16.074 16.075v189.426 25.149c0 8.864 7.211 16.074 16.074 16.074zm479.853-231.723c.593 0 1.074.482 1.074 1.074v17.649h-188.183c-7.813 0-15.379-3.249-20.758-8.913-3.059-3.221-6.187-6.516-9.312-9.811h217.179zm-239.926-174.806c8.822 0 16 7.177 16 16s-7.178 16-16 16-16-7.177-16-16 7.178-16 16-16zm-15.582 42.782c4.582 2.676 9.904 4.217 15.582 4.217s11-1.541 15.582-4.217l113.79 117.024c-9.817 0-246.741 0-258.745 0z"/>
                    </g>
                </svg>
                <h1>{{__('Welcome back!')}}</h1>
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




