<?php
?>
@extends('layouts.main')
@section('content')
<h1>Create service page</h1>

<form action="{{route('employee.store')}}" method="post">
    @csrf
    <p> Add employee</p>
    <label for="employee_name">
        <span>{{__('Employee name')}}</span>
        <input id="employee_name" type="text" name="name">
        @error('name')
            <x-field_error :error="$errors->first('name')"/>
        @enderror
    </label>


    <label for="employee_email">
        <span>{{__('Employee email')}}</span>
        <input id="employee_email" type="email" name="email">
        @error('email')
            <x-field_error :error="$errors->first('email')"/>
        @enderror
    </label>


    <label for="employee_position">
        <span>{{__('Employee position')}}</span>
        <input id="employee_position" type="text" name="position">
        @error('position')
            <x-field_error :error="$errors->first('position')"/>
        @enderror
    </label>


    <label for="employee_phone">
        <span>{{__('Employee phone')}}</span>
        <input id="employee_phone" type="text" name="phone">
        @error('phone')
            <x-field_error :error="$errors->first('phone')"/>
        @enderror
    </label>


    <button type="submit">Add</button>
</form>
@endsection
