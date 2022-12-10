@php
    $present_day = $today->toArray();
@endphp
@extends('layouts.dashboard')

{{--@dump($appointments)--}}
@section('dashboard.content')
    <div class="page-calendar">
        <div id="dailyCalendar" class="dailyCalendar">
            <p class="calendar_head">
                <span class="chose_day">{{$chose_day->toFormattedDateString()}}</span>
                <span>{{__('chose_day')}}</span>
            </p>
            <div class="calendar_pagination">
                <a class="today" href="{{route('dashboard.daily_calendar',['day'=>$today->toDateString()])}}">
                    <span>{{__('today')}} </span>
                    <span>{{ $today->toFormattedDateString()}}</span>
                </a>
                <div class="pagination_items">
                    <a href="{{route('dashboard.daily_calendar',['day'=>$preview_day->toDateString()])}}"
                       class="pagination_item yesterday">
                        <i class="icon icon_left"></i>
                        <span>{{$preview_day->toFormattedDateString()}}</span>
                    </a>
                    <a href="{{route('dashboard.daily_calendar',['day'=>$next_day->toDateString()])}}"
                       class="pagination_item tomorrow">
                        <span>{{$next_day->toFormattedDateString()}}</span>
                        <i class="icon icon_right"></i>
                    </a>
                </div>
            </div>
            <div class="hour_items">
                @for($count = 0 ; $count < 24; $count++)
                    <div class="{{ $present_day['hour'] === $count ? 'hours_item currently' :'hours_item'}}">
{{--                        @php--}}
{{--                            $day_hour = :00--}}
{{--                        @endphp--}}
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
                                            <p>service - {{$appointment->service->name}}</p>
                                            <p>client- {{$appointment->client->name}}</p>
                                            <p>employee- {{$appointment->employee->name}}</p>
                                            <p>payed - {{$appointment['payed'] ? 'payed' : 'unpayed'}}</p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a class="addTask"
                           href="{{route('dashboard.createDailyAppointment',['date'=>$chose_day->toFormattedDateString().' '.$count.':00'])}}"
                        >
                            <i id="addTask" class="icon icon_plus"></i>
                        </a>
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endsection



