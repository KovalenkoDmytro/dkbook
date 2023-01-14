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
    @dump($errors)
{{--    @dump($service)--}}
    <form action="{{route('services.update',[$service->id])}}" method="post">
        @csrf
        @method("PUT")

        <x-input
            for="service_name"
            text="{{__('Service name')}}"
            id="service_name"
            name="name"
            error="{{$errors->first('name')}}"
            value="{{ $service->name }}"
        ></x-input>


        <div class="service-timeRange">
            <p>{{__('Time range service')}}</p>

            <div class="timeRange">
                <div class="timeRange_item">
                    <span>{{__('Hour')}}</span>
                    <x-dropDownList
                        class="hour"
                        name="timeRange_hour"
                    >
                        <x-slot:options>
                            @foreach(range(0, 5) as $hour)
                                <option value="{{$hour}}" @selected($hour === $service->timeRange_hour) >
                                    {{$hour}}
                                </option>
                            @endforeach
                        </x-slot:options>
                    </x-dropDownList>
                </div>

                <div class="timeRange_item">
                    <span>{{__('Minutes')}}</span>
                    <x-dropDownList
                        class="minutes"
                        name="timeRange_minutes"
                    >
                        <x-slot:options>
                            @foreach(range(0, 59, 5) as $minute)
                                <option value="{{$minute}}" @selected($minute === $service->timeRange_minutes)>
                                    {{$minute}}
                                </option>
                            @endforeach
                        </x-slot:options>
                    </x-dropDownList>
                </div>
            </div>
        </div>

        <x-input
            for="service_price"
            text="{{__('Service price')}}"
            id="service_price"
            name="price"
            value="{{$service->price}}"
        ></x-input>

        <button class="btn" type="submit">{{__('Update')}}</button>

    </form>
@endsection
