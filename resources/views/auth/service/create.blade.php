@extends('layouts.dashboard')
@section('dashboard.content')
    <h1>Create service page __permanent</h1>
    @if (Session::has('error'))
        <div class="alert alert-error">
            <h2>{!! Session::get('error') !!}</h2>
        </div>
    @endif
    <form method="post">
        @csrf

        <p>{{__('Add service')}}</p>
        <a class="btn icon icon_close" href="{{url()->previous()}}"></a>
        <x-input
            for="service_name"
            text="{{__('Service name')}}"
            id="service_name"
            name="name"
            error="{{$errors->first('name') ?? false}}"
            value="{{ old('name') }}"
        ><i class="fi fi-rr-money-check"></i>
        </x-input>


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
                                <option value="{{$hour}}">
                                    {{$hour}}h
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
                                <option value="{{$minute}}">
                                    {{$minute}}min
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
            placeholder="34.50"
            error="{{$errors->first('price') ?? false}}"
        >
            <i class="fi fi-rr-money-bill-wave"></i>
        </x-input>


        <button class="btn" type="submit">{{__('Add')}}</button>


    </form>

@endsection

