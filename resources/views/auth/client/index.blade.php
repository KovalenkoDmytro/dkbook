@extends('layouts.dashboard')


<link rel="stylesheet" type="text/css"
      href="https://cdn.datatables.net/v/dt/dt-1.13.1/b-2.3.3/fh-3.3.1/r-2.4.0/datatables.min.css"/>
<!-- Scripts -->
<script type="text/javascript" src="{{ asset('/access/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('/access/js/Table/datatables.js') }}"></script>

@section('dashboard.content')
    <div class="page-clients __index">
        <h1>{{__('Clients pages')}}</h1>
        <div class="clients">
            <table id="dtBasicExample" class="table">
                <thead>
                <tr>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Phone')}}</th>
                    <th>{{__('E-mail')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{$client->name}}</td>
                        <td>{{$client->phone}}</td>
                        <td>{{$client->email}}</td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            <a class="btn __create"
               title="{{__('create')}}"
               href="{{route('client.create')}}">
                {{__('add new client')}}
            </a>
        </div>
    </div>
@endsection
<script>


    $(document).ready(function () {

        const customTable = new DataTable('#dtBasicExample', {
            dom: `
            <"actions"b>
            <"pagination"ip>
            <"filters"lf>
            <"table"t>
            <"pagination"ip>
            `,
            searchDelay: 1500,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            // fixedHeader: true,
            // responsive: true,
            // buttons: [
            //     {
            //         extend: 'copy',
            //         text: 'Copy to clipboard',
            //         className: 'btn',
            //     },
            //     {
            //         extend: 'pdf',
            //         className: 'btn',
            //     },
            //     {
            //         extend: 'excel',
            //         className: 'btn',
            //     },
            // {
            //     extend: 'print',
            //     text: 'Print current page',
            //     className: 'btn',
            //     autoPrint: false
            // }
            // ]

        });


        new TomSelect("#dataTables__select", {
            render: {
                no_results: null,
            },
            searchField: null,
            create: false,
        });


    });

</script>
