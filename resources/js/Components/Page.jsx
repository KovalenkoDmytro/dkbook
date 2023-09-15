import React from "react";
export default React.memo(function Page({pageName = '', children}) {
    return (
        <div className={`page _${pageName}`}>
            {children}
        </div>
    )
})
