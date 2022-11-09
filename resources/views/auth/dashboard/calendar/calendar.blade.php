@extends('layouts.dashboard')

@section('dashboard.content')
    <div class="page-calendar">
        <h1>WELCOME TO Calendar</h1>

        <p>{{$today->toDateString()}}</p>
        <a href="{{route('dashboard.daily_calendar',['day'=>$today->toDateString()])}}" class="today">TODAY {{$today->toDateString()}}</a>

        <div class="monthlyCalendar">
             {!! $calendar !!}
        </div>


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



