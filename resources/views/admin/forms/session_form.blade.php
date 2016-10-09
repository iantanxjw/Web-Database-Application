<!-- FORM -->
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Start-time:</strong>
            {!! Form::time('start_time', null, array('placeholder' => 'Select the Start Time','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <!-- duration could get from movie time? -->
            <strong>Duration</strong>
            {!! Form::number('duration', null, array('placeholder' => 'Enter duration of movie in minutes','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Number of bookings made: </strong>
            {!! Form::number('num_bookings', null, array('placeholder' => 'Enter Number of bookings made','class' => 'form-control',
            'min'=>'0')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <!-- Needs validation -->
            <strong>Movie id: </strong>
            {!! Form::number('mv_id', null, array('placeholder' => 'Enter movie id','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <!-- Needs validation -->
            <strong>Theatre id: </strong>
            {!! Form::number('t_id', null, array('placeholder' => 'Enter theatre id','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>