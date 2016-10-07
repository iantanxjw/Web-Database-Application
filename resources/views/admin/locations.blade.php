@extends('layouts.master')
@section('title', 'Manage Locations')
@section('content')

    <div class="container">
                <div class="panel panel-default">
                    <div class="panel-heading">Theatre Management</div>
                    <div class="panel-body">

                        <!-- Creating Theatre div -->
                        <div id="create-theatre">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <h2>Add New Theatre</h2>
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-primary create-back" href="#back"> Back</a>
                                    </div>
                                </div>
                            </div>
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            {!! Form::open(array('route' => 'admin_locations.store','method'=>'POST')) !!}
                            @include('admin.forms.theatre_form')
                            {!! Form::close() !!}
                        </div>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <!-- End of Create theatre div -->

                        <!-- Start of edit theare div -->

                        <!-- End of edit theatre div -->

                        <!--Table showing content -->
                        <table class="admin_tables" align="center">
                            <tr>
                                <th>ID</th>
                                <th>Theatre no.</th>
                                <th>Location</th>
                                <th>No. seats</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($locations as $location)
                                <tr>
                                    <td>{{ $location->id }}</td>
                                    <td>{{ $location->theatre_num }}</td>
                                    <td>{{ $location->location }}</td>
                                    <td>{{ $location->seats }}</td>
                                    <td><a class="btn btn-primary" href="{{ route('admin_locations.edit',$location->id) }}">Edit</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['admin_locations.destroy', $location->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}</td>
                                </tr>
                            @endforeach
                        </table>
                        <div class = "create_button">
                            <a class="btn btn-success create-form" href="#create"> Create New Theatre</a>
                        </div>

                    </div>
                </div>

    </div>
@endsection