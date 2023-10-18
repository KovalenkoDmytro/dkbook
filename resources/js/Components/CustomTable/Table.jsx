import React, { useMemo} from "react";
import Pagination from "@/Components/CustomTable/Pagination";
import uuid from "react-uuid";
import {__} from "@/helpers";


export default React.memo(function Table({ data = [], columnsName = [], className = '',children}) {
    const pagination = useMemo(()=>{
        return(
            <Pagination data={data}/>
        )
    },[data])


    return (
        <div className={`${className} customTable __component`}>
            <div className="dataTables_wrapper">
                <div className="table">
                    <table>
                        <thead>
                            <tr>
                                {columnsName.map((item, index) => {
                                    return <th key={`${uuid().substring(0, 9)}_${index}`}>{item}</th>
                                })}
                                <th key={`${uuid().substring(0, 9)}_action`}>{__("component.table.title.actions")}</th>
                            </tr>
                        </thead>
                        <tbody>
                        {children}
                        </tbody>
                    </table>
                    {data.data.length === 0 && <div className={'noResults'}>No matching records found</div>}
                </div>
            </div>
            {data.data.length > 0 && pagination}
        </div>
    )
})
