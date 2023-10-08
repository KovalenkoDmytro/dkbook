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
        description: "",
        payed: false,
        start: new Date(),
        end: new Date()
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
                        labelId="demo-simple-select-label"
                        id="demo-simple-select"
                        // value={age}
                        label="Age"
                        // onChange={handleChange}
                    >

                        {employees__array.map((item, index) => {
                            return (
                                <MenuItem key={`${item.name}_${item.id}_ww`} value={item.id}>{item.name}</MenuItem>
                            )


                        })}
                    </Select>
                </div>

            </div>
        );
    }, [])
    const dayModalWindow = useMemo(() => {
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
                        label="Age"
                        onChange={function (event, child) {
                            setData({
                                type: 'add',
                                name: 'service_id',
                                value: parseInt(event.target.value)
                            })
                        }}
                    >
                        {employees__array.map((item, index) => {
                            return (
                                <MenuItem key={`${item.name}_${item.id}_ww`} value={item.id}>{item.name}</MenuItem>
                            )
                        })}
                    </Select>

                    <TimePicker
                        label="Controlled picker"
                        // value={value}
                        // onChange={(newValue) => setValue(newValue)}
                    />


            </div>
        );
    }, [data])
    const CustomEditor = ({scheduler}) => {
        const event = scheduler.edited;
        console.log(scheduler)

        // Make your own form/state
        const [state, setState] = useState({
            title: event?.title || "",
            description: event?.description || ""
        });
        const [error, setError] = useState("");

        const handleChange = (value, name) => {
            setState((prev) => {
                return {
                    ...prev,
                    [name]: value
                };
            });
        };
        const handleSubmit = async () => {
            // Your own validation
            if (state.title.length < 3) {
                return setError("Min 3 letters");
            }

            try {
                scheduler.loading(true);

                /**Simulate remote data saving */
                const added_updated_event = (await new Promise((res) => {
                    /**
                     * Make sure the event have 4 mandatory fields
                     * event_id: string|number
                     * title: string
                     * start: Date|string
                     * end: Date|string
                     */
                    setTimeout(() => {
                        res({
                            event_id: event?.event_id || Math.random(),
                            title: state.title,
                            start: scheduler.state.start.value,
                            end: scheduler.state.end.value,
                            description: state.description
                        });
                    }, 3000);
                }))

                scheduler.onConfirm(added_updated_event, event ? "edit" : "create");
                scheduler.close();
            } finally {
                scheduler.loading(false);
            }
        };

        return (
            <div>
                <div style={{padding: "1rem"}}>
                    <p>Load your custom form/fields</p>

                </div>

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
                               return dayModalWindow
                           } else {
                               return <CustomEditor scheduler={scheduler}/>
                           }
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

                           // {
                           //     name: "user_id",
                           //     type: "select",
                           //     // Should provide options with type:"select"
                           //     options: [
                           //         {id: 1, text: "John", value: 1},
                           //         {id: 2, text: "Mark", value: 2}
                           //     ],
                           //     config: {label: "User", required: true, errMsg: "Plz Select User"}
                           // },
                           // {
                           //     name: "Description",
                           //     type: "input",
                           //     default: "Default Value...",
                           //     config: {label: "Details", multiline: true, rows: 4}
                           // },
                           // {
                           //     name: "anotherdate",
                           //     type: "date",
                           //     config: {
                           //         label: "Other Date",
                           //         md: 6,
                           //         type: "datetime"
                           //     }
                           // }
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
                {/*<Scheduler*/}
                {/*    getRemoteEvents={toGetAppointments}*/}
                {/*    week={{*/}
                {/*        startHour: 1,*/}
                {/*        endHour: 22,*/}
                {/*    }}*/}
                {/*    day={{*/}
                {/*        startHour: 1,*/}
                {/*        endHour: 22,*/}
                {/*        step: 30,*/}
                {/*        navigation: true*/}
                {/*    }}*/}
                {/*/>*/}
            </Page>
        </Authenticated>
    )


}
