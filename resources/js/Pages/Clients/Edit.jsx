import Authenticated from "@/Layouts/Authenticated";
import Page from "@/Components/Page";
import InputCustom from "@/Components/InputCustom";
import toShowNotification, {__} from "@/helpers";
import {useCallback, useEffect, useMemo, useReducer} from "react";
import reducer from "@/reducer";
import {router} from "@inertiajs/core";

export default function Edit({flash,errors,client}) {
    const [data, setData] = useReducer(reducer, {
        name: client.name,
        email: client.email,
        phone: client.phone,
    })
    //to show notification
    useEffect(() => {
        if (flash.message !== null && flash.type) {
            toShowNotification(flash)
        }
    }, [flash])
    const toUpdate  = useCallback((event) => {
        router.put(`/client/${client.id}`, {...data}, {
            onProgress: () => {
                event.target.setAttribute('disable', true)
            },
            onFinish: () => {
                event.target.removeAttribute('disable')
            },
        })
    }, [data, client.id])

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
        <Authenticated header={__('page.editClient.header.edit')}>
            <Page pageName={'editClient'}>
                {clientName_input}
                {clientPhone_input}
                {clientEmail_input}
                <div className="btn" onClick={toUpdate}>{__("page.editClient.btn.title.update")}</div>
            </Page>
        </Authenticated>
    )
}
