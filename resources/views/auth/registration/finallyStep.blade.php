@extends('layouts.registration')
@section('registration.content')
    <div class="finishStepBlock">
        <div class="title">{{__('Everything is ready!')}}</div>
        <p>{{__('Our system was created to improve your daily work. It will allow you to manage employee schedules, set work schedules, accept payments, track reports and check inventory.')}}</p>
        <a class="btn" href="{{route('dashboard.main')}}" title="main page"> {{__('Go to main page')}} </a>
    </div>
@endsection
