@extends('layouts.master')
@section('title', 'API check')
@section('content')

@if (count($success) > 0)
    <div class="alert alert-success">
        <strong>Success</strong>
        @foreach ($success as $s)
            <p>{{ $m }}</p>
        @endforeach
    </div>
@endif

@if (count($failure) > 0)
    <div class="alert alert-danger">
        <strong>Failure</strong>
        @foreach ($failure as $f)
            <p>{{ $m }}</p>
        @endforeach
    </div>
@endif

@endsection