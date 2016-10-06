@extends('layouts.master')
@section('title', 'Manage Locations')
@section('content')

    <div class="container marketing">
        <div class="row">
            <div class = "create_button">
                <a class="btn btn-success create-form" href="#create"> Create New Product</a>
            </div>
        </div>

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

        <!------------- FORM -------->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Theatre id</strong>
                        {!! Form::text('t_id', null, array('placeholder' => '123','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <!-- duration could get from movie time? --->
                        <strong>Location</strong>
                        {!! Form::text('location', null, array('placeholder' => 'The moon','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <!-- duration could get from movie time? --->
                        <strong>Number of seats</strong>
                        {!! Form::text('seats', null, array('placeholder' => '0','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

<table class="admin_tables" align="center">
    <tr>
        <th>ID</th>
        <th>Location</th>
        <th>No. seats</th>
        <th>Action</th>
    </tr>
    @foreach ($locations as $location)
        <tr>
            <td>{{ $location->t_id }}</td>
            <td>{{ $location->location }}</td>
            <td>{{ $location->seats }}</td>
            <td><a class="btn btn-primary" href="{{ route('admin_locations.edit',$location->t_id) }}">Edit</a>
                {!! Form::open(['method' => 'DELETE','route' => ['admin_locations.destroy', $location->t_id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}</td>
        </tr>
    @endforeach
</table>
</div>
@endsection