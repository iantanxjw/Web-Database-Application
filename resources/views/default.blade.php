@extends('layouts.master')
@section('title', 'Home')
@section('content')

    <!-- THIS CONTENT NEEDS TO BE REPLACED - DEFAULT FROM BOOTSTRAP TEMPLATE -->

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div id="centeredmenu">
        <ul class="tab">
            <li><a href="#" class="tablinks" onclick="opentabs(event, 'NS')">Now Showing</a></li>
            <li><a href="#" class="tablinks" onclick="opentabs(event, 'CS')">Coming Soon</a></li>
        </ul>
        </div>
            @include('shared.modal')

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



            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">

    <div class = "topMovies">
        <h2 class="featurette-heading"><span class="text-muted">Top 10</span> Movies</h2>
        <table id="topten">
            <tr><td>1</td><td>6</td></tr>
            <tr><td>2</td><td>7</td></tr>
            <tr><td>3</td><td>8</td></tr>
            <tr><td>4</td><td>9</td></tr>
            <tr><td>5</td><td>10</td></tr>
        </table>
    </div>


            <!-- /END THE FEATURETTES -->
@endsection