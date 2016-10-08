<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::label('id', 'ID:') }}
            {{ Form::text('id') }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title') }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::label('desc', 'Overview:') }}
            {{ Form::text('desc') }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::label('rel', 'Release date:') }}
            {{ Form::text('release_date') }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::label('vote', 'Vote average:') }}
            {{ Form::number('voteAvg') }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::label('status', 'Status:') }}
            {{ Form::text('status') }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::label('genre', 'Genre:') }}
            {{ Form::text('genre') }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::label('poster', 'Poster:') }}
            {{ Form::text('poster') }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::label('bg', 'Background:') }}
            {{ Form::text('bg') }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        {{ Form::submit('Update', ['class' => 'create-form btn btn-primary']) }}
    </div>
</div>
