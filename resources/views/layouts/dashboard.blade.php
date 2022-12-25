@extends('layouts.main')

@section('content')


    <aside>
        <a href="{{route('dashboard.calendar')}}">{{__('Calendar')}}</a>
        <a href="{{route('employee.index')}}">{{__('Employees')}}</a>
        <a href="{{route('user.logout')}}">{{__('Logout')}}</a>
    </aside>
    <main class="container">
        <div class="page-dashboard">
            @yield('dashboard.content')
        </div>
    </main>


@endsection
