<div class="row">
    <!-- Text field for theatre number -->
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Theatre number</strong>
            {!! Form::text('theatre_num', null, array('placeholder' => '123','class' => 'form-control')) !!}
        </div>
    </div>

    <!-- Text field for location name  -->
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <!-- duration could get from movie time? -->
            <strong>Location</strong>
            {!! Form::text('location', null, array('placeholder' => 'The moon','class' => 'form-control')) !!}
        </div>
    </div>

    <!-- Text field for Number of seats  -->
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <!-- duration could get from movie time? -->
            <strong>Number of seats</strong>
            {!! Form::text('seats', null, array('placeholder' => '0','class' => 'form-control')) !!}
        </div>
    </div>

    <!-- Submit button for form -->
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>