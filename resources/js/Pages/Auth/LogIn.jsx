import {useEffect, useReducer} from "react";
import InputCustom from "@/Components/InputCustom";
import {router} from "@inertiajs/core";
import reducer from "@/reducer";
import toShowNotification, {__} from "@/helpers";
import InputPassword from "@/Components/InputPassword";
import Page from "@/Components/Page";


export default function LogIn({flash}) {
    const [data, setData] = useReducer(reducer, {
        email: '',
        password: '',
    })

    //to show notification
    useEffect(() => {
        if (flash.message !== null && flash.type) {
            toShowNotification(flash)
        }
    }, [flash])

    return (
        <Page pageName={'logIn'}>
            <InputCustom
                id={'email'}
                label={__('input.label.email')}
                placeholder={'StevJobs@apple.com'}
                value={data.email}
                onInput={(event) => {
                    setData({
                        type: 'add',
                        name: 'email',
                        value: event.target.value,
                    })
                }
                }
            />
            <InputPassword
                label={__('input.label.password')}
                onInput={(event) => {
                    setData({
                        type: 'add',
                        name: 'password',
                        value: event.target.value,
                    })
                }}
            />
            <div className={'btn'}
                 onClick={() => {
                     router.post(route('user.login'), {...data})
                 }}
            >{__("button.label.login")}</div>

        </Page>

    )
}
