
@extends('layouts.dashboard')

@section('dashboard.content')
    <h1>WELCOME TO Dashboard _permanent</h1>

    <div>
        <span>{{$appointments_all}}</span>
        <span>{{__('Appointments')}}</span>
    </div>
    <div>
        <span>{{$appointments_today}}</span>
        <span>{{__('Today Appointments')}}</span>
    </div>



@endsection




