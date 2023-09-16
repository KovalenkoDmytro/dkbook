import Page from "@/Components/Page";
import Authenticated from "@/Layouts/Authenticated";
import {__} from "@/helpers";
import {Link} from "@inertiajs/react";

export default function Index({clients}) {
    return (
        <Authenticated>
            <Page pageName={'Clients'}>
                {clients.data.map((item,index)=>{
                    return(
                        <p key={index}>{item.name}</p>
                    )
                })}

                <Link href={route('client.create')} className={'btn'}>{__("page.clients.btn.createClient")}</Link>
            </Page>
        </Authenticated>
    )
}
