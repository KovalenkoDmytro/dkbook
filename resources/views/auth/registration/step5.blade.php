@extends('layouts.registration')

@section('registration.content')

    <section class="add-employee">
        <div class="add-employee_text">
          <span>{{__('Would you like add some employee?')}}</span>
          <p>{{__('Add basic information about your team')}}</p>
        </div>

        <div class="employees">
            @if($employees->isNotEmpty())
                @foreach($employees as $employee)
                    <div class="employee">
                        <img class="employee__photo" src="{{$employee['avatar']?? asset('/access/images/no_avatar.png')}}" alt="{{$employee['name']}}">
                        <p class="employee__name">{{$employee['name']}}</p>
                        <p class="employee__position">{{$employee['position']}}</p>
                        <p>{{$employee['email']}}</p>
                        <p>{{$employee['phone']}}</p>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="buttons_wrapper">
            <div class="btn" >
                <a href="{{route('registration.step4')}}">{{__('Prev step')}}</a>
            </div>
            <div id="nextStep" class="btn nextStep {{$employees->isNotEmpty() ? '__show' : ''}}" >
                <a href="{{route('registration.step6')}}">{{__('Next step')}}</a>
            </div>

            <div class="btn" id="showForm">
                <i class="icon icon_plus"></i>
                @if($employees->isNotEmpty())
                    <span>{{__('Add next one employee')}}</span>
                @else
                    <span>{{__('Add first employee')}}</span>
                @endif
            </div>


        </div>

        <form id="formAddEmployee" class="formAddEmployee">
            <x-input
                text="{{__('Name')}}"
                id="employee_name"
                name="name"
                placeholder="{{__('SteveJobs')}}">
                <i class="fi fi-rr-user"></i>
            </x-input>
            <x-input
                text="{{__('Email')}}"
                id="employee_email"
                name="email"
                placeholder="{{__('SteveJobs@apple.com')}}">
                <i class="fi fi-rr-envelope"></i>
            </x-input>
            <x-input
                text="{{__('Position')}}"
                id="employee_position"
                name="position"
                placeholder="{{__('CEO')}}">
                <i class="fi fi-rr-users-alt"></i>
            </x-input>
            <x-input
                text="{{__('Phone')}}"
                id="employee_phone"
                name="phone"
                placeholder="{{__('+48333-333-333')}}">
                <i class="fi fi-rr-phone-call"></i>
            </x-input>
            <button class="btn" id="addNewEmployee">{{__('Add new employee')}}</button>
        </form>

    </section>
@endsection


