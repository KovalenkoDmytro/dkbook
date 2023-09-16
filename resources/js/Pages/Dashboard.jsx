import Page from "@/Components/Page";
import {__} from "@/helpers";
import Authenticated from "@/Layouts/Authenticated";

export default function Dashboard() {
    return (
        <Authenticated>
            <Page pageName={'dashboard'}>
                <div>{__("page.dashboard.mainTitle")}</div>
            </Page>
        </Authenticated>
    )
}
