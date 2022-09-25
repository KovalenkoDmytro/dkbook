@extends('layouts.registration')

@section('registration.content')
    <h2>REGISTRATION __permanent</h2>

    @if($employees->isNotEmpty())
        <ul class="employee_items">
            @foreach($employees as $employee)
                <li class="employee_item">
                    <p>{{$employee['scheduled_id']}}</p>
                    @if($employee['scheduled_id'] !== 1)
                        <a href="{{route('scheduled.employee.edit',['id'=> $employee['id']])}}">{{__('edit scheduled')}}</a>
                    @else
                        <a href="{{route('scheduled.index',['id'=> $employee['id'],'table' =>$tableDB])}}">{{__('add scheduled')}}</a>
                    @endif
                    <p class="employee_name">{{$employee['name']}}</p>
                </li>
            @endforeach
        </ul>
    @endif

    <section class="add-employee">
        <div class="add-employee_text">
          <span>{{__('Would you like add some employee?')}}</span>
          <p>{{__('Add basic information about your team')}}</p>
        </div>
        <div class="">
            <i class="icon icon_plus"></i>
            <a href="{{route('employee.index')}}">{{__('Add employee')}}</a>
        </div>
    </section>

@endsection


