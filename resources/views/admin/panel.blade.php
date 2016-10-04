@extends('layouts.master')
@section('title', 'Admin')
@section('content')

@include('shared.messages')

<ul>
    <li><a href="{{ route('admin_movies') }}">Movie management</a></li>
    <li><a href="{{ route('admin_sessions') }}">Session management</a></li>
    <li><a href="{{ route('admin_users') }}">User management</a></li>
    <li><a href="{{ route('admin_locations') }}">Location management</a></li>
    {{-- <li><a href="{{ route('add_movie') }}">Add Movie</a></li>
    <li><a href="{{ route('remove_movie') }}">Remove Movie</a></li>
    <li><a href="{{ route('add_session')}}">Add Session</a></li>
    <li><a href="{{ route('remove_session') }}">Remove Session</a></li> --}}
    <li><a href="{{ route('api_refresh') }}">Populate DB from API</a>!!Temporary!! move to movie management</li>
</ul>

@endsection
