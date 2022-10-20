@extends('layouts.main')

@section('content')
    <h1>WELCOME PAGE__permanent</h1>
    <x-auth error="{{$errors->first('incorrect') ?? false}}"></x-auth>
@endsection




