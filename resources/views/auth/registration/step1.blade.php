@extends('layouts.registration')

@section('registration.content')
    <h2>REGISTRATION PAGE __permanent</h2>

{{--    @if ($errors->any())--}}

{{--        <div class="alert alert-danger">--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}

    <form action="{{route('company.createOwner')}}" method="post">
        @csrf
        <label for="fullName">
            <span>{{__('Full Name')}}</span>
            <input type="text" id="fullName" name="fullName">
            @error('fullName')
                <x-field_error :error="$errors->first('fullName')"/>
            @enderror
        </label>

        <label for="login">
            <span>{{__('Login')}}</span>
            <input type="text" id="login" name="login">
            @error('login')
                <x-field_error :error="$errors->first('login')"/>
            @enderror
        </label>

        <label for="password">
            <span>{{__('Password')}}</span>
            <input type="password" id="password" name="password">
            @error('password')
                <x-field_error :error="$errors->first('password')"/>
            @enderror
        </label>

        <label for="confirmPassword">
            <span>{{__('Confirm password')}}</span>
            <input type="password" id="confirmPassword" name="confirmPassword">
            @error('confirmPassword')
                <x-field_error :error="$errors->first('confirmPassword')"/>
            @enderror
        </label>

        <label for="email">
            <span>{{__('Email')}}</span>
            <input type="email" id="email" name="email">
            @error('email')
                 <x-field_error :error="$errors->first('email')"/>
            @enderror
        </label>

        <label for="phone">
            <span>{{__('Phone')}}</span>
            <input type="text" id="phone" name="phone">
            @error('phone')
                <x-field_error :error="$errors->first('phone')"/>
            @enderror
        </label>
        <input type="hidden" id="businessMode" name="businessMode" value="businessMode">

        <button type="submit"> SEND data __permanent</button>
    </form>

@endsection


