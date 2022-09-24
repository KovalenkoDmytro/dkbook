@extends('layouts.registration')

@section('registration.content')
    <h2>REGISTRATION__permanent</h2>

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
        <div class="">
            <i class="icon icon_plus"></i>
            <a href="{{route('services.index')}}">{{__('Add service')}}</a>
        </div>
    </section>
@endsection


