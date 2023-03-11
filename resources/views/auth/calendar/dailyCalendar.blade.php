@php
    $present_day = $today->toArray();
@endphp
@extends('layouts.dashboard')
@section('dashboard.content')
    <div class="page-calendar">
        <div id="dailyCalendar" class="dailyCalendar">
            <p class="calendar_head">
                <span class="chose_day">{{$chose_day->toFormattedDateString()}}</span>
                <span>{{$chose_day->locale(App::currentLocale())->dayName}}</span>
            </p>
            <div class="calendar_pagination">
                <a class="btn today" href="{{route('dailyCalendar.index',['day'=>$today->toDateString()])}}">
                    <span>{{__('Today')}} ({{ $today->toFormattedDateString()}})</span>
                </a>
                <div class="pagination_items">
                    <a href="{{route('dailyCalendar.index',['day'=>$preview_day->toDateString()])}}"
                       class="btn pagination_item yesterday">
                        <i class="icon icon_left"></i>
                        <span>{{$preview_day->toFormattedDateString()}}</span>
                    </a>
                    <a href="{{route('dailyCalendar.index',['day'=>$next_day->toDateString()])}}"
                       class="btn pagination_item tomorrow">
                        <span>{{$next_day->toFormattedDateString()}}</span>
                        <i class="icon icon_right"></i>
                    </a>
                </div>
            </div>
            @if($times_start === 0)
                <h2>{{__('Day off')}}</h2>
            @else
            <div class="hour_items">
                @for($count = $times_start ; $count <= $times_end; $count++)
                    <div class="{{ $present_day['hour'] === $count ? 'hours_item currently' :'hours_item'}}">
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
                                            <div class="information_items">
                                                <div class="item">
                                                    <p class="key">{{__("Date")}}</p>
                                                    <p class="value">{{$appointment['date']}}</p>
                                                </div>
                                                <div class="item">
                                                    <p class="key">{{__("Service")}}</p>
                                                    <p class="value">{{$appointment->service->name}}</p>
                                                </div>
                                                <div class="item">
                                                    <p class="key">{{__("Client")}}</p>
                                                    <p class="value">{{$appointment->client->name}}</p>
                                                </div>
                                                <div class="item">
                                                    <p class="key">{{__("Employee")}}</p>
                                                    <p class="value">{{$appointment->employee->name ?? 'deleted'}}</p>
                                                </div>
                                                <div class="item">
                                                    <p class="key">{{__("Payment status")}}</p>
                                                    <p class="value">{{$appointment['payed'] ? 'payed' : 'unpayed'}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a class="btn addTask"
                           href="{{route('dashboard.index',['date'=>$chose_day->toFormattedDateString().' '.$count.':00'])}}"
                        >
                            <i id="addTask" class="icon icon_plus"></i>
                        </a>
                    </div>
                @endfor
            </div>

            @endif
        </div>
    </div>
@endsection



