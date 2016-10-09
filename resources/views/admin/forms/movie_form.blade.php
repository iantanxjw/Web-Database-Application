<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::label('id', 'ID:') }}
            {{ Form::number('id', null, array('placeholder' => 'Enter movie id','class' => 'form-control')) }}
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
            {{ Form::date('release_date' , null, array('class' => 'form-control', 'min' => '2000-01-02')) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::label('vote', 'Vote average:') }}
            {{ Form::number('voteAvg', null, array('placeholder' => 'vote average / 10',
            'class' => 'form-control','min' => '0', 'max'=>'10' )) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::label('status', 'Status:') }}
            {{ Form::select('status',  array('showing' => 'Showing','not showing' => 'Not showing',
            'upcoming' => 'Coming soon'), null, array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::label('genre', 'Genre:') }}
            {{ Form::select('genre', $gnrs, null, [
                'multiple' => true,
                'class' => 'form-control',
                'autocomplete' => 'on',
                'onfocus'=> 'this.size=10;',
                'onblur' => 'this.size=1;'
            ])}}
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
