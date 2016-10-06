@extends('layouts.master')
@section('title', 'Admin')
@section('content')

@include('shared.messages')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                        <ul class ="manage_list"style = "list-style: none; ">
                            <li><a class="btn btn-primary btn-block" href="{{ route('admin_movies') }}">Movie management</a></li>
                            <li><a class="btn btn-primary btn-block" href="{{ route('admin_sessions') }}">Session management</a></li>
                            <li><a class="btn btn-primary btn-block" href="{{ route('admin_users') }}">User management</a></li>
                            <li><a class="btn btn-primary btn-block" href="{{ route('admin_locations') }}">Location management</a></li>
                            {{-- <li><a href="{{ route('add_movie') }}">Add Movie</a></li>
                            <li><a href="{{ route('remove_movie') }}">Remove Movie</a></li>
                            <li><a href="{{ route('add_session')}}">Add Session</a></li>
                            <li><a href="{{ route('remove_session') }}">Remove Session</a></li> --}}
                            <li><a class="btn btn-primary" href="{{ route('api_refresh') }}">Populate DB from API</a>!!Temporary!! move to movie management</li>
                        </ul>
                </div> <!-- panel body div -->
            </div><!-- panel div -->
        </div> <!-- col div -->
    </div> <!-- row div -->
</div> <!-- container div -->

@endsection
