@extends('layouts.main')

@section('content')
    <div class="layout">
        <aside>
            <x-navigation>
            </x-navigation>
        </aside>
        <main>
            <div class="container page-dashboard">
                @yield('dashboard.content')
            </div>
        </main>
    </div>
@endsection
