import React from "react";
import {createRoot} from 'react-dom/client';
import {createInertiaApp} from '@inertiajs/react';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import {StrictMode} from "react";
import ContextProvider from "./Context";
import {LocalizationProvider} from "@mui/x-date-pickers";
import {AdapterDateFns} from "@mui/x-date-pickers/AdapterDateFns";


const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';


createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.jsx`, import.meta.glob('./Pages/**/*.jsx')),
    setup({el, App, props}) {
        const root = createRoot(el);


        root.render(
            <StrictMode>
                <ContextProvider>
                    <LocalizationProvider dateAdapter={AdapterDateFns}>
                        <App {...props} />
                    </LocalizationProvider>
                </ContextProvider>
            </StrictMode>
        );
    },
    progress: {
        color: '#ed2529',
        showSpinner: true,
    },

}).then(() => {
});
