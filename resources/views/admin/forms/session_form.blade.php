<!-- FORM -->
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Weekday</strong>
            {{ Form::select('weekday', array(
            'Monday' => 'Monday',
             'Tuesday'=> 'Tuesday',
             'Wednesday' => 'Wednesday',
              'Thursday' => 'Thursday',
              'Friday' => 'Friday',
              'Saturday'=>'Saturday',
              'Sunday'=>'Sunday'
              ),null, array('class' => 'form-control', 'autocomplete' => 'on')) }}
</div>
</div>
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
    <select class="form-control session_movie_list" autocomplete="on" name="mv_id"
            onfocus="this.size = 10" onblur="this.size=1" onchange="this.size=1, this.blur();"></select>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<!-- Needs validation -->
<strong>Theatre id: </strong>
    <select class="form-control session_theatre_list" autocomplete="on" name="t_id"
            onfocus="this.size = 5" onblur="this.size=1" onchange="this.size=1, this.blur();"></select>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>