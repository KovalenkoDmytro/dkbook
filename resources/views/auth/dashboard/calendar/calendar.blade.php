@extends('layouts.dashboard')

@section('dashboard.content')
    <div class="page-calendar">
        <h1>WELCOME TO Calendar</h1>

        <p>{{$today}}</p>
        <a href="{{route('dashboard.daily_calendar',['day'=>$today])}}" class="today">TODAY {{$today}}</a>


        <div id='calendar'></div>


    </div>

    <script>

        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth'
            });
            calendar.render();
        });

    </script>

@endsection



