@extends('layouts.master')
@section('title', 'Movie management')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Movies Management</div>
    <div class="panel-body">
        <div>
            <a href="#add-movie" class="btn btn-primary show-form">Add movie</a>
            <a href="{{route ('api_refresh') }}" class="btn btn-primary">Populate DB with API call</a>
        </div>
        <div class="create-form">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Add New Movie</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary create-back" href="#back"> Back</a>
                    </div>
                </div>
            </div>
            {{ Form::open(['route' => 'admin_movies.create', 'method' => 'POST']) }}
                @include('admin.forms.movie_form')
            {{ Form::close() }}
        </div>

        <table class="admin_tables" align="center">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Overview</th>
                <th>Release date</th>
                <th>Vote average</th>
                <th>Status</th>
                <th>Genre</th>
                <th>Poster</th>
                <th>Background</th>
                <th>Action</th>
            </tr>
            @foreach ($movieObjects as $movie)
                <tr>
                    <td>{{ $movie->getID() }}</td>
                    <td>{{ $movie->getTitle() }}</td>
                    <td>{{ $movie->getDescription() }}</td>
                    <td>{{ $movie->getReleaseDate() }}</td>
                    <td>{{ $movie->getVoteAvg() }}</td>
                    <td>{{ $movie->getStatus() }}</td>
                    <td>
                        @if (is_array($movie->getGenre()))
                            @foreach ($movie->getGenre() as $genre)
                                <p>{{ $genre }}</p>
                            @endforeach
                        @else
                            {{ $movie->getGenre() }}
                        @endif
                    </td>
                    <td>{{ $movie->getPoster() }}</td>
                    <td>{{ $movie->getBackground() }}</td>
                    <td><a class="btn btn-primary" href="{{ route('admin_movies.edit', $movie->getID()) }}">Edit</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['admin_movies.destroy', $movie->getID()],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection