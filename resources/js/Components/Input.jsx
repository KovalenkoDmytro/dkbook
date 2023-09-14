import {useId} from "react";

export function Input({id = '', error='', required = false, label='', value='', onInput=()=>{}}) {

    const idDefault = useId()

    return (
        <div className={`input_group ${error.length>0 ? 'validate_error' : ''}  ${required ? '_required' : ''}`}>
            {label.length>0 &&  <label htmlFor={id.length>0 ? id : idDefault}>{label}</label>}
            <input id={id.length>0 ? id : idDefault}
                   placeholder="Berlin Central Station"
                   value={value}
                   onInput={event =>
                       onInput(event)
                   }
            />
            {error.length>0 && <p className="error">{error}</p>}
        </div>
    )
}
