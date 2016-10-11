@extends('layouts.master')
@section('title', 'Manage sessions')
@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Session Management</div>
        <div class="panel-body">

            <!-- create sessions div -->
            <div class="create-form">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Add New Session</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary create-back" href="{{ route('admin_sessions.index') }}"> Back</a>
                        </div>
                    </div>
                </div>
                {!! Form::open(array('route' => 'admin_sessions.store','method'=>'POST')) !!}
                @include('admin.forms.session_form')
                {!! Form::close() !!}
            </div>

            <!-- end of create session section -->

            {{-- Edit session form --}}
            <div class="edit-form">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Editing</h2>
                        </div>
                        <div class="pull-right"><a href="{{ route('admin_sessions.index') }}" class="btn btn-primary create-back">Back</a>
                        </div>
                    </div>
                    {{-- need to define form manually --}}
                    <form method="POST">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token"
                        value={{ csrf_token() }}>
                        @include('admin.forms.session_form');
                    </form>
                </div>
            </div>

            <table class="admin_tables" align="center">
                <tr>
                    <th>ID</th>
                    <th>Weekday</th>
                    <th>Start time</th>
                    <th>Duration</th>
                    <th>No. bookings</th>
                    <th>Movie ID</th>
                    <th>Theatre ID</th>
                    <th>Action</th>
                </tr>
                @foreach ($sessions as $session)
                    <tr>
                        <td>{{ $session->id }}</td>
                        <td>{{ $session->weekday }}</td>
                        <td>{{ $session->start_time }}</td>
                        <td>{{ $session->duration }}</td>
                        <td>{{ $session->num_bookings }}</td>
                        <td>{{ $session->mv_id }}</td>
                        <td>{{ $session->t_id }}</td>
                        <td><a class="btn btn-primary show-edit" data-id="{{ $session->id }}">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['admin_sessions.destroy', $session->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}</td>
                    </tr>
                @endforeach
            </table>
            <div class="create_button">
                <a class="btn btn-success show-form" href="#create"> Create New Session</a>
            </div>

        </div>
    </div>
</div>
@endsection