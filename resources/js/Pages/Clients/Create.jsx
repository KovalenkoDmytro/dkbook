import toShowNotification, {__} from "@/helpers";
import {useCallback, useEffect, useMemo, useReducer} from "react";
import reducer from "@/reducer";
import Authenticated from "@/Layouts/Authenticated";
import Page from "@/Components/Page";
import InputCustom from "@/Components/InputCustom";
import {router} from "@inertiajs/core";


export default function Create({flash, errors}) {
    const [data, setData] = useReducer(reducer, {
        name: '',
        email: '',
        phone: '',
    })
    //to show notification
    useEffect(() => {
        if (flash.message !== null && flash.type) {
            toShowNotification(flash)
        }
    }, [flash])
    const toCreate = useCallback((event) => {
        router.post('/client', {...data}, {
            onProgress: () => {
                event.target.setAttribute('disable', true)
            },
            onFinish: () => {
                event.target.removeAttribute('disable')
            },
        })
    }, [data])

    const clientPhone_input = useMemo(()=>{
        return(
            <InputCustom
                id={'client_phone'}
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
    const clientName_input = useMemo(()=>{
        return(
            <InputCustom
                id={'client_name'}
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
    const clientEmail_input = useMemo(()=>{
        return(
            <InputCustom
                id={'client_email'}
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
    return (
        <Authenticated>
            <Page pageName={'createClient'}>
                {clientName_input}
                {clientPhone_input}
                {clientEmail_input}
                <div className="btn" onClick={toCreate}>{__("page.createClient.btn.title.create")}</div>
            </Page>
        </Authenticated>
    )
}
