@extends('layouts.master')
@section('title', 'Movie management')
@section('content')

    <div class="container">
                <div class="panel panel-default">
                    <div class="panel-heading">Movies Management</div>
                    <div class="panel-body">


                        <div class = "create_button">
                            <a class="btn btn-success create-form" href="#create"> Create New Theatre</a>
                        </div>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

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
                                    <td style="width:150px">{{ $movie->getTitle() }}</td>
                                    <td style="width:250px">{{ $movie->getDescription() }}</td>
                                    <td>{{ $movie->getReleaseDate() }}</td>
                                    <td>{{ $movie->getVoteAvg() }}</td>
                                    <td>{{ $movie->getStatus() }}</td>
                                    <td>
                                        @if (is_array($movie->getGenre()) === true)
                                            @foreach ($movie->getGenre() as $genre)
                                                <p>{{ $genre }}</p>
                                            @endforeach
                                        @else
                                            {{ $movie->getGenre() }}
                                        @endif
                                    </td>
                                    <td style="width:150px; word-wrap: break-word;word-break: break-all;table-layout: fixed;">
                                        {{ $movie->getPoster() }}</td>
                                    <td style="width:150px; word-wrap: break-word;word-break: break-all;table-layout: fixed;">
                                        {{ $movie->getBackground() }}</td>
                                    <td><a class="btn btn-primary" href="{{ route('admin_movies.edit',$movie->id) }}">Edit</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['admin_movies.destroy', $movie->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
    </div>

<div class="panel panel-default">
    <div class="panel-heading">Movies Management</div>
    <div class="panel-body">
        <div class="links">
            <a href="#add-movie" class="btn btn-primary show-form">Add movie</a>
            <a href="{{route ('api_refresh') }}" class="btn btn-primary">Populate DB with API call</a>
        </div>

        {{-- Add a movie form --}}
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
            {{ Form::open(['route' => 'admin_movies.store', 'method' => 'POST']) }}
                @include('admin.forms.movie_form')
            {{ Form::close() }}
        </div>

        {{-- Edit movie form --}}
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
                    @include('admin.forms.movie_form');
                </form>
            </div>
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
                    {{-- give each edit btn the id so js can request the details --}}
                    <td><a class="btn btn-primary show-edit" data-id="{{ $movie->getID() }}">Edit</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['admin_movies.destroy', $movie->getID()],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection