@extends('layouts.registration')

@section('registration.content')
    <h2>REGISTRATION PAGE</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('company.createOwner')}}" method="post">
        @csrf
        <label for="fullName">
            <span>Full Name</span>
            <input type="text" id="fullName" name="fullName">
        </label>

        <label for="login">
            <span>Login</span>
            <input type="text" id="login" name="login">
        </label>

        <label for="password">
            <span>Password</span>
            <input type="password" id="password" name="password">
        </label>

        <label for="confirm_password">
            <span>Confirm password</span>
            <input type="password" id="confirm_password" name="confirm_password">
        </label>

        <label for="email">
            <span>Email</span>
            <input type="email" id="email" name="email">
        </label>

        <label for="phone">
            <span>Phone</span>
            <input type="text" id="phone" name="phone">
        </label>
        <input type="hidden" id="businessMode" name="businessMode" value="businessMode">

        <button type="submit"> SEND data</button>
    </form>

@endsection


