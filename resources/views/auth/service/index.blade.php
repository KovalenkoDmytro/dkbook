@extends('layouts.dashboard')
@section('dashboard.content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            <h2>{!! Session::get('success') !!}</h2>
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-error">
            <h2>{!! Session::get('error') !!}</h2>
        </div>
    @endif
    <div class="page-service __index">
        <h1>{{__('Services pages')}}</h1>
        @foreach($services as $service)
            <a class="service__item" href="{{route('services.edit',[$service->id])}}" title="{{$service->name}}">
                <span class="name">{{$service->name}}</span>
                <span class="timeRange">{{$service->timeRange_hour}} : {{$service->timeRange_minutes}}</span>
                <span class="price">{{$service->price}}</span>
            </a>
        @endforeach

        <a href="{{route('services.create')}}" class="btn" title="create">{{_('Create')}}</a>
    </div>
@endsection

