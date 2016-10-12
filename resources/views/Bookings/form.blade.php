@extends('layouts.master')
@section('title', 'Cart Page')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Personal Details BOOKINGS</div>
                    <div class="panel-body">
                        {!! Form::open(array('route' => ['test'/*,'{{ Auth::user()->name }}'*/],'class'=>'form-horizontal','method'=>'POST')) !!}
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

@endsection