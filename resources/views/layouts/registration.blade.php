@extends('layouts.main')

@section('content')
    @php
        $currentStep = getCurrentStepRegistration()
    @endphp
    <x-progress-bar-register/>

    <h1 class="registration_step-title">{{$currentStep['stepName']}} {{__('registration')}}</h1>



    <div class="buttons">

        @if($currentStep['stepNumber'] != 1)
            <a href="{{URL::route('company.step'.$currentStep['stepNumber']-1)}}">{{__('Prev step')}}</a>
        @endif

        @if($currentStep['stepNumber'] != 7)
            <a href="{{URL::route('company.step'.$currentStep['stepNumber']+1)}}">{{__('Next step')}}</a>
        @endif
    </div>

    <a href="{{URL::route('company.main')}}">{{__('Back to main page')}}</a>
    @yield('registration.content')
@endsection
