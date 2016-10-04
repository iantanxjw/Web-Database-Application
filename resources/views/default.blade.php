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
            <li><a href="#" class="tablinks active" onclick="opentabs(event, 'NS')">Now Showing</a></li>
            <li><a href="#" class="tablinks" onclick="opentabs(event, 'CS')">Coming Soon</a></li>
        </ul>

        <div class="remodal-bg">
            <div class="remodal" data-remodal-id="modal">
                <button data-remodal-action="close" class="remodal-close"></button>
                <div id="populate_modal"></div>
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
@endsection('content')