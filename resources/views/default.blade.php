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

                <button data-remodal-action="close" class="remodal-close"style="width:100px"></button>
                {!! Form::open(array('route' => 'WishlistCRUD.store','method'=>'POST')) !!}
                <div id="populate_modal"></div>
                @if (Auth::guest())

                @else
                    {!! Form::hidden('u_id', Auth::user()->id) !!}
                @endif
                {!! Form::close() !!}

                <div class="modal_list_NA"><p>Unfortunately there are no cinemas showing this movie</p></div>
                <div class="select_modal_list">
                    <strong>Select Your Cinema Location:  </strong>
                    <select class="form-control modal_list_options" autocomplete="on" name="t_id"></select>
                    <button class='btn btn-info confirm_location' style='margin-top:40px'>Get Sessions</button>
                </div>
                @if (Auth::guest())
                    <div class="show_sessions">
                        <h4 style="color: orangered; padding:10px;"><strong>Login to book now! </strong></h4>
                        <ul><div class="modal_list_sessions"></div></ul>
                    </div>
                @else
                    <div class="show_sessions">
                        <strong>Select sessions and book now! </strong>
                        {!! Form::open(array('route' => 'bookings.store','method'=>'POST')) !!}
                        <ul><div class="modal_list_sessions"></div></ul>
                        {!! Form::close() !!}
                    </div>
                @endif
                <div id="populate_modal_bottom"></div>
                <br>
 {{--               <button data-remodal-action="close" class="remodal-cancel">Close</button>
                <button data-remodal-action="close" class="remodal-confirm">Confirm</button>--}}
            </div>
            @include('shared.modal')

            <div id="NS" class="tabcontent">
                <div class="row">
                    <div id="movies" class="movies"></div>
                </div><!-- /.row -->
            </div>

            <div id="CS" class="tabcontent">
                <div class="row">
                    <div id="upcoming"></div>
                </div>
            </div>



            <!-- START THE FEATURETTES -->

           <hr class="featurette-divider">

    <div class = "topMovies" >
        <h2 class="featurette-heading"><span class="text-muted">Top 10</span> Movies</h2>
        <table id="topten_tables" style="display: inline-grid;">
            <tr><td>1</td><td>6</td></tr>
            <tr><td>2</td><td>7</td></tr>
            <tr><td>3</td><td>8</td></tr>
            <tr><td>4</td><td>9</td></tr>
            <tr><td>5</td><td>10</td></tr>
        </table>
    </div>


            <!-- /END THE FEATURETTES -->
@endsection
