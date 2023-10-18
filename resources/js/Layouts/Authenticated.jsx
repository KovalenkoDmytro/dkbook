import {Fragment} from "react";
import Navigation from "@/Components/Navigation";

export default function Authenticated({children, header = ''}) {
    return (
        <Fragment>
            <div className={'application __authenticated'}>
                <Navigation/>
                <header className={'header'}>{header}</header>
                <main className="content_wrapper">{children}</main>
            </div>
        </Fragment>
    )
}
