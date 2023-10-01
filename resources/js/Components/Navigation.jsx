import React from "react";
import {Link} from "@inertiajs/react";
import {__} from "@/helpers";
import Calendar from "@/Pages/Calendar";


export default React.memo(function Navigation() {
        return (
            <nav>
                <Link href={route('dashboard.main')} title="main">
                    <span>{__('navigation.linkTitle.mainPage')}</span>
                </Link>
                <Link href={route('calendar')} title="Calendar">
                    <span>{__('navigation.linkTitle.сalendar')}</span>
                </Link>
                <Link href={route('employee.index')} title="employees">
                    <span>{__('navigation.linkTitle.employeesPage')}</span>
                </Link>
                <Link href={route('client.index')} title="clients">
                    <span>{__('navigation.linkTitle.clientsPage')}</span>
                </Link>
                <Link href={route('service.index')} title="services">
                    <span>{__('navigation.linkTitle.servicesPage')}</span>
                </Link>
                <Link href={route('user.logout')} title="logout">
                    <span>{__('navigation.linkTitle.logout')}</span>
                </Link>
            </nav>
        )
    }
)
