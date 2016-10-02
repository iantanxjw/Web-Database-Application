@if (isset($success))
    <div class="alert alert-success">
        <strong>Success</strong>
        @foreach ($success as $s)
            <p>{{ $s }}</p>
        @endforeach
    </div>
@endif

@if (isset($failure))
    <div class="alert alert-danger">
        <strong>Failure</strong>
        @foreach ($failure as $f)
            <p>{{ $f }}</p>
        @endforeach
    </div>
@endif