@extends('layouts.registration')

@section('registration.content')

    @if($employees->isNotEmpty())
        <ul class="employee_items">
            @foreach($employees as $employee)
                <li class="employee_item">
                    <p>{{$employee['scheduled_id']}}</p>
                    @if($employee['scheduled_id'] !== 1)
                        <a class="btn" href="{{route('scheduled.employee.edit',['id'=> $employee['id']])}}">{{__('edit scheduled')}}</a>
                    @else
                        <a class="btn" href="{{route('scheduled.index',['id'=> $employee['id'],'table' =>$tableDB])}}">{{__('add scheduled')}}</a>
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

        @if($employees->isNotEmpty())
            <div class="btn">
                <i class="icon icon_plus"></i>
                <a href="{{route('employee.index')}}">{{__('Add next one employee ')}}</a>
            </div>
        @else
            <div class="btn">
                <i class="icon icon_plus"></i>
                <a href="{{route('employee.index')}}">{{__('Add first employee')}}</a>
            </div>
        @endif

        @if($employees->isNotEmpty())
            <div class="btn">
                <a href="{{route('company.step6')}}">{{__('Next step')}}</a>
            </div>
        @endif

    </section>

@endsection


