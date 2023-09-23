<div class="navigation__wrapper">
    <nav class="navigation">
        <a class="navigation__link" href="{{route('dashboard.main')}}" title="main">
            <x-icon-dashboard/>
            <span>{{__('Main')}}</span>
        </a>
        <a class="navigation__link" href="{{route('monthlyCalendar.index')}}" title="monthlyCalendar">
            <x-icon-calendar_monthly/>
            <span>{{__('Monthly Calendar')}} </span>
        </a>
        <a class="navigation__link" href="{{route('dailyCalendar.index')}}" title="dailyCalendar">
            <x-icon-calendar_daily/>
            <span>{{__('Daily Calendar')}} </span>
        </a>
        <a class="navigation__link" href="{{route('employee.index')}}" title="employees">
            <x-icon-employees/>
            <span>{{__('Employees')}}</span>
        </a>
        <a class="navigation__link" href="{{route('client.index')}}" title="clients">
            <x-icon-clients/>
            <span>{{__('Clients')}} </span>
        </a>
        <a class="navigation__link" href="{{route('service.index')}}" title="services">
            <x-icon-services/>
            <span>{{__('Services')}} </span>
        </a>
    </nav>
    <div class="navigation __footer">
        <a class="navigation__link" href="{{route('user.logout')}}" title="logout">
            <x-icon-logout/>
            <span>{{__('Logout')}}</span>
        </a>
    </div>
</div>


