<div class="row">
    <!-- Text field for theatre number -->
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name</strong>
            {!! Form::text('name', null, array('placeholder' => 'Enter Name','class' => 'form-control')) !!}
        </div>
    </div>

    <!-- Text field for location name  -->
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <!-- duration could get from movie time? -->
            <strong>Email</strong>
            {!! Form::email('email', null, array('placeholder' => 'Enter Email','class' => 'form-control')) !!}
        </div>
    </div>

    <!-- Text field for Number of seats  -->
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <!-- duration could get from movie time? -->
            <strong>Password</strong>
            {!! Form::password('password', null, array('class' => 'form-control')) !!}
        </div>
    </div>

    <input type="hidden" name="source" value="1">

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Admin</strong>
            {{ Form::checkbox('admin') }}
        </div>
    </div>

    <!-- Submit button for form -->
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>