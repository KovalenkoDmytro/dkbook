import Authenticated from "@/Layouts/Authenticated";
import Page from "@/Components/Page";
import {useCallback, useEffect, useMemo, useReducer} from "react";
import reducer from "@/reducer";
import toShowNotification, {__} from "@/helpers";
import {router} from "@inertiajs/core";
import InputCustom from "@/Components/InputCustom";

export default function Create({flash, errors}) {
    const [data, setData] = useReducer(reducer, {
        name: '',
        timeRange_hour: 0,
        timeRange_minutes: 15,
        price: '0',
    })
    //to show notification
    useEffect(() => {
        if (flash.message !== null && flash.type) {
            toShowNotification(flash)
        }
    }, [flash])
    const toCreate = useCallback((event) => {
        console.log(data)
        router.post('/service', {...data}, {
            onProgress: () => {
                event.target.setAttribute('disable', true)
            },
            onFinish: () => {
                event.target.removeAttribute('disable')
            },
        })
    }, [data])
    const serviceName_input = useMemo(()=>{
        return(
            <InputCustom
                id={'service_name'}
                label={__('page.createService.input.label.name')}
                placeholder={'Manicures'}
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
    const serviceTimeMinutes_input = useMemo(()=>{
        return(
            <InputCustom
                id={'timeRange_minutes'}
                label={__('page.createService.input.label.minutes')}
                type={"number"}
                placeholder={'02'}
                value={data.timeRange_minutes.toString()}
                error={errors.timeRange_minutes}
                onInput={(event) => {
                    setData({
                        type: 'add',
                        name: 'timeRange_minutes',
                        value: parseInt(event.target.value),
                    })
                }
                }
            />
        )
    },[data.timeRange_minutes, errors.timeRange_minutes])
    const serviceTimeHours_input = useMemo(()=>{
        return(
            <InputCustom
                id={'timeRange_hour'}
                label={__('page.createService.input.label.hour')}
                type={"number"}
                placeholder={'02'}
                value={data.timeRange_hour.toString()}
                error={errors.timeRange_hour}
                onInput={(event) => {
                    setData({
                        type: 'add',
                        name: 'timeRange_hour',
                        value: parseInt(event.target.value),
                    })
                }
                }
            />
        )
    },[data.timeRange_hour, errors.timeRange_hour])
    const servicePrice_input = useMemo(()=>{
        return(
            <InputCustom
                id={'price'}
                label={__('page.createService.input.label.price')}
                placeholder={'2.3'}
                value={data.price}
                error={errors.price}
                type="number"
                min="0.00"
                max="10000.00"
                step="0.01"
                onInput={(event) => {
                    setData({
                        type: 'add',
                        name: 'price',
                        value: event.target.value,
                    })
                }
                }
            />
        )
    },[data.price, errors.price])
    return (
        <Authenticated>
            <Page pageName={'service_create'}>
                {serviceName_input}
                {serviceTimeHours_input}
                {serviceTimeMinutes_input}
                {servicePrice_input}
            </Page>
            <div className="btn" onClick={toCreate}>{__("page.createService.btn.title.create")}</div>
        </Authenticated>
    )
}
