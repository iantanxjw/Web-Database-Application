@extends('layouts.master')
@section('title', 'Movie management')
@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">Movies Management</div>
                    <div class="panel-body">

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
                                    <td>{{ $movie->getTitle() }}</td>
                                    <td>{{ $movie->getDescription() }}</td>
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
                                    <td>{{ $movie->getPoster() }}</td>
                                    <td>{{ $movie->getBackground() }}</td>
                                    <td><a class="btn btn-primary" href="{{ route('admin_movies.edit',$movie->id) }}">Edit</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['admin_movies.destroy', $movie->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}</td>
                                </tr>
                            @endforeach
                        </table>

                        <div class = "create_button">
                            <a class="btn btn-success create-form" href="#create"> Create New Theatre</a>
                        </div>
                    </div>
                </div>

@endsection