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

        @if($services->isNotEmpty())
            <div class="btn">
                <i class="icon icon_plus"></i>
                <a href="{{route('services.index')}}">{{__('Add next one service')}}</a>
            </div>
        @else
            <div class="btn">
                <i class="icon icon_plus"></i>
                <a href="{{route('services.index')}}">{{__('Add first service')}}</a>
            </div>
        @endif

        @if($services->isNotEmpty())
            <div class="btn">
                <a href="{{route('company.step5')}}">{{__('Next step')}}</a>
            </div>
        @endif

    </section>


@endsection


