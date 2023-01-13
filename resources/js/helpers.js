//--callback-- it is a function witch will be to call
// --viewport-- is device size where callback will be to call
// --viewport can receive a parameters with number which equals device screen size: it's mobile, laptop, and all
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
