@extends('layouts.registration')

@section('registration.content')
    <h2>REGISTRATION __permanent</h2>





    <section class="">
        {{__('the latest add scheduled company')}}

        @if(isset($scheduled) && $scheduled_id !=1)
            <x-scheduled-show :scheduled='$scheduled'/>
            <a href="{{route('scheduled.company.edit',['id'=> $scheduled_id])}}">
                {{__('edit scheduled')}}
            </a>
            <a href="#!">{{__('Finish')}}</a>
        @else
            <a href="{{route('scheduled.index',['id'=> $company_id, 'table' =>$tableDB])}}">
                {{__('add scheduled')}}
            </a>
        @endif
    </section>


@endsection


