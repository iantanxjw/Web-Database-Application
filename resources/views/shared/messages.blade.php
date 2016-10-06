@if (isset($success) && count($success) > 0)
    <div class="alert alert-success">
        <strong>Success</strong>
        @foreach ($success as $s)
            <p>{{ $s }}</p>
        @endforeach
    </div>
@endif

@if (isset($update) && count($update) > 0)
    <div class="alert alert-info">
        <strong>Updated</strong>
        @foreach ($update as $u)
            <p>{{ $u }}</p>
        @endforeach
    </div>
@endif

@if (isset($failure) && count($failure) > 0)
    <div class="alert alert-danger">
        <strong>Failure</strong>
        @foreach ($failure as $f)
            <p>{{ $f }}</p>
        @endforeach
    </div>
@endif