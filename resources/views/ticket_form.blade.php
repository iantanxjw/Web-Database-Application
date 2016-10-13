<!-- Text field for location name  -->
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <!-- duration could get from movie time? --->
        <strong>Adult</strong>
        {!! Form::number('adult', null, array('class' => 'form-control', 'max' => '10')) !!}
    </div>
</div>

<!-- Text field for Number of seats  -->
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <!-- duration could get from movie time? --->
        <strong>Child</strong>
        {!! Form::number('child', null, array('class' => 'form-control', 'max' => '10')) !!}
    </div>
</div>

<!-- Text field for Number of seats  -->
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <!-- duration could get from movie time? --->
        <strong>Concession/Student</strong>
        {!! Form::number('concession', null, array('class' => 'form-control', 'max' => '10')) !!}
    </div>
</div>

<!-- Text field for Number of seats  -->
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <!-- duration could get from movie time? --->
        <strong>Seniors</strong>
        {!! Form::number('senior', null, array('placeholder' => 'Enter number of seats available','class' => 'form-control')) !!}
    </div>
</div>

<!-- Submit button for form -->
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>