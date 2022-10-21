@extends('layouts.main')

@section('content')
    @php
        $currentStep = getCurrentStepRegistration()
    @endphp

    <main class="container ">
        <div class="page-registration">
            <x-progress-bar-register/>

            <h2 class="registration_step-title">{{$currentStep['stepName']}} {{__('registration')}}</h2>
            {{--        <div class="buttons">--}}

            {{--            @if($currentStep['stepNumber'] != 1)--}}
            {{--                <a href="{{URL::route('company.step'.$currentStep['stepNumber']-1)}}">{{__('Prev step')}}</a>--}}
            {{--            @endif--}}

            {{--            @if($currentStep['stepNumber'] != 7)--}}
            {{--                <a href="{{URL::route('company.step'.$currentStep['stepNumber']+1)}}">{{__('Next step')}}</a>--}}
            {{--            @endif--}}
            {{--        </div>--}}

            {{--        <a href="{{URL::route('main')}}">{{__('Back to main page')}}</a>--}}
            @yield('registration.content')
        </div>
    </main>


@endsection
