@extends('layouts.dashboard')

@section('dashboard.content')
    <div class="page-calendar">
        <h1>WELCOME TO Calendar</h1>



        <div class="monthlyCalendar">
            <div class="calendar_head">
                <div class="choseMonth">
                    <p class="month">{{$choseMonth->locale(config('global.user.location'))->monthName}}</p>
                    <p class="year">{{$choseMonth->year}}</p>
                </div>
                <div class="pagination">
                    <a href="{{route('dashboard.calendar',['month'=>$prevMonth->toDateString()])}}" class="prevMonth">
                        <i class="icon icon_left"></i>
                    </a>
                    <a href="{{route('dashboard.calendar',['month'=>$today->toDateString()])}}" class="prevMonth">{{__('Today')}}</a>
                    <a href="{{route('dashboard.calendar',['month'=>$nextMonth->toDateString()])}}" class="nextMonth">
                        <i class="icon icon_right"></i>
                    </a>
                </div>
            </div>

             {!! $calendar !!}
        </div>


    </div>

@endsection



