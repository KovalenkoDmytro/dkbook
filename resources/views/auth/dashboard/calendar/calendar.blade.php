@extends('layouts.dashboard')

@section('dashboard.content')
    <div class="page-calendar">
        <h1>WELCOME TO Calendar</h1>

{{--        @dump($appointments)--}}
{{--        @foreach($appointments as $appointment)--}}
{{--            @php--}}
{{--                $date  = strtotime($appointment['date']);--}}
{{--                $hour = (int) date('H', $date);--}}
{{--                    dump( $hour);--}}
{{--            @endphp--}}

{{--            <p>{{$appointment['date']}}</p>--}}
{{--            <p>service - {{$appointment['service']->name}}</p>--}}
{{--            <p>client- {{$appointment['client']->name}}</p>--}}
{{--            <p>payed - {{$appointment['payed'] ? 'payed' : 'unpayed'}}</p>--}}
{{--            <br>--}}
{{--        @endforeach--}}

        <div id="dailyCalendar" class="dailyCalendar">
            <div class="hour_items">
                @for($count = 0 ; $count < 24; $count++)
                    <div class="{{ $today['hour'] === $count ? 'hours_item currently' :'hours_item'}}">
                        <div class="title">{{$count < 10? '0'.$count : $count}}:00</div>
                        <div class="appointments">
                            @foreach($appointments as $appointment)
                                @php
                                    $date  = strtotime($appointment['date']);
                                    $hour = (int) date('H', $date);
                                @endphp
                                @if($count === $hour)
                                    <div class="appointment_item">
                                        <div id="appointment_toggle" class="appointment_toggle"></div>
                                        <div class="appointment_information">
                                            <i class="icon icon_close"></i>
                                            <p>{{$appointment['date']}}</p>
                                            <p>service - {{$appointment['service']->name}}</p>
                                            <p>client- {{$appointment['client']->name}}</p>
                                            <p>payed - {{$appointment['payed'] ? 'payed' : 'unpayed'}}</p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endfor
            </div>
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



