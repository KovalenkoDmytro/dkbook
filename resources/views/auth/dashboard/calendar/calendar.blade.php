@extends('layouts.dashboard')

@section('dashboard.content')
    <div class="page-calendar">
        <h1>WELCOME TO Calendar</h1>

        <p>{{$today->toDateString()}}</p>
        <a href="{{route('dashboard.daily_calendar',['day'=>$today->toDateString()])}}" class="today">TODAY {{$today->toDateString()}}</a>

        <div class="monthlyCalendar">
{{--            <div class="days">--}}

{{--                <div class="days_name">--}}
{{--                    <p class="day_name" data-name="Monday">{{__('Monday')}} </p>--}}
{{--                    <p class="day_name" data-name="Tuesday">{{__('Tuesday')}} </p>--}}
{{--                    <p class="day_name" data-name="Wednesday">{{__('Wednesday')}} </p>--}}
{{--                    <p class="day_name" data-name="Thursday">{{__('Thursday')}} </p>--}}
{{--                    <p class="day_name" data-name="Friday">{{__('Friday')}} </p>--}}
{{--                    <p class="day_name" data-name="Saturday">{{__('Saturday')}} </p>--}}
{{--                    <p class="day_name" data-name="Sunday">{{__('Sunday')}} </p>--}}
{{--                </div>--}}

{{--                @foreach ($monthlyDates as $date)--}}
{{--                    <a class="day"--}}
{{--                       href="{{route('dashboard.daily_calendar',['day'=>$date->toDateString()])}}"> {{$date->toDateString()}}</a>--}}
{{--                @endforeach--}}
{{--            </div>--}}
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



