@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">PAYMENT PAGE</div>
                    <div class="panel-body">
                        <form class="form-horizontal" name = "" action = "" method = "">

                            <p>Name: </p>
                            <input type="text" id="Name">
                            </br></br>

                            <p>Address: </p>
                            <input type="text" id="Address">
                            </br></br>

                            <p>Suburb: </p>
                            <input type="text" id="Suburb">
                            </br></br>

                            <p>Post Code: </p>
                            <input type="text" id="PostCode">
                            </br></br>

                            <p>Mobile Number: </p>
                            <input type="text" id="PhoneNo">
                            </br></br>

                            <p>Credit Card: </p>
                            <input type="text" id = "CardNo">
                            </br></br>

                            <p>Expiry Date: </p>
                            <input type="text" id = "ExpDate">
                            </br></br>
                        </form>
                        </br>
                    <button id="btn1" >Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
