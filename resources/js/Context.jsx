import {createContext} from 'react';


export const Context = createContext(null);
export default function ContextProvider(props) {
    const languages = [
        {code: "en", name: "English", nativeName: "English"},
        {code: "de", name: "German", nativeName: "Deutsch"},
        {code: "fr", name: "French", nativeName: "Français"},
        {code: "es", name: "Spanish", nativeName: "Español"},
        {code: "it", name: "Italian", nativeName: "Italiano"},
        {code: "nl", name: "Dutch", nativeName: "Nederlands"},
        {code: "da", name: "Danish", nativeName: "Dansk"},
    ]
    const typesOfRoom = ['private', 'shared'];
    const typesOfCurrency = [
        {"cc": "EUR", "symbol": "\u20ac", "name": "European Euro"},
        {"cc": "USD", "symbol": "US$", "name": "United States dollar"},
        {"cc": "DKK", "symbol": "Kr", "name": "Danish krone"},
        {"cc": "GBP", "symbol": "\u00a3", "name": "British pound"},
        {"cc": "AED", "symbol": "\u062f.\u0625;", "name": "UAE dirham"},
        {"cc": "CAD", "symbol": "$", "name": "Canadian dollar"},
        {"cc": "CZK", "symbol": "K\u010d", "name": "Czech koruna"},
        {"cc": "PLN", "symbol": "z\u0142", "name": "Polish zloty"},
        {"cc": "SEK", "symbol": "kr", "name": "Swedish krona"},
    ];

    const value = {
        languages,
        typesOfRoom,
        typesOfCurrency,
    };

    return (
        <Context.Provider value={value}>
            {props.children}
        </Context.Provider>
    )
}

