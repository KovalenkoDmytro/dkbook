@extends('layouts.dashboard')
@section('dashboard.content')
    <div class="page-calendar">
        <h1>{{$choseMonth->locale(config('global.user.location'))->monthName}} {{$choseMonth->year}}</h1>

        <div class="monthlyCalendar">
            <div class="calendar_head">
                <div class="pagination">
                    <a href="{{route('monthlyCalendar.index',['month'=>$prevMonth->toDateString()])}}"
                       class="btn prevMonth">
                        <i class="icon icon_left"></i>
                    </a>
                    <a href="{{route('monthlyCalendar.index',['month'=>$today->toDateString()])}}"
                       class="btn currentMonth">{{__('Today')}}</a>
                    <a href="{{route('monthlyCalendar.index',['month'=>$nextMonth->toDateString()])}}"
                       class="btn nextMonth">
                        <i class="icon icon_right"></i>
                    </a>
                </div>
            </div>

            @php
                $first_week = array_map(function ($day) {
                return $day['day']->dayOfWeekIso;
                }, $weeks[1]);
            @endphp

            <div class="calendar">
                <div class="days">
                    <p class="day">{{__("Mon")}}</p>
                    <p class="day">{{__("Tue")}}</p>
                    <p class="day">{{__("Wed")}}</p>
                    <p class="day">{{__("Thu")}}</p>
                    <p class="day">{{__("Fri")}}</p>
                    <p class="day">{{__("Sat")}}</p>
                    <p class="day">{{__("Sun")}}</p>
                </div>
                @foreach($weeks as  $week )
                    @if($loop->first)
                        <div class="week">
                            @for($day = 1; $day <= 7; $day++)
                                @php($day_index = array_search($day, $first_week))
                                @if ($day_index || $day_index === 0)
                                    <a class='day {{($today->day === $week[$day_index]['day']->day) && ($today->month === $choseMonth->month) && ($today->year === $choseMonth->year)? 'today' :''}}
                                {{$day == 6 || $day==7 ? 'weekend' :''}}'
                                       href='/calendar/day?day={{$week[$day_index]['day']->format("Y-m-d")}}'
                                    >
                                        <span class='date'>{{$week[$day_index]['day']->day}}</span>

                                        @if(count($week[$day_index]['appointments']) >0)
                                            <div class='appointments'>
                                                {{__('Booked')}} ({{count($week[$day_index]['appointments'])}})
                                            </div>
                                        @endif

                                    </a>
                                @else
                                    <p class='day _anotherMonth
{{--                                {{$day === 6 || $day === 7 ? 'weekend' :''}}--}}
                                '></p>
                                @endif
                            @endfor
                        </div>
                    @else
                        <div class="week">
                            @for($day = 1; $day <= 7; $day++)
                                @if (isset($week[$day-1]))

                                    <a class='day {{($today->day === $week[$day-1]['day']->day) && ($today->month === $choseMonth->month) && ($today->year === $choseMonth->year)? 'today' :''}}
                            {{$day == 6 || $day==7 ? 'weekend' :''}}'
                                       href='/calendar/day?day={{$week[$day-1]['day']->format("Y-m-d")}}'
                                    >
                                        <span class='date'>{{$week[$day-1]['day']->day}}</span>

                                        @if(count($week[$day-1]['appointments']) >0)
                                            <div class='appointments'>
                                                {{__('Booked')}} ({{count($week[$day-1]['appointments'])}})
                                            </div>
                                        @endif

                                    </a>
                                @else
                                    <p class='day _anotherMonth
{{--                                {{$day === 6 || $day === 7 ? 'weekend' :''}}--}}
                                '></p>
                                @endif
                            @endfor
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection



