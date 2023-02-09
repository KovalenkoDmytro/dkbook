@extends('layouts.dashboard')


@section('dashboard.content')
    <div class="page-client __show">
        <form action="{{route('client.update',$client->id)}}" method="post">
            @csrf
            @method('PUT')
            <x-input
                for="client_name"
                text="{{__('Name')}}"
                id="client_name"
                name="name"
                error="{{$errors->first('name')}}"
                value="{{ $client->name }}"
                placeholder="{{__('Steve Jobs')}}">
                <i class="fi fi-rr-user"></i>
            </x-input>
            <x-input
                for="client_email"
                text="{{__('Email')}}"
                id="client_email"
                name="email"
                error="{{$errors->first('email')}}"
                value="{{$client->email }}"
                placeholder="{{__('SteveJobs@apple.com')}}">
                <i class="fi fi-rr-envelope"></i>
            </x-input>
            <x-input
                for="client_phone"
                text="{{__('Phone')}}"
                id="client_phone"
                name="phone"
                error="{{$errors->first('phone')}}"
                value="{{ $client->phone }}"
                placeholder="{{__('+48333-333-333')}}">
                <i class="fi fi-rr-users-alt"></i>
            </x-input>
            <button class="btn" type="submit">{{__('Update')}}</button>
        </form>
    </div>

@endsection

