<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="icon" href="assets/img/video.png">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="generator" content="Bootply"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="This is an example layout with carousel that uses the Bootstrap 3 RC styles. " />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/remodal.css">
    <link rel="stylesheet" href="../../assets/css/remodal-default-theme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">


    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="apple-touch-icon" href="/bootstrap/img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/bootstrap/img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/bootstrap/img/apple-touch-icon-114x114.png">

</head>

<!-- HTML code from Bootply.com editor -->

<body>
<div class = "row">
    @include('shared.navbar')
</div>
@section('title', 'Edit Locations')

        <div class="container marketing  edit-margin">
                <div class="panel panel-default">
                    <div class="panel-heading">Theatre Management</div>
                    <div class="panel-body">


                        <div id = "edit-theatre">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <h2>Edit Theatre details </h2>
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-primary create-back" href="{{ route('admin_locations.index') }}"> Back</a>
                                    </div>
                                </div>
                            </div>
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            {!! Form::model($theatre, ['method' => 'PATCH','route' => ['admin_locations.update', $theatre->id]]) !!}
                            @include('admin.forms.theatre_form')
                            {!! Form::close() !!}
                        </div>


                    </div>
                </div>
    </div>
</body>

<!-- FOOTER -->
<hr>
<footer>
    <p class="pull-right"><a href="#">Back to top</a></p>
    <p>This Bootstrap layout is compliments of Bootply. ·<a href="http://www.bootply.com/62603">Edit on Bootply.com</a></p>
</footer>