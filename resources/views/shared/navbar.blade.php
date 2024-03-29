{{-- NEW TEMPLATE BASED NAV --}}
@extends('layouts.navbar_template')
@section('header')
    <a class="navbar-brand" href="{{ route('index') }}">Mavericks Inc</a>
@endsection

@section('left_links')
    <li><a href="{!! route('index') !!}">Home</a></li>
    <li><a href="{!! route('search') !!}">Search</a></li>

        <li class="dropdown" id="adminHide">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="{{ route('admin_movies.index') }}">Movie management</a></li>
                <li><a href="{{ route('admin_sessions.index') }}">Session management</a></li>
                <li><a href="{{ route('admin_theatres.index') }}">Theatre managment</a></li>
                <li><a href="{{ route('admin_users.index') }}">User management</a></li>
            </ul>
        </li>

@endsection

@section('right_links')
<!-- Authentication Links -->
    @if (Auth::guest())
        <li><a href="{{ url('/login') }}">Login</a></li>
        <li><a href="{{ url('/register') }}">Register</a></li>
    @else
        <li ><a href="{!! route('booking_tickets.index') !!}"><span class="icon-cart" ></span></a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                My Account <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <span id="hidden">{{ Auth::user()->admin }}</span>
                <!--<li id="showHidden"></li>-->
                <li style ="text-align: center"><a>
                {!! Form::open(['method' => 'PATCH','route' => ['admin_users.update', Auth::user()->id]]) !!}
                <input type="hidden" name="source" value="1">
                {!! Form::submit('', ['class' => 'icon-star-full']) !!}
                {!! Form::close() !!}
                </a></li>
                <li><a>{{ Auth::user()->name }}</a></li>
                <li><a href="{!! route('bookings.index') !!}">My Bookings </a></li>
                <li><a href="{!! route('WishlistCRUD.index') !!}">My Watchlist</a></li>
                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
            </ul>
        </li>
    @endif


@endsection