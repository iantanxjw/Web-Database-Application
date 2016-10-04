@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Summary</div>
                    <div class="panel-body">
                        <div class="receipt">
                            <div class="receipt-heading">
                                Ticket Details
                            </div>
                            <div class="receipt-body">
                            <hr>
                                <?php

                                    echo "Name: " . $_POST["name"] . "<br>";
                                    echo "Address: " . $_POST["address"] .  "<br>";
                                    echo "Suburb: " . $_POST["suburb"] .  "<br>";
                                    echo "Post Code: " . $_POST["pcode"] .  "<br>";

                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

