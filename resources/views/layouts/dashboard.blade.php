@extends('layouts.main')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>


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
