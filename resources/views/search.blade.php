@extends('layouts.master')
@section('title', 'Search')
@section('content')

{{ Form::open(['id' => 'search-form']) }}
    @include('forms.search_form')
{{ Form::close() }}

<div class="container marketing">
    <div id="search-result" class="row"></div>
</div>

@include('shared.modal')

@endsection