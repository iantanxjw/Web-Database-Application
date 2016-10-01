{{ Form::label('apilabel', 'Populate DB using:') }}
{{ Form::select('api', ['now_playing' => 'Now playing',
                        'popular' => 'Popular',
                        'top_rated' => 'Top Rated',
                        'upcoming' => 'Upcoming'], 'now_playing') }}
{{ Form::submit('Update')}}