@extends('layouts.main')
@section('content')
<h1>Scheduled page</h1>

<form action="" method="post">
    @csrf
    <p> Add schedule for {{$name}} with id {{$id}}</p>
    <div class="scheduled_items">
        <x-date-time-picker />
    </div>
    <button type="submit">Add</button>
</form>
@endsection
