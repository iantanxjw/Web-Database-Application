@extends('layouts.master')
@section('title', 'Bookings')
@section('content')

    <div class="booking_summary">
        <table align="center">
            @foreach ($tickets as $ticket)
                <tr><th> {{$ticket->getTitle()}} <br> {{$ticket->getWeekday()}} <br> {{$ticket->getStartTime()}}</th>
                <th>{!! Form::open(['method' => 'DELETE','route' => ['bookings.destroy', $ticket->getBookingID()],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}</th></tr>
                <tr>
                    <td>{{ $ticket->getType() }}</td>
                    <td>{{ $ticket->getQty() }}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection