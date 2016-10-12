{{ Form::label('api', 'Populate DB using:') }}
{{ Form::select('api', ['list' => 'List',
                        'now_playing' => 'Now playing',
                        'popular' => 'Popular',
                        'top_rated' => 'Top Rated',
                        'upcoming' => 'Upcoming'], 'now_playing') }}

<br><br>
{{ Form::label('postersize', 'Poster sizes:') }}
{{-- Need to manually loop through sizes to set value attr properly --}}
{{-- {{ Form::select('postersize', $poster_sizes) }} --}}
<select name="postersize" id="">
    @foreach ($poster_sizes as $size)
        <option value="{{ $size }}">{{ $size }}</option>
    @endforeach
</select>

<br><br>
{{ Form::label('bgsize', 'Backdrop sizes:') }}
{{-- {{ Form::select('bgsize', $backdrop_sizes) }} --}}
<select name="bgsize">
    @foreach ($backdrop_sizes as $size)
        <option value="{{ $size }}">{{ $size }}</option>
    @endforeach
</select>

<br><br>
{{ Form::label('type', 'Set status for movies:') }}
{{ Form::select('type', ['showing' => 'Showing',
                        'not_showing' => 'Not Showing',
                        'upcoming' => 'Coming soon'], 'showing')}}
<br><br>
{{ Form::submit('Update', array('class' => 'create-form btn btn-primary')) }}