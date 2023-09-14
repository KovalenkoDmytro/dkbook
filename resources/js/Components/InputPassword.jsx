import {useId, useState} from "react";

export default function InputPassword({label='', error ='', id ='',onInput = ()=>{}, isBlockCopyPast = false , isRequired = false,}) {
    const id_default = useId()
    const [passwordType, setPasswordType] = useState("password");

    const togglePassword = () => {
        passwordType === "password" ? setPasswordType("text") : setPasswordType("password")
    }
    const toBlock = (event) => {
        isBlockCopyPast ? event.preventDefault() : null
    };

    return (
        <div
            className={`input_group _password ${error !== undefined && error.length > 0 ? 'validate_error' : ''} ${isRequired ? '_required' : ''}`}>
            {label.length > 0 && <label htmlFor={id.length >0 ? id : id_default}>{label}</label>}

            <div className={"input_wrapper"}>
                <input
                    id={id.length >0 ? id : id_default}
                    type={passwordType}
                    onInput={(event) => {
                        onInput(event);
                    }}
                    onCut={toBlock}
                    onCopy={toBlock}
                    onPaste={toBlock}
                />
                <div className={'icon_eye'} onClick={togglePassword}>
                    {passwordType === "password" ? <i className="icon icon_eye-hide"></i> :
                        <i className="icon icon_eye-open"></i>}
                </div>
            </div>
            {error.length > 0 && <p className="error">{error}</p>}
        </div>
    )
}
