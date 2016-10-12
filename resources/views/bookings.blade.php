@extends('layouts.master')
@section('title', 'Booking Movie')
@section
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Bookings</div>
            <h2>Session time: {{$session->weekday}} {{$session->start_time}}</h2>
            <div class="panel-body">
            </div>
        </div>
    </div>

@endsection