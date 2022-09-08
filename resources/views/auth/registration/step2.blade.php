@extends('layouts.registration')

@section('content')
    <h2>REGISTRATION</h2>
    <h2>step {{$step}}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{route('company.createCompany')}}" method="post">
        @csrf
        <label for="company_name">
            <span>Company Name</span>
            <input type="text" id="company_name" name="name">
        </label>

        <label>
            <span>Choose type of your business</span>
            <select name="business_type_id">
                @foreach ($business_type as $business_type_item)
                    <option name="{{$business_type_item['type']}}" value="{{$business_type_item['id']}}">{{$business_type_item['type']}}</option>
                @endforeach
            </select>
        </label>

        <label for="company_address">
            <span>Company address</span>
            <input type="text" id="company_address" name="address">
        </label>

        <div class="social-Media-links">
            <input type="hidden" name="socialMedia" value="example">
        </div>


        <button type="submit"> SEND data</button>
    </form>

{{--    <x-date-time-picker></x-date-time-picker>--}}
@endsection


