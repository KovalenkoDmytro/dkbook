@extends('layouts.dashboard')
@section('dashboard.content')

    <a href="{{route('services.create')}}" class="btn" title="create">{{_('Create')}}</a>
@endsection

