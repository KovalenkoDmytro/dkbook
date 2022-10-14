<form action="{{route('employee.store')}}" method="post">
    @csrf
    <p>{{__('Add employee')}}</p>
    <a class="btn icon icon_close" href="{{url()->previous()}}"></a>
    <x-input
        for="employee_name"
        text="{{__('Name')}}"
        id="employee_name"
        name="name"
        error="{{$errors->first('name') ?? false}}"
        value="{{ old('name') }}"
    >
    </x-input>

    <x-input
        for="employee_email"
        text="{{__('Email')}}"
        id="employee_email"
        name="email"
        error="{{$errors->first('email') ?? false}}"
        value="{{ old('email') }}"
    >
    </x-input>

    <x-input
        for="employee_position"
        text="{{__('Position')}}"
        id="employee_position"
        name="position"
        error="{{$errors->first('position') ?? false}}"
        value="{{ old('position') }}"
    >
    </x-input>

    <x-input
        for="employee_phone"
        text="{{__('Phone')}}"
        id="employee_phone"
        name="phone"
        error="{{$errors->first('phone') ?? false}}"
        value="{{ old('phone') }}"
    >
    </x-input>

        <button class="btn" type="submit">{{__('Add employee')}}</button>

</form>
