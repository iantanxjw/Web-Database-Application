@extends('layouts.master')
@section('title', 'Manage Users')
@section('content')
    <div class="container">
                <div class="panel panel-default">
                    <div class="panel-heading">User Management</div>
                    <div class="panel-body">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <!-- Start of edit theare div -->

                        <!-- End of edit theatre div -->

                        <!--Table showing content -->
                        <table class="admin_tables" align="center">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    {{-- HOW TO BREAK USER SECURITY LOLOLOLOL --}}
                                    <td>{{ $user->password }}</td>
                                    <td><a class="btn btn-primary" href="{{ route('admin_users.edit',$user->id) }}">Edit</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['admin_users.destroy', $user->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
    </div>

@endsection