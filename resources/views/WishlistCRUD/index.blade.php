@extends('layouts.master')
@section('title', 'About')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">My Wishlist</div>
                    <div class="panel-body">
                        <div class="col-md-8 col-md-offset-2">
                            <a class="btn btn-success" href="{{ route('WishlistCRUD.create') }}"> Add new items</a>

                            <div>Owned By : {{ Auth::user()->name }}</div>

                            <table>
                                <th>No</th>
                                <th>Movie Name</th>
                                <th>Reason</th>
                                <th>Email</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            @foreach ($wishlists as $wishlist)

                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $wishlist->movie}}</td>
                                        <td>{{ $wishlist->reason}}</td>
                                        <td>{{ $wishlist->email}}</td>
                                        <td><a class="btn btn-primary" href="{{ route('WishlistCRUD.edit',$wishlist->id) }}">Edit</a></td>
                                        <td>
                                        {!! Form::open(['method' => 'DELETE','route' => ['WishlistCRUD.destroy', $wishlist->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                        </td>
                                    </tr>

                            @endforeach
                            </table>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection