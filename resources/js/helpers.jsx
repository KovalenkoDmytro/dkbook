//--callback-- it is a function witch will be to call
// --viewport-- is device size where callback will be to call
// --viewport can receive a parameters with number which equals device screen size: it's mobile, laptop, and all
import Swal from "sweetalert2";

export const app = {
    'view': 'laptop',
    'run': function (callback, viewport, DOM_element_selector) {
        window.addEventListener('load', () => {
            // check element into DOM
            if (document.querySelector(DOM_element_selector) !== null) {
                switch (viewport) {
                    case 'mobile':
                        if (window.innerWidth <= 979) {
                            callback()
                        }
                        break;
                    case 'laptop':
                        if (window.innerWidth > 979 && window.innerWidth <= 1200) {
                            callback()
                        }
                        break;
                    case 'all':
                        callback()
                        break
                }
            }
        })

    }
}
// -- general function end ---

export default function toShowNotification (flash,settings) {
    Swal.fire({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        icon: flash.type,
        title: flash.message,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        },
        ...settings,
    })
}




export function __(key, replacements = {}) {
    let translation = window._translations[key] || key;

    Object.keys(replacements).forEach(r => {
        translation = translation.replace(`:${r}`, replacements[r]);
    })

    return translation;
}

