<div class="row">
    <!-- Text field for theatre number -->
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Theatre number</strong>
            {!! Form::number('theatre_num', null, array('placeholder' => 'Enter theatre number','class' => 'form-control')) !!}
        </div>
    </div>

    <!-- Text field for location name  -->
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <!-- duration could get from movie time? --->
            <strong>Location</strong>
            {!! Form::text('location', null, array('placeholder' => 'Enter location','class' => 'form-control')) !!}
        </div>
    </div>

    <!-- Text field for Number of seats  -->
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <!-- duration could get from movie time? --->
            <strong>Number of seats</strong>
            {!! Form::number('seats', null, array('placeholder' => 'Enter number of seats available','class' => 'form-control')) !!}
        </div>
    </div>

    <!-- Submit button for form -->
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>