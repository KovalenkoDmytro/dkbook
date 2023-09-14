import reducer from "../../reducer";
import {useEffect, useReducer} from "react";
import {Input} from "../../Components/Input";
import InputPassword from "../../Components/InputPassword";
import {router} from "@inertiajs/core";
import toShowNotification from "../../helpers";

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
        <div className={'page _logIn'}>
            <Input
                id={'email'}
                label={('Email')}
                placeholder={('StevJobs@apple.com')}
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
                label={('Password')}
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
            >{("Log in")}</div>
        </div>
    )
}
