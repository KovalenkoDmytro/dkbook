@extends('layouts.dashboard')
@section('dashboard.content')
    <H1>{{$employee->name}}</H1>
    <a class="btn icon icon_close" href="{{url()->previous()}}"></a>
    <form action="{{route('employeeScheduled.update',[$scheduled_id])}}" method="post">
        @method('PUT')
        @csrf
        <div class="scheduled_items">
            <x-date-time-picker
                :scheduled="$scheduled"
            />
        </div>
        <button class="btn" type="submit">{{__("Update scheduled")}}</button>
    </form>
@endsection
