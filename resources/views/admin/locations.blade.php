@extends('layouts.master')
@section('title', 'Manage Locations')
@section('content')

<table>
    <tr>
        <th>ID</th>
        <th>Location</th>
        <th>No. seats</th>
        <th>Action</th>
    </tr>
    @foreach ($locations as $location)
        <tr>
            <td>{{ $location->t_id }}</td>
            <td>{{ $location->location }}</td>
            <td>{{ $location->seats }}</td>
            <td>let's break some shit</td>
        </tr>
    @endforeach
</table>

@endsection