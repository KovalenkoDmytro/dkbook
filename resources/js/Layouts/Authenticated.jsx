import {Fragment} from "react";
import Navigation from "@/Components/Navigation";

export default function Authenticated({header = '', children}) {
    console.log(header)
    return (
        <Fragment>
            <div className={'application __authenticated'}>
                <Navigation/>
                {header.length > 0 ?  <header className={'header container'}>{header}</header> : ''}
                <main className="container">{children}</main>
            </div>
        </Fragment>
    )
}
