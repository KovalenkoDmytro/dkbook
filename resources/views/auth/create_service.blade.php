<?php
?>
@extends('layouts.main')
@section('content')
<h1>Create service page</h1>

<form action="{{route('services.store')}}" method="post">
    @csrf
    <p> Add service</p>
    <label for="service_name">Service name</label>
    <input id="service_name" type="text" name="name">

    <div class="service-timeRange">
        <p>Time range service</p>

        <div class="timeRange">
            <div class="timeRange_item">
                <span>Hour</span>
                <x-select-drop-down name="timeRange_hour" :customTimeRange="[00,01,02,03,04]"/>
            </div>

            <div class="timeRange_item">
                <span>minutes</span>
                <x-select-drop-down name="timeRange_minutes" :customTimeRange="[05,10,15,20,25,30,35,40,45,50,55]"/>
            </div>
        </div>
    </div>

    <label for="service_price">Service Price</label>
    <input id="service_price" type="text" name="price">

    <button type="submit">Add</button>
</form>
@endsection
