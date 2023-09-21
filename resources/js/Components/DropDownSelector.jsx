import React, {useEffect} from "react";
import TomSelect from "tom-select";


export default React.memo(function DropDownSelector({
                                                        id,
                                                        selected = '',
                                                        label,
                                                        children,
                                                        settings,
                                                        className = '',
                                                        placeholder = 'Please to choose the option',
                                                        error = false,
                                                    }) {

    useEffect(() => {
        const tomSelector = new TomSelect(`#${id}`, {
            persist: false,
            maxItems: 1,
            maxOptions: 500,
            plugins: {
                remove_button: {
                    title: 'Remove this item',
                },
            },
            ...settings,

        });
        return () => {
            tomSelector.destroy()
        }
    }, [])
    useEffect(() => {
        let select = document.getElementById(`${id}`)
        let control = select.tomselect;

        if(Array.isArray(selected)){
            selected.forEach(item=>{
                control.addItem(item);
            })
        }
        else {
            control.addItem(selected);
        }


    }, [selected])

    return (
        <div className={`${error ? 'validate_error' : ''} input_group dropDownSelector ${className}`}>
            {label !== null ? <label htmlFor={id}> {label}</label> : null}
            <select
                id={id}
                placeholder={placeholder}
                defaultValue={[selected]}
                multiple
            >
                {children}
            </select>


            {error && <p className="error">{error}</p>}
        </div>
    )
})
