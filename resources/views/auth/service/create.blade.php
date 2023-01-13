@extends('layouts.dashboard')
@section('dashboard.content')
    <h1>Create service page __permanent</h1>
    <form action="{{route('services.store')}}" method="post">
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
        ></x-input>


        <div class="service-timeRange">
            <p>{{__('Time range service')}}</p>

{{--            <div class="timeRange">--}}
{{--                <div class="timeRange_item">--}}
{{--                    <span>{{__('Hour')}}</span>--}}
{{--                    @php($hours = [00,01,02,03,04])--}}
{{--                    <x-select-drop-down name="timeRange_hour"--}}
{{--                                        :custom_properties_name="$hours"--}}
{{--                                        :custom_values="$hours">--}}
{{--                    </x-select-drop-down>--}}
{{--                </div>--}}

{{--                <div class="timeRange_item">--}}
{{--                    <span>{{__('Minutes')}}</span>--}}
{{--                    @php($minutes = [05,10,15,20,25,30,35,40,45,50,55])--}}
{{--                    <x-select-drop-down name="timeRange_minutes"--}}
{{--                                        :custom_properties_name="$minutes"--}}
{{--                                        :custom_values="$minutes">--}}
{{--                    </x-select-drop-down>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>

        <x-input
            for="service_price"
            text="{{__('Service price')}}"
            id="service_price"
            name="price"
            placeholder="34.50"
            error="{{$errors->first('price') ?? false}}"
        ></x-input>


        <button class="btn" type="submit">{{__('Add')}}</button>


    </form>

@endsection

