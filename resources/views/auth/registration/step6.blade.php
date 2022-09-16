

@extends('layouts.registration')

@section('content')
    <h2>REGISTRATION</h2>
    <h2>step {{$step}}</h2>
    //todo if there is scheduled you can update it


    <section class="">
       the latest add scheduled company
        <a href="{{route('scheduled.index',[
                            'id'=> $company_id,
                            'name' =>$company_name])}}">add scheduled</a>

    </section>


@endsection


