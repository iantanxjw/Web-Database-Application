@extends('layouts.master')
@section('title', 'Booking Movie')
@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Bookings</div>
            <h2>Movie: {{$movie->title}}</h2>
            <h4>Session time: {{$session->weekday}} {{$session->start_time}}</h4>
            <div class="panel-body">
                    <!-- Text field for theatre number -->
                <div class="row">
                    <form name = "myForm" method="POST" action="{{route('booking_tickets.store')}}" id="commentForm" onsubmit="return validateForm()">
                        {{ csrf_field() }}
                        <input type='hidden' value='{{$booking->id}}' name='booking_id'>
                        @include('ticket_form')
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection