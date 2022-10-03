@extends('layouts.main')
@section('content')

<H1>{{__("Edit scheduled")}}</H1>

<form action="{{route('scheduled.employee.update')}}" method="post">
    @method('PUT')
    @csrf
    <input type="hidden" name="schedule_id" value="{{$employee['employee_schedule_id']}}"/>
    <p> Add schedule for {{$employee['name']}} with id {{$employee['id']}} ___permanent</p>

    <div class="scheduled_items">
        <x-date-time-picker :update_scheduled="$scheduled"/>
    </div>
    <button type="submit">Update ___permanent</button>
</form>
@endsection
