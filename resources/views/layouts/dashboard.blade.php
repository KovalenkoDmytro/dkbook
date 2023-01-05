@extends('layouts.main')

@section('content')

    <aside>
        <a href="{{route('monthlyCalendar.index')}}" title="monthlyCalendar">{{__('Monthly Calendar')}}</a>
        <a href="{{route('dailyCalendar.index')}}" title="dailyCalendar">{{__('Daily Calendar')}}</a>
        <a href="{{route('employee.index')}}" title="employees">{{__('Employees')}}</a>
        <a href="{{route('client.index')}}" title="clients">{{__('Clients')}}</a>
        <a href="{{route('user.logout')}}" title="logout">{{__('Logout')}}</a>
    </aside>

    <main class="container">
        <div class="page-dashboard">
            @yield('dashboard.content')
        </div>
    </main>

@endsection
