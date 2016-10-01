@extends('layouts.master')
@section('title', 'Movie management')
@section('content')

<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Overview</th>
        <th>Release date</th>
        <th>Genre</th>
        <th>Poster</th>
        <th>Background</th>
        <th>Action</th>
    </tr>
    @foreach($movieObjects as $movie)
        <tr>
            <td>{{ $movie->getID() }}</td>
            <td>{{ $movie->getTitle() }}</td>
            <td>{{ $movie->getDescription() }}</td>
            <td>{{ $movie->getReleaseDate() }}</td>
            <td>{{ $movie->getGenre() }}</td>
            <td>{{ $movie->getPoster() }}</td>
            <td>{{ $movie->getBackground() }}</td>
            <td>let's break some shit</td>
        </tr>
    @endforeach

</table>

@endsection