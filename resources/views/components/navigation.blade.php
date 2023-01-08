<div class="navigation__wrapper">
    <nav class="navigation">
        <a class="navigation__link" href="{{route('dashboard.main')}}" title="main">
            <img class="link__icon" src="{{asset('/access/icons/dashboard.svg')}}">
            <span>{{__('Main')}}</span>
        </a>
        <a class="navigation__link" href="{{route('monthlyCalendar.index')}}" title="monthlyCalendar">
            <img class="link__icon" src="{{asset('/access/icons/calendar_monthly.svg')}}">
            <span>{{__('Monthly Calendar')}} </span>
        </a>
        <a class="navigation__link" href="{{route('dailyCalendar.index')}}" title="dailyCalendar">
            <img class="link__icon" src="{{asset('/access/icons/calendar_daily.svg')}}">
            <span>{{__('Daily Calendar')}} </span>
        </a>
        <a class="navigation__link" href="{{route('employee.index')}}" title="employees">
            <img class="link__icon" src="{{asset('/access/icons/employees.svg')}}">
            <span>{{__('Employees')}}</span>
        </a>
        <a class="navigation__link" href="{{route('client.index')}}" title="clients">
            <img class="link__icon" src="{{asset('/access/icons/clients.svg')}}">
            <span>{{__('Clients')}} </span>
        </a>
    </nav>
    <div class="navigation __footer">
        <a class="navigation__link" href="{{route('user.logout')}}" title="logout">
            <img class="link__icon" src="{{asset('/access/icons/logout.svg')}}">
            <span>{{__('Logout')}}</span>
        </a>
    </div>
</div>


