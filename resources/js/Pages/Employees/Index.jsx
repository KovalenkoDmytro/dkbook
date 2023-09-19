import Page from "@/Components/Page";
import Authenticated from "@/Layouts/Authenticated";
import toShowNotification, {__} from "@/helpers";
import {Link} from "@inertiajs/react";
import Table from "@/Components/CustomTable/Table";
import uuid from "react-uuid";
import React, {useEffect, useMemo} from "react";
import Swal from "sweetalert2";
import {router} from "@inertiajs/core";

export default function Index({employees,flash}) {

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
                router.delete(`/client/${elementID}`)
            }
        })
    }

    const table = useMemo(()=>{
        return(
            <Table data={employees} columnsName={['Name','Phone', 'E-mail']}>

                {employees.data.length > 0 && employees.data.map((item, index) => {
                    return (<tr key={`${uuid().substring(0, 9)}_${index}`}>
                        <td>{item.name}</td>
                        <td>
                            <a href={`tel:+${item.phone}`}>{item.phone}</a>
                        </td>
                        <td>
                            <a href={`mailto:+${item.email}`}>{item.email}</a>
                        </td>
                        <td>
                            <div className="buttons_wrapper actions">
                                <Link href={route(`employee.edit`, item.id)} alt={item.id}
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
    },[employees])

    return (
        <Authenticated>
            <Page pageName={'employees'}>
                {table}
                <Link href={route('employee.create')} className={'btn'}>{__("page.employees.btn.createClient")}</Link>
            </Page>
        </Authenticated>
    )
}
