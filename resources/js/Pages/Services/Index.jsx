import Page from "@/Components/Page";
import Authenticated from "@/Layouts/Authenticated";
import toShowNotification, {__} from "@/helpers";
import {Link} from "@inertiajs/react";
import Table from "@/Components/CustomTable/Table";
import uuid from "react-uuid";
import React, {useEffect, useMemo} from "react";
import Swal from "sweetalert2";
import {router} from "@inertiajs/core";

export default function Index({services,flash}) {

    //to show notification
    useEffect(() => {
        if (flash.message !== null && flash.type) {
            toShowNotification(flash)
        }
    }, [flash])

    const toDestroy = (elementID) => {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#ed2529',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,
            preConfirm: () => {
                router.delete(`/service/${elementID}`)
            }
        })
    }

    const table = useMemo(()=>{
        return(
            <Table data={services} columnsName={['Name','price', 'Time range']}>

                {services.data.length > 0 && services.data.map((item, index) => {
                    return (<tr key={`${uuid().substring(0, 9)}_${index}`}>
                        <td>{item.name}</td>
                        <td>{item.price}</td>
                        <td>
                            {item.timeRange_hour > 10 ? item.timeRange_hour : `0${item.timeRange_hour}` }
                            -
                            {item.timeRange_minutes > 10 ? item.timeRange_minutes : `0${item.timeRange_minutes}` }
                        </td>

                        <td>
                            <div className="buttons_wrapper actions">
                                <Link href={route(`service.edit`, item.id)} alt={item.id}
                                      className={"btn"}>
                                    <i className="icon icon_edit"></i>
                                    <span>{("Edit")}</span>
                                </Link>
                                <div className="btn"
                                     onClick={() => toDestroy(item.id)}>
                                    <i className="icon icon_destroy"></i>
                                    <span>{("Delete")}</span>
                                </div>
                            </div>
                        </td>
                    </tr>)
                })}

            </Table>
        )
    },[services])

    return (
        <Authenticated>
            <Page pageName={'services'}>
                {table}
                <Link href={route('service.create')} className={'btn'}>{__("page.services.btn.createClient")}</Link>
            </Page>
        </Authenticated>
    )
}
