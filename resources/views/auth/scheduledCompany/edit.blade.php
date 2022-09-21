@extends('layouts.main')
@section('content')
<H1>Edit scheduled</H1>
<form action="{{route('scheduled.company.update',['id'=>$id])}}" method="post">
    @csrf
    <input type="hidden" name="id_table" value="{{$id}}"/>
    <p> Add schedule for {{$table ?? ''}} with id {{$id}}</p>
    <div class="scheduled_items">
        <x-date-time-picker :update_scheduled="$scheduled"/>
    </div>
</form>
@endsection
