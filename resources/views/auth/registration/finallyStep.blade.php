@extends('layouts.registration')
@section('registration.content')
    <div class="finishStepBlock">
        <div class="title">{{__('Everything is ready!')}}</div>
        <p>{{__('Our system was created to improve your daily work. It will allow you to manage employee schedules, set work schedules, accept payments, track reports and check inventory.')}}</p>
        <div class="buttons_wrapper">
            <div class="btn">
                <a href="{{route('registration.step6')}}">{{__('Prev step')}}</a>
            </div>
            <a class="btn" href="{{route('dashboard.main')}}" title="main page"> {{__('Go to main page')}} </a>
        </div>
    </div>
@endsection
