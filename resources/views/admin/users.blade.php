@extends('layouts.master')
@section('title', 'Manage Users')
@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">User Management</div>
        <div class="panel-body">

            {{-- Add a user form --}}
            <div class="create-form">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Add New User</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary create-back" href="{{ route('admin_users.index') }}"> Back</a>
                        </div>
                    </div>
                </div>
                {{ Form::open(['route' => 'admin_users.store', 'method' => 'POST']) }}
                    @include('admin.forms.user_form')
                {{ Form::close() }}
            </div>

            {{-- Edit user form --}}
            <div class="edit-form">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Editing</h2>
                        </div>
                        <div class="pull-right"><a href="{{ route('admin_users.index') }}" class="btn btn-primary create-back">Back</a>
                        </div>
                    </div>
                    {{-- need to define form manually --}}
                    <form method="POST">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token"
                        value={{ csrf_token() }}>
                        @include('admin.forms.user_form');
                    </form>
                </div>
            </div>

            <!--Table showing content -->
            <table class="admin_tables" align="center">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Admin</th>
                    <th>Address</th>
                    <th>Suburb</th>
                    <th>Post Code</th>
                    <th>Action</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        {{-- HOW TO BREAK USER SECURITY LOLOLOLOL --}}
                        <td>{{ $user->password }}</td>
                        <td>{{ $user->admin }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->suburb }}</td>
                        <td>{{ $user->postcode }}</td>
                        <td><a class="btn btn-primary show-edit" data-id="{{ $user->id }}">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['admin_users.destroy', $user->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}</td>
                    </tr>
                @endforeach
            </table>
            <div class = "create_button">
                <a class="btn btn-success show-form" href="#create"> Create New User</a>
            </div>
        </div>
    </div>
</div>

@endsection