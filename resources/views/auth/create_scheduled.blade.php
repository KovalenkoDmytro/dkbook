@extends('layouts.main')
@section('content')
<h1>Scheduled page __permanent</h1>


<form action="{{route('scheduled.store')}}" method="post">
    @csrf

    <p> Add schedule for {{$table}} with id {{$id}} __permanent</p>
    <div class="scheduled_items">
        <x-date-time-picker :id="$id" :table="$table" />
    </div>
    <button type="submit">Add __permanent</button>
</form>
@endsection
