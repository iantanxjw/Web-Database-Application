@extends('layouts.master')
@section('title', 'Manage Users')
@section('content')

<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Action</th>
    </tr>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            {{-- HOW TO BREAK USER SECURITY LOLOLOLOL --}}
            <td>{{ $user->password }}</td>
            <td>let's break some shit</td>
        </tr>
    @endforeach
</table>

@endsection