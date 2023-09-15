import Page from "@/Components/Page";
import {__} from "@/helpers";
import Navigation from "@/Components/Navigation";

export default function Dashboard() {
    return (
        <Page pageName={'dashboard'}>
            <div>{__("page.dashboard.mainTitle")}</div>
            <Navigation/>
        </Page>
    )
}
