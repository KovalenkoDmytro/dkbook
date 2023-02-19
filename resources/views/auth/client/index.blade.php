@extends('layouts.dashboard')


<link rel="stylesheet" type="text/css"
      href="https://cdn.datatables.net/v/dt/dt-1.13.1/b-2.3.3/fh-3.3.1/r-2.4.0/datatables.min.css"/>
<!-- Scripts -->
<script type="text/javascript" src="{{ asset('/access/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('/access/js/Table/datatables.js') }}"></script>

@section('dashboard.content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            <h2>{!! Session::get('success') !!}</h2>
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-error">
            <h2>{!! Session::get('error') !!}</h2>
        </div>
    @endif
    <div class="page-clients __index">
        <h1>{{__('Clients')}}</h1>
        <div class="clients">
            <table id="dtBasicExample" class="table">
                <thead>
                <tr>
                    <th><i class="fi fi-rr-money-check"></i> {{__('Name')}}</th>
                    <th><i class="fi fi-rr-phone-call"></i> {{__('Phone')}}</th>
                    <th><i class="fi fi-rr-envelope"></i> {{__('E-mail')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>
                            <a href="{{route('client.edit',[$client->id])}}">{{$client->name}}</a>
                        </td>
                        <td>
                            <a href="tel:{{$client->phone}}">{{$client->phone}}</a>
                        </td>
                        <td>
                            <a href="mailto:{{$client->email}}?subject=Mail from employee">{{$client->email}}</a>
                        </td>
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

        new DataTable('#dtBasicExample', {
            dom: `
            <"actions"b>
            <"pagination"ip>
            <"filters"lf>
            <"table"t>
            <"pagination"ip>
            `,
            searchDelay: 1500,
            lengthMenu: [[3, 25, 50, -1], [3, 25, 50, "All"]],
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
