@extends('layouts.master')
@section('title', 'Default')
@section('content')

<!-- THIS CONTENT NEEDS TO BE REPLACED - DEFAULT FROM BOOTSTRAP TEMPLATE -->

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    <div class="container marketing">

    <!-- Three columns of text below the carousel -->
        <ul class="tab">
            <li><a href="#" class="tablinks" onclick="opentabs(event, 'NS')">Now Showing</a></li>
            <li><a href="#" class="tablinks" onclick="opentabs(event, 'CS')">Coming Soon</a></li>
        </ul>

        <div id="NS" class="tabcontent">
            <h3>Now Showing</h3>
            <div class="row">
                @for ($i = 0; $i < 12; $i++)
                    <div class="col-md-3 text-center">
                        <img class="img-circle" src="http://placehold.it/140x140">
                    </div>
                @endfor

            </div><!-- /.row -->
        </div>

        <div id="CS" class="tabcontent">
            <h3>Coming soon</h3>
        </div>

        <!-- Three columns of text below the carousel -->



    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="featurette">
        <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Flatness.</span></h2>
        <p class="lead">A big design trend for 2013 is "flat" design. Gone are the days of excessive gradients and shadows. Designers are producing cleaner flat designs, and Bootstrap 3 takes advantage of this minimalist trend.</p>
    </div>

    <!-- /END THE FEATURETTES -->
@endsection('content')