import Authenticated from "@/Layouts/Authenticated";
import Page from "@/Components/Page";
import {useCallback, useEffect, useMemo, useReducer} from "react";
import reducer from "@/reducer";
import toShowNotification, {__} from "@/helpers";
import {router} from "@inertiajs/core";
import InputCustom from "@/Components/InputCustom";
import DropDownSelector from "@/Components/DropDownSelector";

export default function Edit({employee,services,flash,errors,}) {
    const [data, setData] = useReducer(reducer, {
        name: employee.name,
        email: employee.email,
        phone: employee.phone,
        position: employee.position,
        employeeSchedule: employee.employee_schedule_id,
        services: employee.services,
    })
    //to show notification
    useEffect(() => {
        if (flash.message !== null && flash.type) {
            toShowNotification(flash)
        }
    }, [flash])
    const toUpdate = useCallback((event) => {
        router.post('/employee', {...data}, {
            onProgress: () => {
                event.target.setAttribute('disable', true)
            },
            onFinish: () => {
                event.target.removeAttribute('disable')
            },
        })
    }, [data])
    const employeePhone_input = useMemo(()=>{
        return(
            <InputCustom
                id={'employee_phone'}
                label={__('page.createClient.input.label.phone')}
                placeholder={'+48333-333-333'}
                value={data.phone}
                error={errors.phone}
                onInput={(event) => {
                    setData({
                        type: 'add',
                        name: 'phone',
                        value: event.target.value,
                    })
                }
                }
            />
        )
    },[data.phone, errors.phone])
    const employeeName_input = useMemo(()=>{
        return(
            <InputCustom
                id={'employee_name'}
                label={__('page.createClient.input.label.clientName')}
                placeholder={'Steve Jobs'}
                value={data.name}
                error={errors.name}
                onInput={(event) => {
                    setData({
                        type: 'add',
                        name: 'name',
                        value: event.target.value,
                    })
                }
                }
            />
        )
    },[data.name, errors.name])
    const employeeEmail_input = useMemo(()=>{
        return(
            <InputCustom
                id={'employee_email'}
                label={__('page.createClient.input.label.email')}
                placeholder={'SteveJobs@apple.com'}
                value={data.email}
                error={errors.email}
                onInput={(event) => {
                    setData({
                        type: 'add',
                        name: 'email',
                        value: event.target.value,
                    })
                }
                }
            />
        )
    },[data.email, errors.email])
    const services_selector = useMemo(() => {
        let chose_services = [...data.services]
        return (
            <DropDownSelector
                id="services"
                label={__('page.createEmployee.services.title')}
                selected={data.services}
                settings={{
                    maxItems: 7,
                    onItemAdd: function (value) {
                        chose_services.push(parseInt(value))
                        setData({
                            type: 'add',
                            name: 'services',
                            value: [...new Set(chose_services)]
                        })
                    },
                    onItemRemove: function (value) {
                        chose_services = chose_services.filter(id => id !== parseInt(value))
                        setData({
                            type: 'add',
                            name: 'services',
                            value: [...new Set(chose_services)]
                        })
                    }
                }}
            >
                {services.map((item, index)=> {
                    return <option key={index} value={item.id}>{item.name}</option>
                })
                }
            </DropDownSelector>
        )
    }, [data.services, services])
    return (
        <Authenticated>
            <Page pageName={'editEmployee'}>
                {employeeName_input}
                {employeePhone_input}
                {employeeEmail_input}
                {services_selector}
            </Page>
        </Authenticated>
    )
}
