@extends('layouts.main')

@section('content')


    <aside>aside</aside>
    <nav>navigation</nav>
    <main class="container">
        <h1>WELCOME TO ADMIN PANEL</h1>

        <a href="{{route('user.logout')}}">Logout _permanent</a>

    </main>



@endsection



