@extends('layouts.master')
@section('title', 'Admin')
@section('content')
<ul>
    <li><a href="{{ route('add_movie') }}">Add Movie</a></li>
    <li><a href="{{ route('remove_movie') }}">Remove Movie</a></li>
    <li><a href="{{ route('add_session')}}">Add Session</a></li>
    <li><a href="{{ route('remove_session') }}">Remove Session</a></li>
    <li><a href="{{ route('api_refresh') }}">Populate DB from API</a></li>
</ul>
@endsection('content')