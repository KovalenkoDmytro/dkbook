@extends('layouts.dashboard')

@dump($employees)

@section('dashboard.content')
    <h1>Employees pages</h1>

    <ul>
        @foreach($employees as $employee)
            <li class="employee">
                <img src="{{$employee['avatar']?? asset('/access/images/no_avatar.png')}}" alt="{{$employee['name']}}">
                <p class="employee_name">{{$employee['name']}}</p>
                <p class="employee_position">{{$employee['position']}}</p>
                <a href="mailto:{{$employee['email']}}">{{$employee['email']}}</a>
                <a href="tel:{{$employee['phone']}}">{{$employee['phone']}}</a>

                <a class="btn" href="">
                    <span> {{__('Scheduled')}}</span>
                   </a>
                <a class="btn" href="" >
                    <span>{{__('Edit')}}</span>
                </a>
            </li>
        @endforeach
    </ul>

@endsection
