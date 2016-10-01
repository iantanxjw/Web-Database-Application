@extends('layouts.master')
@section('title', 'API check')
@section('content')

<pre>{{ var_dump(json_decode($movie)) }}</pre>

@endsection('content')