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
            <div class="calendar_pagination">
                <a href="{{route('dashboard.daily_calendar',['day'=>$yesterday])}}" class="yesterday">{{$yesterday}}</a>
                <p class="today">today_ {{$today['formatted']}}</p>
                <p class="today">show_day {{$current_day}}</p>
                <a href="{{route('dashboard.daily_calendar',['day'=>$tomorrow])}}" class="tomorrow">{{$tomorrow}}</a>
            </div>
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

    </div>

@endsection



