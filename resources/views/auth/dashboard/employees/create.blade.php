@extends('layouts.dashboard')
@section('dashboard.content')
    <h1> {{__('Add new employee')}}</h1>

    <x-add_employee/>
@endsection
