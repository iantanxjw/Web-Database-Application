@extends('layouts.master')
@section('title', 'DB update')
@section('content')

{{ Form::open(['url' => 'updatedb', 'method' => 'POST']) }}
@include('admin.forms.api_refresh_form')
{{ Form::close() }}

@endsection('content')