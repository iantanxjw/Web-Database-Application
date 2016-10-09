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


@endsection