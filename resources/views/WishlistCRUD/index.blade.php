@extends('layouts.master')
@section('title', 'About')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ Auth::user()->name }}'s watchlist</div>
                    <div class="panel-body">
                        <div class="col-md-8 col-md-offset-2">


                            <table>
                                <th class="col-md-1">No</th>
                                <th class="col-md-4">Movie Name</th>
                                <!--<th>USER ID</th>-->
                                <th class="col-md-1">Delete</th>

                            @foreach ($wishlists as $wishlist)

                                    <tr>
                                        <td class="col-md-1">{{ ++$i }}</td>
                                        <td class="col-md-4">{{ $wishlist->mv_name}}</td>
                                        <!--<td>{{ $wishlist->u_id}}</td>-->
                                        <td class="col-md-1">
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