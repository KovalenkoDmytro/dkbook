@extends('layouts.main')

@section('content')
    <h1>Register Layout __permanent</h1>
    <x-progress-bar-register/>
    <div class="buttons">
        @php
            $currentStep = getCurrentStepRegistration()
        @endphp

        @if($currentStep != 1)
            <a href="{{URL::route('company.step'.$currentStep-1)}}">{{__('Prev step')}}</a>
        @endif

        @if($currentStep != 7)
            <a href="{{URL::route('company.step'.$currentStep+1)}}">{{__('Next step')}}</a>
        @endif
    </div>

    <a href="{{URL::route('company.main')}}">{{__('Back to main page')}}</a>
    @yield('registration.content')
@endsection
