import {Link} from '@inertiajs/react';
import {Fragment, useEffect, useMemo, useState} from "react";

export default function Pagination({data}) {

    const [dimensions, setDimensions] = useState({
        width: window.innerWidth,
    })

    useEffect(() => {
        window.addEventListener('resize', () => {
            setDimensions({width: window.innerWidth})
        })
        return () => {
            window.removeEventListener('resize', () => {
                setDimensions({width: window.innerWidth})
            })
        }
    }, [])

    const simplePagination = useMemo(() => {
        return (
            <Fragment>
                <Link href={data.prev_page_url} className={`btn ${data.prev_page_url === null ? 'disabled' : ''}`}>
                    <span>« {("Prev")}</span>
                </Link>
                <div className={'text'}>
                    <span>{("Page")}</span>
                    <span>{data.current_page}</span>
                    <span>{("of")}</span>
                    <span> {data.last_page}</span>
                </div>

                <Link href={data.next_page_url} className={`btn ${data.next_page_url === null ? 'disabled' : ''}`}>
                    <span>{("Next")} » </span>
                </Link>
            </Fragment>
        )
    }, [data.prev_page_url, data.current_page, data.last_page, data.next_page_url])
    const desktopPagination = useMemo(() => {
        return (
            <Fragment>
                {data.links.map(function (link, index) {
                    if (link.url === null) {
                        return <Link
                            href={link.url}
                            className={'page-item disabled'}
                            key={`${link.label}_${index}`}
                            dangerouslySetInnerHTML={{__html: link.label}}
                        ></Link>
                    } else {
                        return <Link
                            href={link.url}
                            className={`${link.active ? 'active' : ''} page-item`}
                            key={`${link.label}_${index}`}
                            dangerouslySetInnerHTML={{__html: link.label}}
                        ></Link>
                    }
                })}
            </Fragment>
        )
    }, [data.links])

    return (
        <div className="pagination __laravel">
            <p className="results">{("Results:")} {data.from} - {data.to} {("of")} {data.total}</p>
            <div className="pages">
                {dimensions.width > 1199 ? desktopPagination : simplePagination}
            </div>
        </div>
    )
}
