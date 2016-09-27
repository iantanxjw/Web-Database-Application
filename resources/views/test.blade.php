@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">CREDIT CARD VALIDATION</div>
                    <div class="panel-body">
                        <form name = "" action = "" method = "">
                        <p>Credit Card: </p>
                        <input type="text" id = "CardNo">

                        <p>Expiry Date: </p>
                        <input type="text" id = "ExpDate">
                    </form>
                        </br>
                    <button id="btn1" >Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script>
        $(function(){
            $("#btn1").click(function(){
                alert($("#CardNo").val())
            });
        });
    </script>
    @endsection
