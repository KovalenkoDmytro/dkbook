@extends('layouts.registration')

@section('registration.content')
    <section class="company_scheduled">
        <p> {{__('the latest add scheduled company')}}</p>

            @if(isset($scheduled) && $scheduled_id !=1)
                <x-scheduled-show :scheduled='$scheduled'/>
            <div class="buttons_wrapper">
                <a class="btn icon icon_edit" href="{{route('scheduled.company.edit',['id'=> $scheduled_id])}}"></a>
                <a class="btn" href="{{route('company.step7')}}">{{__('Finish')}}</a>
            </div>
            @else
                <a class="btn" href="{{route('scheduled.index',['id'=> $company_id, 'table' =>$tableDB])}}">{{__('add scheduled')}}</a>
            @endif
    </section>
@endsection


