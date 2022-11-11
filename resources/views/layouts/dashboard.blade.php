@extends('layouts.main')

@section('content')


    <aside>
        <a href="{{route('dashboard.calendar')}}">Calendar _permanent</a>
        <a href="{{route('user.logout')}}">Logout _permanent</a>
    </aside>
    <main class="container">
        <div class="page-dashboard">
            @yield('dashboard.content')
        </div>
    </main>


@endsection
