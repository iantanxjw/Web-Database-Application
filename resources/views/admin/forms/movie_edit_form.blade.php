{{ Form::label('id', 'ID:') }}
{{ Form::text('id') }}

{{ Form::label('title', 'Title:') }}
{{ Form::text('title') }}

{{ Form::label('desc', 'Overview:') }}
{{ Form::text('desc') }}

{{ Form::label('rel', 'Release date:') }}
{{ Form::text('release_date') }}

{{ Form::label('vote', 'Vote average:') }}
{{ Form::number('voteAvg') }}

{{ Form::label('status', 'Status:') }}
{{ Form::text('status') }}

{{ Form::label('genre', 'Genre:') }}
{{ Form::text('genre') }}

{{ Form::label('poster', 'Poster:') }}
{{ Form::text('poster') }}

{{ Form::label('bg', 'Background:') }}
{{ Form::text('bg') }}

{{ Form::submit('Update', ['class' => 'create-form btn btn-primary']) }}