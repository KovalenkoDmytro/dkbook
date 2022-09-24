@extends('layouts.registration')

@section('registration.content')
    <h2>REGISTRATION__permanent</h2>


{{--    @if ($errors->any())--}}
{{--        <div class="alert alert-danger">--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}


    <form action="{{route('company.createCompany')}}" method="post">
        @csrf
        <label for="company_name">
            <span>{{__('Company Name')}}</span>
            <input type="text" id="company_name" name="name">
            @error('name')
                <x-field_error :error="$errors->first('name')"/>
            @enderror
        </label>

        <label>
            <span>{{__('Choose type of your business')}}</span>
            <select name="business_type_id">
                @foreach ($business_type as $business_type_item)
                    <option name="{{$business_type_item['type']}}" value="{{$business_type_item['id']}}">{{$business_type_item['type']}}</option>
                @endforeach
            </select>
        </label>

        <label for="company_address">
            <span>{{__('Company address')}}</span>
            <input type="text" id="company_address" name="address">
            @error('address')
                <x-field_error :error="$errors->first('address')"/>
            @enderror
        </label>

        <div class="social-Media-links">
            <input type="hidden" name="socialMedia" value="example">
        </div>


        <button type="submit"> SEND data__permanent</button>
    </form>

@endsection


