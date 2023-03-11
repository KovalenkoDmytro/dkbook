
@extends('layouts.dashboard')

@section('dashboard.content')
    <h1>{{__("WELCOME TO Dashboard")}}</h1>

    <div class="statist_items">
        <div class="statist_item">
            <i class="fi fi-rr-calendar"></i>
            <span class="number">{{count($appointments_all)}}</span>
            <span>{{__('Appointments')}}</span>
        </div>
        <div class="statist_item">
            <i class="fi fi-rr-chart-histogram"></i>
            <span class="number">{{count($appointments_today)}}</span>
            <span>{{__('Today Appointments')}}</span>
        </div>
    </div>
@endsection




