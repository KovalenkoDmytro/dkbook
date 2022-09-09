@extends('layouts.registration')

@section('content')
    <h2>REGISTRATION</h2>
    <h2>step {{$step}}</h2>

    @if($employees->isNotEmpty())
        <ul class="employee_items">
            @foreach($employees as $employee)
                <li class="employee_item">
                    <a href="{{route('scheduled.index',[
                            'id'=> $employee['id'],
                            'name' =>$employee['name']])}}">add scheduled</a>
                    <p class="employee_name">{{$employee['name']}}</p>
                </li>
            @endforeach
        </ul>
    @endif

    <section class="add-employee">
        <div class="add-employee_text">
          <span>Would you like add some employee?</span>
          <p>Add basic information about your team</p>
        </div>
        <div class="">
            <i class="icon icon_plus"></i>
            <a href="{{route('employee.index')}}">Add employee</a>
        </div>
        <button>Next step</button>
    </section>


{{--    <x-add_employee></x-add_employee>--}}


@endsection


