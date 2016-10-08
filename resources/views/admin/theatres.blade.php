@extends('layouts.master')
@section('title', 'Manage Locations')
@section('content')

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Theatre Management</div>
        <div class="panel-body">

            <!-- Creating Theatre div -->
            <div class="create-form">
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
                {!! Form::open(array('route' => 'admin_theatres.store','method'=>'POST')) !!}
                @include('admin.forms.theatre_form')
                {!! Form::close() !!}
            </div>

            <!-- End of Create theatre div -->

            <!-- Start of edit theare div -->
            <div class="edit-form">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Editing</h2>
                        </div>
                        <div class="pull-right"><a href="#back" class="btn btn-primary create-back">Back</a>
                        </div>
                    </div>
                    {{-- need to define form manually --}}
                    <form method="POST">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token"
                        value={{ csrf_token() }}>
                        @include('admin.forms.theatre_form');
                    </form>
                </div>
            </div>

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
                        <td><a class="btn btn-primary show-edit" data-id="{{ $location->id }}">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['admin_theatres.destroy', $location->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}</td>
                    </tr>
                @endforeach
            </table>
            <div class = "create_button">
                <a class="btn btn-success show-form" href="#create"> Create New Theatre</a>
            </div>

        </div>
    </div>

</div>
@endsection