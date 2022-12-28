@extends('layouts.dashboard')



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/b-2.3.3/fh-3.3.1/r-2.4.0/datatables.min.css"/>
<!-- Scripts -->
<script type="text/javascript" src="{{ asset('/access/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('/access/js/Table/datatables.js') }}"></script>

@section('dashboard.content')
    <div class="page-clients __index">
        <h1>{{__('Clients pages')}}</h1>

        {{--        {{$clients->links('components.pagination')}}--}}
        <table id="dtBasicExample" class="table table-striped table-bordered table-sm">
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
        <div class="clients">
            @foreach($clients as $client)
                {{--                @dump($client)--}}
                {{--                <div class="employee">--}}
                {{--                    <img class="employee__photo" src="{{$employee['avatar']?? asset('/access/images/no_avatar.png')}}" alt="{{$employee['name']}}">--}}
                {{--                    <p class="employee__name">{{$employee['name']}}</p>--}}
                {{--                    <p class="employee__position">{{$employee['position']}}</p>--}}
                {{--                    <a href="mailto:{{$employee['email']}}">{{$employee['email']}}</a>--}}
                {{--                    <a href="tel:{{$employee['phone']}}">{{$employee['phone']}}</a>--}}

                {{--                    <a class="btn" href="">--}}
                {{--                        <span> {{__('Scheduled')}}</span>--}}
                {{--                    </a>--}}
                {{--                    <a class="btn" href="{{route('employee.show',[$employee->id])}}" >--}}
                {{--                        <span>{{__('Edit')}}</span>--}}
                {{--                    </a>--}}
                {{--                </div>--}}
            @endforeach
            <a class="link __create"
               title="{{__('create')}}"
               href="{{route('client.create')}}">
                create
            </a>
        </div>

        {{--        {{$clients->links('components.pagination')}}--}}
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

    });

</script>
