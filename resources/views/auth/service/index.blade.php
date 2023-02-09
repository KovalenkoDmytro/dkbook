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
        <div class="services__table">
            <div class="services__head">
                <p class="name">{{__('Name')}}</p>
                <p class="time">{{__('Time')}}</p>
                <p class="price">{{__('Price')}}</p>
            </div>
            <div class="services__items">
                @foreach($services as $service)
                    <div class="services__item">
                        <a class="service__item" href="{{route('services.edit',[$service->id])}}"
                           title="{{$service->name}}">
                            <span class="name">{{$service->name}}</span>
                        </a>
                        <span class="time">{{$service->timeRange_hour}} : {{$service->timeRange_minutes}}</span>
                        <span class="price">{{$service->price}}</span>
                    </div>
                @endforeach
            </div>
        </div>
        <a href="{{route('services.create')}}" class="btn" title="create">{{__('Create')}}</a>
    </div>
@endsection

