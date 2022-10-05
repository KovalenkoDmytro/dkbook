@extends('layouts.main')
@section('content')
    <h1>Scheduled page __permanent</h1>

    @if($table === 'employees')
        <form action="{{route('scheduled.employee.store', [$id])}}" method="post">
    @elseif($table === 'companies')
        <form action="{{route('scheduled.company.store',[$id]) }}" method="post">
    @endif
            @csrf
            <div class="scheduled_items">
                <x-date-time-picker :id="$id" :table="$table"/>
            </div>
            <button class="btn" type="submit">{{__("Add scheduled")}}</button>
        </form>
@endsection
