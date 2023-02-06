@extends('layouts.registration')

@section('registration.content')
    @if($services->isNotEmpty())
        <ul class="service_items">
            @foreach($services as $service)
                <li class="service_item">
                    <p class="service_name">{{$service['service_name']}}</p>
                </li>
            @endforeach
        </ul>
    @endif

    <section class="add-services">
        <div class="add-services_text">
          <span>{{__('Add first services')}}</span>
          <p>
              {{__('Add at least one service from your offer. Later, you can add more services, assign them to categories and edit')}}
          </p>
        </div>

        <div class="buttons_wrapper">
            @if($services->isNotEmpty())
                <div class="btn" id="#showForm">
                    <i class="icon icon_plus"></i>
                    <span>{{__('Add next one service')}}</span>
                </div>
{{--            @else--}}
{{--                <div class="btn">--}}
{{--                    <i class="icon icon_plus"></i>--}}
{{--                    <a href="{{route('services.index')}}">{{__('Add first service')}}</a>--}}
{{--                </div>--}}
            @endif

{{--            @if($services->isNotEmpty())--}}
{{--                <div class="btn">--}}
{{--                    <a href="{{route('registration.step5')}}">{{__('Next step')}}</a>--}}
{{--                </div>--}}
{{--            @endif--}}
        </div>

        <form id="formAddService">
            <x-input
                text="{{__('Service name')}}"
                id="service_name"
                name="name"
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
                text="{{__('Service price')}}"
                id="service_price"
                name="price"
                placeholder="34.50"
            ></x-input>

            <x-button>

            </x-button>

        </form>

    </section>

    <script type="text/javascript">
        const showForm = document.querySelector('#showForm')
        const formAddService = document.querySelector('#formAddService')
        showForm.addEventListener('click',function(){

        })
    </script>

@endsection


