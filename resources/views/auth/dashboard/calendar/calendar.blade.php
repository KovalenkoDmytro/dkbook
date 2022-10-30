
@extends('layouts.dashboard')

@section('dashboard.content')
<h1>WELCOME TO Calendar</h1>

{{--@dump($appointments)--}}
@foreach($appointments as $appointment)

    <p>{{$appointment['date']}}</p>
    <p>service - {{$appointment['service']->name}}</p>
    <p>client- {{$appointment['client']->name}}</p>
    <p>payed - {{$appointment['payed'] ? 'payed' : 'unpayed'}}</p>
    <br>
@endforeach

<div id='calendar'></div>
<script>

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth'
        });
        calendar.render();
    });

</script>

@endsection



