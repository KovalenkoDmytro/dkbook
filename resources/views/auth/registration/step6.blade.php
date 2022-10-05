@extends('layouts.registration')

@section('registration.content')
    <section class="">
        {{__('the latest add scheduled company')}}

        @if(isset($scheduled) && $scheduled_id !=1)
            <x-scheduled-show :scheduled='$scheduled'/>
            <a class="btn" href="{{route('scheduled.company.edit',['id'=> $scheduled_id])}}">{{__('edit scheduled')}}</a>
            <a class="btn" href="{{route('company.step7')}}">{{__('Finish')}}</a>
        @else
            <a class="btn" href="{{route('scheduled.index',['id'=> $company_id, 'table' =>$tableDB])}}">{{__('add scheduled')}}</a>
        @endif
    </section>


@endsection


