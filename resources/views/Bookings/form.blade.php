@extends('layouts.master')
@section('title', 'Cart Page')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Personal Details</div>
                    <div class="panel-body">
                        <div class="booking_summary">
                            <table align="center">
                                @foreach ($tickets as $ticket)
                                    <tr><th colspan="2"> {{$ticket->getTitle()}} <br> {{$ticket->getWeekday()}} <br> {{$ticket->getStartTime()}}</th>
                                        <th>{!! Form::open(['method' => 'DELETE','route' => ['bookings.destroy', $ticket->getBookingID()],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}</th></tr>
                                    <tr>
                                        <td>{{ $ticket->getType() }}</td>
                                        <td>{{ $ticket->getQty() }}</td>
                                        <td><a class="btn btn-primary show-edit" data-id="{{ $ticket->getId() }}">Edit</a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['booking_tickets.destroy', $ticket->getId()],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <a class ="btn btn-success pay_button">Pay</a>
                        <div class = "checkout">
                        {!! Form::open( ['class'=>'form-horizontal','method' => 'PATCH','route' => ['admin_users.update',Auth::user()->id]]) !!}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="Name" class="col-md-4 control-label">Name:</label>
                                <div class="col-md-4">

                                    <input class="form-control" value="{{ Auth::user()->name }}" type="text" id="Name" name="name">


                                </div>
                                <span id="eName"></span>
                            </div>

                            <div class="form-group">
                                <label for="Address" class="col-md-4 control-label">Address:</label>
                                <div class="col-md-4">
                                    <input class="form-control" placeholder ="124 La Trobe St, Melbourne" type="text" id="Address" name ="address">

                                </div>
                                <span id="eAdd"></span>
                            </div>

                            <div class="form-group">
                                <label for="Suburb" class="col-md-4 control-label">Suburb:</label>
                                <div class="col-md-4">
                                    <input class="form-control" placeholder ="Carlton" type="text" id="Suburb" name="suburb">

                                </div>
                                <span id="eSub"></span>
                            </div>

                            <div class="form-group">
                                <label for="Post code" class="col-md-4 control-label">Post Code:</label>
                                <div class="col-md-4">
                                    <input class="form-control" placeholder="1111" type="text" id="PCode" name="pcode">

                                </div>
                                <span id="ePCode"></span>
                            </div>

                            </br></br>

                            <span> Payment Details </span>
                            <hr>

                            <div class="form-group">
                                <label for="Credit Card" class="col-md-4 control-label">Credit Card:</label>
                                <div class="col-md-4">

                                    <input class="form-control" placeholder="XXXX-XXXX-XXXX-XXXX" type="text" id="CreditCard" name ="card">

                                </div>
                                <span id="eCard"></span>
                            </div>

                            <div class="form-group">
                                <label for="Expiry Date" class="col-md-4 control-label">Expiry Date:</label>
                                <div class="col-md-4">

                                    <input class="form-control" placeholder="MM/YY" type="text" id="ExpDate" name="expdate">

                                </div>
                                <span id="eExp"></span>
                            </div>
                            <a class ="btn btn-success pay_button">Confirm</a>
                                    <input type="hidden" name="source" value="0">
                            <div class="col-md-5 col-md-offset-4">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your details with anyone else.</small>
                            </div>
                            </br></br>
                            <div class="form-group">
                                <div class="col-md-5 col-md-offset-5">

                                    <input id="btn1" type="submit"> <!-- <button id="btn1" >Submit</button> -->
                                </div>
                            </div>
                        {!! Form::close() !!}
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
