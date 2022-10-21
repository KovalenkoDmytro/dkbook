@extends('layouts.registration')

@section('registration.content')
    <form action="{{route('company.createCompany')}}" method="post">
        @csrf
        <x-input
            for="company_name"
            text="{{__('Company name')}}"
            id="company_name"
            name="name"
            error="{{$errors->first('name') ?? false}}"
            value="{{ old('name') }}"
            placeholder="{{__('Apple')}}"
        >
        </x-input>

        <x-input
            for="company_address"
            text="{{__('Company address')}}"
            id="company_address"
            name="address"
            error="{{$errors->first('address') ?? false}}"
            value="{{ old('address') }}"
            placeholder="{{__('1600 Amphitheatre Pkwy, Mountain View, CA 94043, United States')}}"
        >
        </x-input>

        @php
            $custom_values = $business_type->map(function($item){
                return $item['id'];
            });
            $custom_properties_name = $business_type->map(function($item){
                return $item['type'];
            })
        @endphp
        <div class="dropDown_group">
            <p class="title">{{__('Type of business')}}</p>
            <x-select-drop-down
                name="business_type_id"
                :custom_values="$custom_values"
                :custom_properties_name="$custom_properties_name">
            </x-select-drop-down>
        </div>



        <div class="social-Media-links">
            <input type="hidden" name="socialMedia" value="example">
        </div>

        <button class="btn" type="submit">{{__('Next step')}}</button>
    </form>

@endsection


