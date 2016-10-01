@extends('layouts.master')
@section('title', 'Manage sessions')
@section('content')

<table>
    <tr>
        <th>ID</th>
        <th>Start time</th>
        <th>Duration</th>
        <th>No. bookings</th>
        <th>Movie ID</th>
        <th>Theatre ID</th>
        <th>Action</th>
    </tr>
    @foreach ($sessions as $session)
        <th>
            <td>{{ $session->id }}</td>
            <td>{{ $session->start_time }}</td>
            <td>{{ $session->duration }}</td>
            <td>{{ $session->num_bookings }}</td>
            <td>{{ $session->mv_id }}</td>
            <td>{{ $session->t_id }}</td>
            <td>let's break some shit</td>
        </th>
    @endforeach
</table>

@endsection