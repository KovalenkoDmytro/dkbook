import React from "react";
import {Link} from "@inertiajs/react";
import {__} from "@/helpers";


export default React.memo(function Navigation() {
        return (
            <nav>
                <Link href={route('dashboard.main')} title="main">
                    <span>{__('navigation.linkTitle.mainPage')}</span>
                </Link>
                <Link href={route('monthlyCalendar.index')} title="monthlyCalendar">
                    <span>{__('navigation.linkTitle.monthlyCalendarPage')}</span>
                </Link>
                <Link href={route('dailyCalendar.index')} title="dailyCalendar">
                    <span>{__('navigation.linkTitle.dailyCalendarPage')}</span>
                </Link>
                <Link href={route('employee.index')} title="employees">
                    <span>{__('navigation.linkTitle.employeesPage')}</span>
                </Link>
                <Link href={route('client.index')} title="clients">
                    <span>{__('navigation.linkTitle.clientsPage')}</span>
                </Link>
                <Link href={route('services.index')} title="services">
                    <span>{__('navigation.linkTitle.servicesPage')}</span>
                </Link>
                <Link href={route('user.logout')} title="logout">
                    <span>{__('navigation.linkTitle.logout')}</span>
                </Link>
            </nav>
        )
    }
)
