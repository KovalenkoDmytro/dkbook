@extends('layouts.main')
@section('content')
<h1>Scheduled page</h1>


<form action="{{route('scheduled.store')}}" method="post">
    @csrf

    <p> Add schedule for {{$table}} with id {{$id}}</p>
    <div class="scheduled_items">
        <x-date-time-picker :id="$id" :table="$table" />
    </div>
    <button type="submit">Add</button>
</form>
@endsection
