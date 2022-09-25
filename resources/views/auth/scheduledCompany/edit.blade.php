@extends('layouts.main')
@section('content')
<H1>{{__('Edit scheduled')}}</H1>
<form action="{{route('scheduled.company.update',['id'=>$id])}}" method="post">
    @method('PUT')
    @csrf
    <input type="hidden" name="scheduled_id" value="{{$id}}"/>
    <p> Add schedule for with id {{$id}}</p>
    <div class="scheduled_items">
        <x-date-time-picker :update_scheduled="$scheduled"/>
    </div>
</form>
@endsection
