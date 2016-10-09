<!-- FORM -->
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Start-time:</strong>
            {!! Form::text('start_time', null, array('placeholder' => 'Start-Time','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <!-- duration could get from movie time? -->
            <strong>Duration</strong>
            {!! Form::text('duration', null, array('placeholder' => 'Duration of movie in minutes','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Number of bookings made: </strong>
            {!! Form::number('num_bookings', null, array('placeholder' => '0','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <!-- Needs validation -->
            <strong>Movie id: </strong>
            {!! Form::text('mv_id', null, array('placeholder' => 'movie id','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <!-- Needs validation -->
            <strong>Theatre id: </strong>
            {!! Form::text('t_id', null, array('placeholder' => 'theatre id','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>