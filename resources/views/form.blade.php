@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Personal Details</div>
                        <div class="panel-body">
                        <form class="form-horizontal" action="{!! route('test') !!}" method = "POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Name:</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" id="Name" name="name">
                                </div>
                                <span id="eName"></span>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Address:</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" id="Address" name ="address">
                                </div>
                                <span id="eAdd"></span>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Suburb:</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" id="Suburb" name="suburb">
                                </div>
                                <span id="eSub"></span>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Post Code:</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" id="PCode" name="pcode">
                                </div>
                                <span id="ePCode"></span>
                            </div>

                            </br></br>

                                <span> Payment Details </span>
                            <hr>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Credit Card:</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" id="CreditCard" name ="card">
                                </div>
                                <span id="eCard"></span>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Expiry Date:</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" id="ExpDate" name="expdate">
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
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
