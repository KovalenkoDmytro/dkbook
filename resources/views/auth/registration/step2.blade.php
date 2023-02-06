@extends('layouts.registration')

@section('registration.content')
    <form action="{{route('registration.createCompany')}}" method="post">
        @csrf
        <x-input
            for="company_name"
            text="{{__('Company name')}}"
            id="company_name"
            name="name"
            error="{{$errors->first('name')}}"
            value="{{ old('name') }}"
            placeholder="{{__('Apple')}}"
        >
            <i class="fi fi-rr-home"></i>
        </x-input>
        <x-input
            for="company_address"
            text="{{__('Company address')}}"
            id="company_address"
            name="address"
            error="{{$errors->first('address')}}"
            value="{{ old('address') }}"
            placeholder="{{__('1600 Amphitheatre Pkwy, Mountain View, CA 94043, United States')}}"
        >
            <i class="fi fi-rr-map-marker"></i>
        </x-input>
        <div class="dropDown_group {{$errors->has('business_type_id') ? 'validate_error' : ''}}">
            <p class="title">{{__('Type of business')}}</p>
            <x-dropDownList
                name="business_type_id"
            >
                <x-slot:options>
                    @foreach($business_type as $id => $type)
                        <option value="{{$id}}">
                            {{$type}}
                        </option>
                    @endforeach
                </x-slot:options>
            </x-dropDownList>
            @if($errors->has('business_type_id'))
                <p class="error">{{$errors->first('business_type_id')}}</p>
            @endif
        </div>
        <button class="btn" type="submit">{{__('Next step')}}</button>
    </form>

@endsection


