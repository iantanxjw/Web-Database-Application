@extends('layouts.master')
@section('title', 'Manage sessions')
@section('content')
    <div class="container marketing">
    <div class="row">
        <a class="btn btn-success create-form" href="#create"> Create New Product</a>
    </div>

    <div id="create-session">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Add New Session</h2>
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
        {!! Form::open(array('route' => 'admin_sessions.store','method'=>'POST')) !!}

        <!------------- FORM -------->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Start-time:</strong>
                    {!! Form::text('start_time', null, array('placeholder' => 'Start-Time','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <!-- duration could get from movie time? --->
                    <strong>Duration</strong>
                    {!! Form::text('duration', null, array('placeholder' => 'Duration of movie in minutes','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Number of bookings made: </strong>
                    {!! Form::number('num_bookings', null, array('placeholder' => '0','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <!-- Needs validation --->
                    <strong>Movie id: </strong>
                    {!! Form::text('mv_id', null, array('placeholder' => 'movie id','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <!-- Needs validation --->
                    <strong>Theatre id: </strong>
                    {!! Form::text('t_id', null, array('placeholder' => 'theatre id','class' => 'form-control')) !!}
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
<table>
    <tr>
        <th>ID</th>
        <th>Start time</th>
        <th>Duration</th>
        <th>No. bookings</th>
        <th>Movie ID</th>
        <th>Theatre ID</th>
        <th>Action</th>
    </tr>
    @foreach ($sessions as $session)
        <th>
            <td>{{ $session->id }}</td>
            <td>{{ $session->start_time }}</td>
            <td>{{ $session->duration }}</td>
            <td>{{ $session->num_bookings }}</td>
            <td>{{ $session->mv_id }}</td>
            <td>{{ $session->t_id }}</td>
            <td></td>
        </th>
    @endforeach
</table>

    </div>

@endsection