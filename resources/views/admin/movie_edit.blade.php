@extends('layouts.master')
@section('title', 'Edit ' . $movie->id)
@section('content')

<h2>Editing: {{ $movie->title }}</h2>
<a href="{{ route('admin_movies.index') }}" class="btn btn-primary">Back</a>

<div class='edit-form'>
    {{ Form::model($movie, ['route' => ['admin_movies.update', $movie->id], 'method' => 'PATCH']) }}
    @include('admin.forms.movie_edit_form')
    {{ Form::close() }}
</div>

@endsection