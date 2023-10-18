import {Scheduler} from "@aldabil/react-scheduler";
import Authenticated from "@/Layouts/Authenticated";
import Page from "@/Components/Page";
import React, {useEffect, useMemo, useReducer, useRef, useState} from "react";
import {format, subDays, add} from 'date-fns'
import {usePage} from "@inertiajs/react";
import axios from "axios";
import {TimePicker} from "@mui/x-date-pickers";
import DropDownSelector from "@/Components/DropDownSelector";
import {__} from "@/helpers";
import reducer from "@/reducer";
import {Select, MenuItem} from "@mui/material";


export default function Calendar({services, employees, auth,errors}) {
    const [data, setData] = useReducer(reducer, {
        service_id: '',
        employee_id: '',
        description: '',
        payed: false,
        start: '',
        end: ''
    });
    const [calendarView, setCalendarView] = useState("week")
    const [choseServicePrice, setChoseServicePrice] = useState(null)

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



    const WeekModalWindow = ({scheduler}) => {
        const employees__array = employees.filter(item => {
            if (item.services.length && item.services.some((item) => item.id === data.service_id)) {
                return item
            }
        })
        return (
            <div>
                <div style={{padding: "1rem"}}>
                    <p>week</p>
                    <div className={`input_group ${errors.description !== undefined ? 'validate_error' : ''} _translate`}>
                        <label htmlFor="description">{('Description')}</label>
                        <textarea id="description"
                                  value={data.description}
                                  placeholder="Depending on the number of persons, the room is equipped with single, double or bunk beds."
                                  onChange={event =>
                                      setData({
                                          type: 'add',
                                          name: 'description',
                                          value: event.target.value,
                                      })
                                  }
                        />
                        {errors.description && <p className="error">{errors.description}</p>}
                    </div>
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
    }
    const DayModalWindow = ({scheduler}) => {

        const employees__array = employees.filter(item => {
            if (item.services.length && item.services.some((item) => item.id === data.service_id)) {
                return item
            }
        })
        return (
            <div>
                    <p>day</p>
                    <Select
                        labelId="service_id"
                        id="service_id"
                        value={data.service_id}
                        label="service"
                        onChange={function (event, child) {
                            const choseService = services.find(item => item.id === parseInt(event.target.value))
                            const result = add(scheduler.state.start.value, {
                                hours: choseService.timeRange_hour,
                                minutes: choseService.timeRange_minutes,
                            })
                            setChoseServicePrice(choseService.price)
                            setData({
                                type: 'add',
                                name: 'service_id',
                                value: parseInt(event.target.value)
                            })
                            setData({
                                type: 'add',
                                name: 'start',
                                value: scheduler.state.start.value
                            })
                            setData({
                                type: 'add',
                                name: 'end',
                                value: result
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
                        value={data.start}
                        onChange={(newValue) => {
                            setData({
                                type: 'add',
                                name: 'start',
                                value: newValue

                            })
                        }}
                    /*    format(newValue, 'yyyy-MM-dd HH:mm:00')*/
                    />
                    <TimePicker
                        label="To"
                        value={data.end}
                        onChange={(newValue) => {
                            setData({
                                type: 'add',
                                name: 'end',
                                value: newValue
                            })
                        }}
                    />

                <p className={'total'}>{choseServicePrice ?? null}</p>
                    <button className={'btn'} onClick={()=>{scheduler.close()}}>{__("calendar.createAppointment.btn.close")}</button>
                    <button className={'btn'} onClick={()=>{

                    }}>{__("calendar.createAppointment.btn.confirm")}</button>

            </div>
        );
    }

    const Calendar = useMemo(() => {
        return (
            <Scheduler view="week"
                       getRemoteEvents={toGetAppointments}
                       customEditor={(scheduler, events) => {
                           if (calendarView === 'week') {
                               return <WeekModalWindow scheduler={scheduler} events={events}/>
                           } else if (calendarView === 'day') {
                               return <DayModalWindow scheduler={scheduler} events={events}/>
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
                           // console.log(view, test)
                           setCalendarView(view)
                       }}
                       // onSelectedDateChange={function (Date, test) {
                       //     console.log(Date, test)
                       // }}
                       // onConfirm={function (event, action) {
                       //     console.log(event)
                       //     console.log(action)
                       // }}
                       // onDelete={function (id) {
                       //     console.log(id)
                       // }}

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
