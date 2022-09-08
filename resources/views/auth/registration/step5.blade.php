@extends('layouts.registration')

@section('content')
    <h2>REGISTRATION</h2>
    <h2>step {{$step}}</h2>


    <section class="add-employee">
        <div class="add-employee_text">
          <span>Would you like add some employee?</span>
          <p>Add basic information about your team</p>
        </div>
        <div class="">
            <i class="icon icon_plus"></i>
            <span>Add employee</span>
        </div>
        <button>Next step</button>
    </section>


    <x-add_employee></x-add_employee>


@endsection


