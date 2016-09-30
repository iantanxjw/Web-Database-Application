@extends('layouts.master')
@section('title', 'API check')
@section('content')

<pre>{{ var_dump($json) }}</pre>

@endsection('content')