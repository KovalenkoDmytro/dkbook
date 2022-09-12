@extends('layouts.main')

@section('content')

    @yield('content')

    <h1>Regist Layout</h1>
    <div class="buttons">
{{--        @if($step != 1)--}}
{{--            <a href="{{URL::route('company.registerStep', $step-1)}}">Prev step</a>--}}
{{--        @endif--}}
{{--        @if($step != $steps)--}}
{{--            <a href="{{URL::route('company.registerStep', $step+1)}}">Next step</a>--}}
{{--        @endif--}}
    </div>

    <a href="{{URL::route('company.main')}}">Back to main page</a>
@endsection
