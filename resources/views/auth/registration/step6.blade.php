@extends('layouts.registration')

@section('content')
    <h2>REGISTRATION</h2>
    <h2>step {{$step}}</h2>
    //todo if there is scheduled you can update it



    <section class="">
        the latest add scheduled company
        @if(isset($scheduled))
            <x-scheduled-show :scheduled='$scheduled'/>
{{--            <a href="{{route('scheduled.update',[--}}
{{--                                'id'=> $company_id,--}}
{{--                                'table' =>$tableDB])}}">update scheduled</a>--}}
            <a href="#!">Finish</a>
            @else
            <a href="{{route('scheduled.index',[
                                'id'=> $company_id,
                                'table' =>$tableDB])}}">add scheduled</a>
        @endif
    </section>


@endsection


