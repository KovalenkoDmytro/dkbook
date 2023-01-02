@extends('layouts.dashboard')


@section('dashboard.content')
    @dump($client)
    <h1> {{__('Add new client')}}</h1>
    <div class="page-client __show">
        <form action="{{route('client.update',$client->id)}}" method="post">
            @csrf
            @method('PUT')
            <x-input
                for="client_name"
                text="{{__('Name')}}"
                id="client_name"
                name="name"
                error="{{$errors->first('name') ?? false}}"
                value="{{ $client->name }}"
                placeholder="{{__('Steve Jobs')}}">
            </x-input>
            <x-input
                for="client_email"
                text="{{__('Email')}}"
                id="client_email"
                name="email"
                error="{{$errors->first('email') ?? false}}"
                value="{{$client->email }}"
                placeholder="{{__('SteveJobs@apple.com')}}">
            </x-input>
            <x-input
                for="client_phone"
                text="{{__('Phone')}}"
                id="client_phone"
                name="phone"
                error="{{$errors->first('phone') ?? false}}"
                value="{{ $client->phone }}"
                placeholder="{{__('+48333-333-333')}}">
            </x-input>
            <button class="btn" type="submit">{{__('Add employee')}}</button>
        </form>
    </div>

@endsection

