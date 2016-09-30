@extends('layouts.master')
@section('title', 'API check')
@section('content')

<p>{{ var_dump($_POST) }}</p><br>

@endsection('content')