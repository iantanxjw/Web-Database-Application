@extends('layouts.master')
@section('title', 'Summary')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Summary</div>
                    <div class="panel-body">
                        <table align="center">
                        @foreach ($tickets as $ticket)
                            <tr>
                                <th> {{$ticket->getWeekday()}} </th>
                                <th> {{$ticket->getStartTime()}}</th>
                                <th> {{$ticket->getTitle()}}</th>
                            </tr>
                            <tr>
                                <td>{{ $ticket->getType() }}</td>
                                <td>{{ $ticket->getQty() }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                        </table>
                        <div class="receipt">
                            <div class="receipt-heading">
                                Ticket Details
                            </div>
                            <div class="receipt-body">
                            <hr>

                                <div>NAME:   {{ ($user->name) }}</div>
                                <div>Address:{{ ($user->address) }}</div>
                                <div>Suburb: {{ ($user->suburb) }}</div>
                                <div>Pcode:  {{ ($user->postcode) }}</div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

