@extends('layouts.master')
@section('title', 'Manage Locations')
@section('content')

    <div id = "edit-theatre">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Theatre details </h2>
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
        {!! Form::model($location, ['method' => 'PATCH','route' => ['admin_locations.update', $location->id]]) !!}
        @include('admin.forms.theatre_form')
        {!! Form::close() !!}
    </div>

@endsection