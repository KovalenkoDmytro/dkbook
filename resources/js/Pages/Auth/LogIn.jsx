import reducer from "../../reducer";
import {useReducer} from "react";

export default function LogIn() {
    const [data, setData] = useReducer(reducer, {
        email: '',
        password: '',
    })

    return (
        <div className={'LogIn'}>

            LogIn
        </div>
    )
}
