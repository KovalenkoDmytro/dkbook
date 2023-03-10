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
        <h1>{{__('Services')}}</h1>
        <div class="services__table">
            <div class="services__head">
                <p class="name"><i class="fi fi-rr-money-check"></i> {{__('Name')}}</p>
                <p class="time"><i class="fi fi-rr-alarm-clock"></i> {{__('Time')}}</p>
                <p class="price"><i class="fi fi-rr-money-bill-wave"></i>{{__('Price')}}</p>
                <div class="actions">{{__('Update/Destroy')}}</div>
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
                        <div class="buttons_wrapper">
                            <a class="btn" href="{{route('services.edit',[$service->id])}}"><i class="fi fi-rr-edit"></i></a>
                        </div>

                    </div>
                @endforeach
            </div>
            <a href="{{route('services.create')}}" class="btn" title="create">{{__('Add new')}}</a>
        </div>


    </div>
@endsection

