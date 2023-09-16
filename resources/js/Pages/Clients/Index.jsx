import Page from "@/Components/Page";
import Authenticated from "@/Layouts/Authenticated";

export default function Index({clients}) {
    return (
        <Authenticated>
            <Page pageName={'Clients'}>
                {clients.data.map((item,index)=>{
                    return(
                        <p key={index}>{item.name}</p>
                    )
                })}
            </Page>
        </Authenticated>
    )
}
