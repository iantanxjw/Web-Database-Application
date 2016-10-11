@extends('layouts.master')
@section('title', 'DB update')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Api requests Management</div>
            <div class="panel-body" style="text-align: center">
                    {{ Form::open(['url' => 'updatedb', 'method' => 'POST']) }}
                    @include('admin.forms.api_refresh_form')
                    {{ Form::close() }}
            </div>
        </div>
    </div>
        </div>
    </div>

@endsection('content')