export default function (state, action,) {
    switch (action.type) {
        case 'add':
            if(action.translation){
                return {
                    ...state, language: Object.defineProperty(state.language, `${action.translateLanguage}`, {
                        value: {...state.language[action.translateLanguage], [action.name]: action.value},
                        enumerable: true,
                        configurable: true
                    })
                }
            }else {
                return {
                    ...state,
                    [action.name]: action.value,
                }
            }

        case 'remove':
            if (typeof state === 'object' && !Array.isArray(state) && state !== null) {
                return {
                    ...state,
                    [action.name]: ''
                }
            }
            break;
        default :
            return state
    }
}
