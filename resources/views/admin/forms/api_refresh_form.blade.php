{{ Form::label('apilabel', 'Populate DB using:') }}
{{ Form::select('api', ['now_playing' => 'Now playing',
                        'popular' => 'Popular',
                        'top_rated' => 'Top Rated',
                        'upcoming' => 'Upcoming'], 'now_playing') }}
{{ Form::label('typelabel', 'Set type for movies:') }}
{{ Form::select('type', ['showing' => 'Showing',
                        'not_showing' => 'Not Showing',
                        'upcoming' => 'Coming soon'], 'showing')}}
{{ Form::submit('Update')}}