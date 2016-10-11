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

        <div class="remodal-bg">
            <div class="remodal" data-remodal-id="modal">
                <button data-remodal-action="close" class="remodal-close"></button>
                <div id="populate_modal"></div>
                <div class="modal_list_NA"><p>Unfortunately there are no cinemas showing this movie</p></div>
                <div class="select_modal_list">
                    <strong>Select Your Cinema Location:  </strong>
                    <select class="form-control modal_list_options" autocomplete="on" name="t_id"></select>
                    <button class='btn btn-warning modal_button confirm_location'>Confirm location</button>
                </div>
                <div class="show_sessions">
                    <strong>Select sessions and book now! </strong>
                    <div class="modal_list_sessions"></div>
                </div>
                <div id="populate_modal_bottom"></div>
                <br>
                <button data-remodal-action="close" class="remodal-cancel">Close</button>
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
@endsection('content')