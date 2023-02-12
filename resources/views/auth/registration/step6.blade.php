@extends('layouts.registration')

@section('registration.content')
    <section class="company_scheduled">
        <p> {{__('The latest add scheduled company. Later, you can edit it')}}</p>
        <form action="{{route('companyScheduled.update')}}" method="post">
            @csrf
            <div class="scheduled_items">
                <x-date-time-picker
                    :scheduled="$scheduled"
                />
            </div>
            <div class="buttons_wrapper">
                <div class="btn" >
                    <a href="{{route('registration.step5')}}">{{__('Prev step')}}</a>
                </div>
                <div class="btn" >
                    <a href="{{route('registration.step7')}}">{{__('Next step')}}</a>
                </div>
                <button class="btn" type="submit">{{__("Update scheduled")}}</button>
            </div>
        </form>
    </section>
@endsection


