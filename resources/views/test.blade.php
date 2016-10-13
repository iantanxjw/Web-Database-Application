@extends('layouts.master')
@section('title', 'Summary')
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

