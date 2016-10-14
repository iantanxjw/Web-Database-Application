@extends('layouts.master')
@section('title', 'Booking Movie')
@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Bookings</div>
            <div class="panel-body">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Ticket</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('booking_tickets.index') }}"> Back</a>
        </div>
    </div>
</div>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{!! Form::model($ticket, ['method' => 'PATCH','route' => ['booking_tickets.update', $ticket->id]]) !!}
    {{ csrf_field() }}
    <input type='hidden' value='{{$ticket->booking_id}}' name='booking_id'>
    @include('ticket_form')
{!! Form::close() !!}
    </div>
    </div>
    </div>
@endsection