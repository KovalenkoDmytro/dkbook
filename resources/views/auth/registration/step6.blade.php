@extends('layouts.registration')

@section('registration.content')
    <h2>REGISTRATION</h2>

    //todo if there is scheduled you can update it



    <section class="">
        the latest add scheduled company
        @if(isset($scheduled) && $scheduled_id !=1)
            <x-scheduled-show :scheduled='$scheduled'/>
            <a href="{{route('scheduled.company.edit',['id'=> $scheduled_id])}}">edit scheduled</a>


            <a href="#!">Finish</a>
            @else
            <a href="{{route('scheduled.index',[
                                'id'=> $company_id,
                                'table' =>$tableDB])}}">add scheduled</a>
        @endif
    </section>


@endsection


