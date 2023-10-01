import {Scheduler} from "@aldabil/react-scheduler";
import axios from 'axios';
import Authenticated from "@/Layouts/Authenticated";
import Page from "@/Components/Page";
import React, {useMemo, useState} from "react";
import {subDays, format} from 'date-fns'
import {usePage} from "@inertiajs/react";


export default function Calendar() {
    const {auth} = usePage().props
    const [appointments, SetAppointments] = useState([])

    const prepareAppointmentsArray = function (data){
        let appointments = [];
        data.forEach(element =>{
            console.log(element)
            appointments.push({
                event_id : element.event_id,
                start: new Date(element.start),
                end: new Date(element.start),
            })
        })
        console.log(appointments)
    }
    const toGetAppointments = (data) => {
        axios.post(`company/${auth.company_id}/appointments`, {...data})
            .then(response =>{
                if(response.data.appointments.length){
                        prepareAppointmentsArray(response.data.appointments)
                    }
                }
            )
    }

    const Calendar = useMemo(()=>{
        console.log('render Calendar')
        return(
            <Scheduler view="week"
                       day={{
                           startHour: 8,
                           endHour: 22,
                           step: 30,
                           // cellRenderer?:(props: CellProps) => JSX.Element,
                           navigation: true
                       }}
                       getRemoteEvents={function (par) {
                           let  dataRequest = {
                               view: 'day',
                               start: format(subDays(par.end, 1), 'yyyy-MM-dd')
                           }
                           if (par.view !== 'day') {
                               dataRequest = {
                                   start: format(par.start, 'yyyy-MM-dd'),
                                   end: format(par.end, 'yyyy-MM-dd'),
                                   view: par.view
                               }
                           }
                           toGetAppointments(dataRequest)
                       }}
                       fields={[
                           {
                               name: "user_id",
                               type: "select",
                               // Should provide options with type:"select"
                               options: [
                                   {id: 1, text: "John", value: 1},
                                   {id: 2, text: "Mark", value: 2}
                               ],
                               config: {label: "User", required: true, errMsg: "Plz Select User"}
                           },
                           {
                               name: "Description",
                               type: "input",
                               default: "Default Value...",
                               config: {label: "Details", multiline: true, rows: 4}
                           },
                           {
                               name: "anotherdate",
                               type: "date",
                               config: {
                                   label: "Other Date",
                                   md: 6,
                                   type: "datetime"
                               }
                           }
                       ]}
                // onViewChange={function (view, test) {
                //     console.log(view, test)
                // }}
                // onSelectedDateChange={function (Date, test) {
                //     console.log(Date, test)
                // }}

                       draggable={true}
                events={

    // appointments

                [
                           {
                               event_id: 1,
                               title: "Event 1",
                               start: new Date("2023/9/27 09:30"),
                               end: new Date("2023/9/27 10:30"),
                           },
                           {
                               event_id: 2,
                               title: "Event 2",
                               start: new Date("2023/8/05 10:00"),
                               end: new Date("2023/8/05 11:00"),
                           },
                       ]

                }
                // onConfirm={function (event, action) {
                //     console.log(event)
                //     console.log(action)
                // }}
                // onDelete={function (id) {
                //     console.log(id)
                // }}
                // events={{
                //     // event_id: number or string;
                //     // title: string;
                //     // start: Date;
                //     // end: Date;
                //     // disabled?: boolean;
                //     // color?: string or "palette.path";
                //     // editable?: boolean;
                //     // deletable?: boolean;
                //     // draggable?: boolean;
                //     // allDay?: boolean;
                // } }
            />
        )
    },[appointments])

    return (
        <Authenticated>
            <Page pageName={'calendar'}>
                {Calendar}
            </Page>
        </Authenticated>
    )


}
