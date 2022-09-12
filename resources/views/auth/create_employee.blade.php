<?php
?>
@extends('layouts.main')
@section('content')
<h1>Create service page</h1>

<form action="{{route('employee.store')}}" method="post">
    @csrf
    <p> Add employee</p>
    <label for="employee_name">Employee name</label>
    <input id="employee_name" type="text" name="name">

    <label for="employee_email">Employee email</label>
    <input id="employee_email" type="email" name="email">

    <label for="employee_position">Employee position</label>
    <input id="employee_position" type="text" name="position">

    <label for="employee_phone">Employee phone</label>
    <input id="employee_phone" type="text" name="phone">

    <button type="submit">Add</button>
</form>
@endsection
