@extends('layouts.master')
@section('title', 'Booking Movie')
@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Bookings</div>
            <h2>Movie: {{$movie->title}}</h2>
            <h2>Session time: {{$session->weekday}} {{$session->start_time}}</h2>
            <div class="panel-body">
                    <!-- Text field for theatre number -->
                <div class="row">
                    <form name = "myForm" method="post" action="{{route('admin_sessions.store')}}">
                    <!-- Text field for location name  -->
                        {{ csrf_field() }}
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <!-- duration could get from movie time? --->
                            <strong>Adult</strong>
                            {!! Form::number('adult', 0, array( 'id' => 'Adult','class' => 'form-control', 'max' => '10','min'=>'0')) !!}
                        </div>
                    </div>

                    <!-- Text field for Number of seats  -->
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <!-- duration could get from movie time? --->
                            <strong>Child</strong>
                            {!! Form::number('child', 0, array('id' => 'Child','class' => 'form-control', 'max' => '10','min'=>'0')) !!}
                        </div>
                    </div>

                    <!-- Text field for Number of seats  -->
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <!-- duration could get from movie time? --->
                            <strong>Concession/Student</strong>
                            {!! Form::number('concession', 0, array('id' => 'Student','class' => 'form-control', 'max' => '10','min'=>'0')) !!}
                        </div>
                    </div>

                    <!-- Text field for Number of seats  -->
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <!-- duration could get from movie time? --->
                            <strong>Seniors</strong>
                            {!! Form::number('senior', 0, array('id' => 'Senior','class' => 'form-control', 'max' => '10','min'=>'0')) !!}
                        </div>
                    </div>

                    <!-- Submit button for form -->
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" id = "btn2" class="btn btn-primary">Submit</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection