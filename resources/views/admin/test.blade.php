@extends('layouts.master')
@section('title', 'API check')
@section('content')

<pre>{{ var_dump($movie) }}</pre>

@endsection('content')