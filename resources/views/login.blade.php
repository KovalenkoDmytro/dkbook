@extends('layouts.main')

@section('content')
    <main class="container">
        <div class="page-login">
            <x-auth error="{{$errors->first('incorrect') ?? false}}"></x-auth>
        </div>
    </main>
@endsection




