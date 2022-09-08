@extends('layouts.registration')

@section('content')
    <h2>REGISTRATION</h2>
    <h2>step {{$step}}</h2>



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
          <span>Add first services</span>
          <p>Add at least one service from your offer. Later, you can add more services, assign them to categories and edit </p>
        </div>
        <div class="">
            <i class="icon icon_plus"></i>
            <a href="{{route('services.create')}}">Add service</a>
        </div>
        <button>Next step</button>
    </section>
@endsection


