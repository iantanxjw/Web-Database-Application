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
            <li><a href="#modal" class="tablinks" onclick="opentabs(event, 'NS')">Now Showing</a></li>
            <li><a href="#modal" class="tablinks" onclick="opentabs(event, 'CS')">Coming Soon</a></li>
        </ul>
        <div class="remodal-bg">
            <a href="#modal">Call the modal with data-remodal-id="modal"</a>
            <div class="remodal" data-remodal-id="modal">
                <button data-remodal-action="close" class="remodal-close"></button>
                <h1>movie</h1>
                <p>
                    Responsive, lightweight, fast, synchronized with CSS animations, fully customizable modal window plugin with declarative configuration and hash tracking.
                </p>
                <br>
                <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
                <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
            </div>




        <div id="NS" class="tabcontent">
            <div class="row">
                <div id="movies"></div>
            </div><!-- /.row -->
        </div>

        <div id="CS" class="tabcontent">
            <div class="row">
                <div id="upcoming"></div>
            </div>
        </div>

        <!-- Three columns of text below the carousel -->



    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="featurette">
        <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Flatness.</span></h2>
        <p class="lead">A big design trend for 2013 is "flat" design. Gone are the days of excessive gradients and shadows. Designers are producing cleaner flat designs, and Bootstrap 3 takes advantage of this minimalist trend.</p>
    </div>

        </div>

    <!-- /END THE FEATURETTES -->
@endsection('content')