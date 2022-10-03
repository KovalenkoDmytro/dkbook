<form action="{{route('employee.store')}}" method="post">
    @csrf
    <p>{{__('Add employee')}}</p>

    <x-input
        for="employee_name"
        text="{{__('Name')}}"
        id="employee_name"
        name="name"
        error="{{$errors->first('name') ?? false}}"
    >
    </x-input>

    <x-input
        for="employee_email"
        text="{{__('Email')}}"
        id="employee_email"
        name="email"
        error="{{$errors->first('email') ?? false}}"
    >
    </x-input>

    <x-input
        for="employee_position"
        text="{{__('Position')}}"
        id="employee_position"
        name="position"
        error="{{$errors->first('position') ?? false}}"
    >
    </x-input>

    <x-input
        for="employee_phone"
        text="{{__('Phone')}}"
        id="employee_phone"
        name="phone"
        error="{{$errors->first('phone') ?? false}}"
    >
    </x-input>

    <button type="submit">Add</button>
    <a class="close" href="{{url()->previous()}}"> close __permanent</a>
</form>
