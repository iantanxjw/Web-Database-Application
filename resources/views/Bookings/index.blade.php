@extends('layouts.master')
@section('title', 'Bookings')
@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Bookings</div>
            <div class="panel-body">

    <div class="booking_summary">
        <table align="center">
            <?php
            $currMovie = "";
            ?>
            @foreach ($tickets as $ticket)
                @if ($currMovie != $ticket->getBookingID()))
                <tr><th colspan="2"> {{$ticket->getTitle()}} <br> {{$ticket->getWeekday()}} <br> {{$ticket->getStartTime()}}</th></tr>
                <?php
                $currMovie = $ticket->getBookingID();
                ?>
                @endif
                    <tr>
                    <td>{{ $ticket->getType() }}</td>
                    <td>{{ $ticket->getQty() }}</td>
                </tr>
            @endforeach
        </table>
    </div>
            </div>
        </div>
    </div>

@endsection