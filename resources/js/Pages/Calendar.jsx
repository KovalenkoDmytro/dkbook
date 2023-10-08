import {Scheduler} from "@aldabil/react-scheduler";
import Authenticated from "@/Layouts/Authenticated";
import Page from "@/Components/Page";
import React, {useEffect, useMemo, useReducer, useRef, useState} from "react";
import {format, subDays} from 'date-fns'
import {usePage} from "@inertiajs/react";
import axios from "axios";
import {TimePicker} from "@mui/x-date-pickers";
import DropDownSelector from "@/Components/DropDownSelector";
import {__} from "@/helpers";
import reducer from "@/reducer";
import {Select, MenuItem} from "@mui/material";


export default function Calendar({services, employees, auth}) {
    const [data, setData] = useReducer(reducer, {
        service_id: '',
        employee_id: '',
        description: '',
        payed: false,
        start: '',
        end: '',
    });
    const [calendarView, setCalendarView] = useState("week")

    const prepareAppointmentsArray = function (data) {
        let appointments = [];
        data.forEach(element => {
            appointments.push({
                event_id: element.event_id,
                title: element.service.name,
                start: new Date(element.start),
                end: new Date(element.start),
            })
        })
        return appointments
    }
    const toGetAppointments = async (query) => {

        let dataRequest = {
            view: 'day',
            start: format(subDays(query.end, 1), 'yyyy-MM-dd')
        }
        if (query.view !== 'day') {
            dataRequest = {
                start: format(query.start, 'yyyy-MM-dd'),
                end: format(query.end, 'yyyy-MM-dd'),
                view: query.view
            }
        }

        const response = axios.post(`company/${auth.company_id}/appointments`, {...dataRequest})
        return await response.then(response => {
                if (response.data.appointments.length) {
                    return prepareAppointmentsArray(response.data.appointments)
                }
            }
        )
    }



    const weekModalWindow = useMemo(() => {
        const employees__array = employees.filter(item => {
            if (item.services.length && item.services.some((item) => item.id === data.service_id)) {
                return item
            }
        })
        return (
            <div>
                <div style={{padding: "1rem"}}>
                    <p>week</p>

                    <Select
                        labelId="service_id"
                        id="service_id"
                        value={data.service_id}
                        label="service"
                        onChange={function (event, child) {
                            setData({
                                type: 'add',
                                name: 'service_id',
                                value: parseInt(event.target.value)
                            })
                        }}
                    >

                        {services.map((item, index) => {
                            return (
                                <MenuItem key={`${item.name}_${item.id}_ww`} value={item.id}>{item.name}</MenuItem>
                            )


                        })}
                    </Select>


                    <Select
                        labelId="employee_id"
                        id="employee_id"
                        value={data.employee_id}
                        label="employee_id"
                        onChange={function (event, child) {
                            setData({
                                type: 'add',
                                name: 'employee_id',
                                value: parseInt(event.target.value)
                            })
                        }}
                    >

                        {employees__array.map(item => {
                            return (
                                <MenuItem key={`${item.name}_${item.id}_employee`} value={item.id}>{item.name}</MenuItem>
                            )


                        })}
                    </Select>
                </div>

            </div>
        );
    }, [])
    const DayModalWindow = ({scheduler}) => {
        const employees__array = employees.filter(item => {
            if (item.services.length && item.services.some((item) => item.id === data.service_id)) {
                return item
            }
        })
        console.log(scheduler.state)
        const startDate = format(scheduler.state.start.value, 'yyyy-MM-dd HH:mm:00')
        const startEnd = format(scheduler.state.end.value, 'yyyy-MM-dd HH:mm:00')
        console.log(startDate)
        return (
            <div>
                    <p>day</p>
                    <Select
                        labelId="service_id"
                        id="service_id"
                        value={data.service_id}
                        label="service"
                        onChange={function (event, child) {
                            setData({
                                type: 'add',
                                name: 'service_id',
                                value: parseInt(event.target.value)
                            })
                        }}
                    >
                        {services.map((item) => {
                            return (
                                <MenuItem key={`${item.name}_${item.id}_service`} value={item.id}>{item.name}</MenuItem>
                            )
                        })}
                    </Select>
                    <Select
                        labelId="employee_id"
                        id="employee_id"
                        value={data.employee_id}
                        label="employee"
                        onChange={function (event, child) {
                            setData({
                                type: 'add',
                                name: 'employee_id',
                                value: parseInt(event.target.value)
                            })
                        }}
                    >
                        {employees__array.map((item) => {
                            return (
                                <MenuItem key={`${item.name}_${item.id}_employee`} value={item.id}>{item.name}</MenuItem>
                            )
                        })}
                    </Select>
                    <TimePicker
                        label="From"
                        value={scheduler.state.start.value}
                        onChange={(newValue) => {
                            setData({
                                type: 'add',
                                name: 'start',
                                value: format(newValue, 'yyyy-MM-dd HH:mm:00')
                            })
                        }}
                    />
                    <TimePicker
                        label="To"
                        value={scheduler.state.end.value}
                        onChange={(newValue) => {
                            setData({
                                type: 'add',
                                name: 'end',
                                value: format(newValue, 'yyyy-MM-dd HH:mm:00')
                            })
                        }}
                    />

            </div>
        );
    }

    const Calendar = useMemo(() => {
        return (
            <Scheduler view="week"
                       getRemoteEvents={toGetAppointments}
                       customEditor={(scheduler) => {
                           if (calendarView === 'week') {
                               return weekModalWindow
                           } else if (calendarView === 'day') {
                               return <DayModalWindow scheduler={scheduler}/>
                           }
                           // else {
                           //     return <CustomEditor scheduler={scheduler}/>
                           // }
                       }}
                       week={{
                           startHour: 1,
                           endHour: 22,
                       }}
                       day={{
                           startHour: 1,
                           endHour: 22,
                           step: 30,
                           navigation: true
                       }}
                       fields={[
                           {
                               name: "service_id",
                               type: "select",
                               // Should provide options with type:"select"
                               options: services.map((element) => {
                                   return {
                                       id: element.id,
                                       text: `${element.name} (${element.price})`,
                                       value: element.id,
                                   }
                               }),
                               config: {label: "Service", required: true, errMsg: "Plz Select User"}
                           },
                       ]}
                       draggable={true}
                       onViewChange={function (view, test) {
                           console.log(view, test)
                           setCalendarView(view)
                       }}
                       onSelectedDateChange={function (Date, test) {
                           console.log(Date, test)
                       }}
                       onConfirm={function (event, action) {
                           console.log(event)
                           console.log(action)
                       }}
                       onDelete={function (id) {
                           console.log(id)
                       }}

            />)

    }, [calendarView, data])


    return (
        <Authenticated>
            <Page pageName={'calendar'}>
                {Calendar}
            </Page>
        </Authenticated>
    )


}
