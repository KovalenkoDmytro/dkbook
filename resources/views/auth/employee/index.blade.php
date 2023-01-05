@extends('layouts.dashboard')
@section('dashboard.content')


    @if (Session::has('success'))
        <div class="alert alert-success">
            <h2>{!! Session::get('success') !!}</h2>
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-error">
            <h2>{!! Session::get('error') !!}</h2>
        </div>
    @endif


    <div class="page-employees">
        <h1>{{__('Employees pages')}}</h1>

        {{$employees->links('components.pagination')}}

        <div class="employees">
            @foreach($employees as $employee)

                <div class="employee">
                    <img class="employee__photo" src="{{$employee['avatar']?? asset('/access/images/no_avatar.png')}}" alt="{{$employee['name']}}">
                    <p class="employee__name">{{$employee['name']}}</p>
                    <p class="employee__position">{{$employee['position']}}</p>
                    <a href="mailto:{{$employee['email']}}">{{$employee['email']}}</a>
                    <a href="tel:{{$employee['phone']}}">{{$employee['phone']}}</a>

                    <a class="btn" href="{{route('employee.show',[$employee->id])}}" >
                        <span>{{__('Edit')}}</span>
                    </a>
                </div>
            @endforeach
            <a class="link __create"
               title="{{__('create')}}"
               href="{{route('employee.create')}}">
                create
            </a>
        </div>

        {{$employees->links('components.pagination')}}
    </div>
@endsection
