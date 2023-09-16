import {Fragment} from "react";
import Navigation from "@/Components/Navigation";

export default function Authenticated({children}) {
    return (
        <Fragment>
            <Navigation/>
            <main className="content_wrapper">{children}</main>
        </Fragment>
    )
}
