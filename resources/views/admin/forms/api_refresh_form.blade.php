{{ Form::label('apilabel', 'Populate DB using:') }}
{{ Form::select('api', ['latest' => 'Latest',
                        'now_playing' => 'Now playing',
                        'popular' => 'Popular',
                        'top_rated' => 'Top Rated',
                        'upcoming' => 'Upcoming'], 'latest') }}
{{ Form::submit('Update')}}