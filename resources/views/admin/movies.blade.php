@extends('layouts.master')
@section('title', 'Movie management')
@section('content')

<table>
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
            <td>let's break some shit</td>
        </tr>
    @endforeach

</table>

@endsection