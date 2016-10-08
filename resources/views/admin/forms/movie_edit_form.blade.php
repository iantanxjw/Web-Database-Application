{{ Form::label('idlabel', 'ID:') }}
{{ Form::text('id') }}

{{ Form::label('titlelabel', 'Title:') }}
{{ Form::text('title') }}

{{ Form::label('desclabel', 'Overview:') }}
{{ Form::text('desc') }}

{{ Form::label('rellabel', 'Release date:') }}
{{ Form::text('release_date') }}

{{ Form::label('votelabel', 'Vote average:') }}
{{ Form::number('voteAvg') }}

{{ Form::label('statuslabel', 'Status:') }}
{{ Form::text('status') }}

{{ Form::label('genrelabel', 'Genre:') }}
{{ Form::text('genre') }}

{{ Form::label('posterlabel', 'Poster:') }}
{{ Form::text('poster') }}

{{ Form::label('bglabel', 'Background:') }}
{{ Form::text('bg') }}

{{ Form::submit('Update', ['class' => 'create-form btn btn-primary']) }}