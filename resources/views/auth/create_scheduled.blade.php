<?php
//todo create DROPDOWN selector anon.component
?>
@extends('layouts.main')
@section('content')
<h1>Create service page</h1>

<form action="" method="post">
    @csrf
    <p> Add schedule for {{$employee_name}} with id {{$employee_id}}</p>

    <div class="scheduled_items">
        <div class="scheduled_item">
            <label for="monday">Monday</label>
            <input id="monday" type="checkbox" name="monday"></input>

            <x-selectDropDown></x-selectDropDown>

        </div>
    </div>

    <button type="submit">Add</button>
</form>
@endsection
