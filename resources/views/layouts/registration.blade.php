@extends('layouts.main')

@section('content')
    <h1>Regist Layout</h1>
    <x-progress-bar-register/>
    <div class="buttons">
        @php
            $currentStep = getCurrentStepRegistration()
        @endphp

        @if($currentStep != 1)
            <a href="{{URL::route('company.step'.$currentStep-1)}}">Prev step</a>
        @endif

        @if($currentStep != 6)
            <a href="{{URL::route('company.step'.$currentStep+1)}}">Next step</a>
        @endif
    </div>

    <a href="{{URL::route('company.main')}}">Back to main page</a>
    @yield('registration.content')


@endsection
