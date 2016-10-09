<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::label('id', 'ID:') }}
            {{ Form::text('id', null, array('placeholder' => 'Enter movie id','class' => 'form-control')) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title' , null, array('placeholder' => 'Enter movie title','class' => 'form-control')) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::label('desc', 'Overview:') }}
            {{ Form::text('desc' , null, array('placeholder' => 'Enter movie description','class' => 'form-control')) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::label('rel', 'Release date:') }}
            {{ Form::text('release_date' , null, array('placeholder' => 'Enter release date of movie','class' => 'form-control')) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::label('vote', 'Vote average:') }}
            {{ Form::number('voteAvg', null, array('placeholder' => 'vote average / 10','class' => 'form-control')) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::label('status', 'Status:') }}
            {{ Form::text('status', null, array('placeholder' => 'showing/not showing/upcoming','class' => 'form-control')) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::label('genre', 'Genre:') }}
            {{ Form::text('genre', null, array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::label('poster', 'Poster:') }}
            {{ Form::text('poster', null, array('placeholder' => 'Enter url','class' => 'form-control')) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::label('bg', 'Background:') }}
            {{ Form::text('bg', null, array('placeholder' => 'Enter url','class' => 'form-control')) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        {{ Form::submit('Add/Update Movie', ['class' => 'btn btn-primary']) }}
    </div>
</div>
