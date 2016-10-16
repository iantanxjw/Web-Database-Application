<!-- Text field for location name  -->


<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <!-- duration could get from movie time? --->
        <strong>Adult</strong>
        {!! Form::number('adult', 0, array('class' => 'form-control','min'=>'0', 'max' => '10','id'=>'Adult')) !!}
    </div>
</div>

<!-- Text field for Number of seats  -->
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <!-- duration could get from movie time? --->
        <strong>Child</strong>
        {!! Form::number('child', 0, array('class' => 'form-control','min'=>'0', 'max' => '10','id'=>'Child')) !!}
    </div>
</div>

<!-- Text field for Number of seats  -->
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <!-- duration could get from movie time? --->
        <strong>Concession/Student</strong>
        {!! Form::number('concession', 0, array('class' => 'form-control','min'=>'0', 'max' => '10','id'=>'Student')) !!}
    </div>
</div>

<!-- Text field for Number of seats  -->
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <!-- duration could get from movie time? --->
        <strong>Seniors</strong>
        {!! Form::number('senior', '0', array('min'=>'0','class' => 'form-control','id'=>'Senior', 'max' => '10')) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <span id="eTicket"></span>
</div>
<!-- Submit button for form -->
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary" id="btn2">Submit</button>
</div>