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
            {{ Form::number('voteAvg', null, array('placeholder' => 'Enter vote average / 10',
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
            {{ Form::select('genre', array(
            '28' => 'Action',
             '28' => 'Adventure',
             '12' => 'Action',
             '16' => 'Animation',
             '35' => 'Comedy',
             '80' => 'Crime',
             '99' => 'Documentary',
             '18' => 'Drama',
             '10751' => 'Family',
             '14' => 'Fantasy',
             '36' => 'History',
             '27' => 'Horror',
             '10402' => 'Music',
             '9648' => 'Mystery',
             '10749' => 'Romance',
             '878' => 'Science Fiction',
             '10770' => 'TV Movie',
             '53' => 'Thriller',
             '10752' => 'War',
             '37' => 'Western'
            ),null, array('class' => 'form-control', 'autocomplete' => 'on', 'onfocus'=> 'this.size=10;',
            'onblur' => 'this.size=1;', 'onchange' => 'this.size=1; this.blur();')) }}
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
