$(function() {
    var i = 0;

    // coming soon tab
    $.get("api_request", {type: "upcoming"}, function(movies) {
        i=0;
        $.each(movies, function(movie, details) {
            if(i==0) { $("#upcoming").append("<div class='row'>");}
            if (details.poster == null)
            {
                $("#upcoming").append(
                    "<div class='col-sm-3 text-center'>" +
                    "<div class='polaroid'>" +
                    "<p style='margin-bottom:100px'>Poster not available</p>" +
                    "<div class='p_container'><p>"+details.title+"</p>" +
                    "<p><span class='icon-calendar' ></span> "+details.release_date+"</p>"+
                    "<a class='btn btn-default modalPopCS' style='width:100%'href='#modal' data-id='" + details.id + "' name='"+details.title+"'>info</a>" +
                    "</div></div></div>"
                );
            }
            else
            {
                $("#upcoming").append(
                    "<div class='col-sm-3 text-center'>" +
                    "<div class='polaroid'>" +
                    "<img class='img-responsive' src='" +details.poster +"'alt='poster'>" +
                    "<div class='p_container'><p>"+details.title+"</p>" +
                    "<p><span class='icon-calendar' ></span> "+details.release_date+"</p>"+
                    "<a class='btn btn-default modalPopCS' style='width:100%'href='#modal' data-id='" + details.id + "' name='"+details.title+"'>info</a>" +
                    "</div></div></div>");
            }

            i++;
            if(i==4) {
                $("#upcoming").append("</div>");
                i=0;
            }
        });
        if(i<4) {
            $("#upcoming").append("</div>");
        }

    }, "json");

    // showing tab
    $.get("api_request", {type: "showing"}, function(movies) {
        i = 0;
        $.each(movies, function(movie, details) {
            if(i==0) { $("#movies").append("<div class='row'>");}

            if (details.poster == null)
            {
                $("#movies").append("<a class='col-sm-3 text-center modalPop' href='#modal' data-id='" + details.id + "' name = '"+details.title+
                    "'><p>Poster not available</p><h3>" + details.title +"</h3><br></a>");
            }
            else
            {
                $("#movies").append(
                    "<div class='col-sm-3 text-center'>" +
                    "<div class='polaroid'>" +
                    "<img class='img-responsive' src='" +details.poster +"'alt='poster'>" +
                    "<div class='p_container'><p>"+details.title+"</p>" +
                    "<a class='btn btn-primary modalPopSessions' href='#modal' data-id='" + details.id + "' name='"+details.title+"'>" +
                    "sessions</a>" +
                    "<a class='btn btn-default modalPop' href='#modal' data-id='" + details.id + "' name='"+details.title+"'>info</a>" +
                    "</div></div></div>");
            }

            i++;
            if(i==4) {
                $("#movies").append("</div>");
                i = 0;
            }
        });
        if(i<4) {
            $("#movies").append("</div>");
        }

        opentabs(event, 'NS');
        $(".tablinks:contains(Now Showing)").addClass("active");

    }, "json");

    /********************************************* MODAL JS ***************************************************/
    /*
     On Click function: modal click information for coming soon movies
     It only appends movie title, description, poster and an add to watchlist button
     Sessions button for coming soon movies is not available
     */
    $(document).on("click", ".modalPopCS", function() {
        $(".modal_list_NA").hide();
        $(".select_modal_list").hide();
        $(".show_sessions").hide();

        $("#populate_modal").html("<div class='featurette'><div class='row'>");

        var mv_id = $(this).data("id");

        $.get("movieid", {id: mv_id}, function(movie) {
            $("#populate_modal").append("<div class='col-sm-3 text-center'><img class='featurette-image pull-left' src='" + movie.poster + "'>"+
                "<button type='submit' class='btn btn-primary' name='mv_name' value='"+movie.title+"'>Add to watchlist</button></div>"+
                "<h1 class='featurette-heading'>"+movie.title+"</h1><p class='lead'>"+movie.desc+"</p>"+
                "<i class='lead fa fa-calendar'> Release Date: "+movie.release_date+"</i></div></div>");
        }, "json");
    });

    /*
     On Click function: modal click information for Now showing movies
     It appends movie title, description, poster and an add to watchlist button
     and a Sessions button that loads sessions modal pop up
     */
    $(document).on("click", ".modalPop", function() {
        $(".modal_list_NA").hide();
        $(".select_modal_list").hide();
        $(".show_sessions").hide();
        $("#populate_modal").html("<div class='featurette'><div class='row'>");

        var mv_id = $(this).data("id");

        $.get("movieid", {id: mv_id}, function(movie) {
            $("#populate_modal").append("<div class='col-sm-3 text-center'><img class='featurette-image pull-left' src='" + movie.poster + "'>"+
                "<a class='btn btn-primary modal_button modalPopSessions remodal-bg' href='#modal' data-id='" + mv_id + "' name='"+movie.title+"'>Sessions</a>" +
                "<button type='submit' class='btn btn-primary' name='mv_name' value='"+movie.title+"'>Add to watchlist</button></div>"+
                "<h1 class='featurette-heading'>"+movie.title+"</h1><p class='lead'>"+movie.desc+"</p>"+
                "<i class='lead fa fa-calendar'> Release Date: "+movie.release_date+"</i></div></div>");
        }, "json");
    });


    /*
     On Click function: populates select options with locations available for sessions
     if no sessions available notify users. After confirmation of locations get sessions.
     */

    var mv_id = null;
    $(document).on("click", ".modalPopSessions", function() {

        /* Add cinemas to dictionary to get unique cinema name*/
        function addCinema(cinema, theatre_id) {

            for (i=0; i<cinemas.length; i++)
            {
                if (cinemas[i].location == cinema) {
                    //add theatre only
                    var key = "t"+(Object.keys(cinemas[0].theatres).length+1);
                    cinemas[i].theatres[key] = theatre_id;
                    return true;
                }
            }
            //add new location and theatre if cinema does not already exist
            cinemas.push({location: cinema, theatres:{t1:theatre_id}});
        }

        function populateSelectList(){

            var t = [];
            $(".modal_list_options").html("");
            for (var index in cinemas) {

                if (cinemas.hasOwnProperty(index)) {
                    for(var key in cinemas[index].theatres) {
                        if (cinemas[index].theatres.hasOwnProperty(key)) {
                            var value = cinemas[index].theatres[key];
                            t.push(value);
                        }
                    }
                    $(".modal_list_options").append('<option value="'+t+'">'+cinemas[index].location+'</option>');
                }
                t = [];
            }
        }

        var cinemas = [];
        mv_id = $(this).data("id");

        $("#populate_modal").html("<div class='featurette'><div class='row'>");

        $.get("movieid", {id: mv_id}, function(movie) {
            $("#populate_modal").append("<div class='col-sm-3 text-center'><img class='featurette-image pull-left' src='" + movie.poster + "'>" +
                "<a class='btn btn-default modal_button modalPop' href='#modal' data-id='" + movie.id + "' name='"+movie.title+
                "' style='width:100%'>info</a>" +
                "<button type='submit' class='btn btn-primary' name='mv_id' value='"+movie.id+"'>Add to watchlist</button></div>");
            $("#populate_modal").append("<h1 class='featurette-heading'>"+movie.title+"</h1>");
        }, "json");

        /*
         Get theatres available and if not available then show .modal_list_NA.
         */
        $.get("locations", {m_id: mv_id}, function(locations)
        {
            if (locations.length > 0)
            {
                $(".modal_list_NA").hide();
                $(".show_sessions").hide();
                $(".select_modal_list").show();

                $.each(locations, function(location, details) {
                    addCinema(details.location, details.id);
                });
                populateSelectList();
            }
            else {
                $(".select_modal_list").hide();
                $(".show_sessions").hide();
                $(".modal_list_NA").show();
            }

            $("#populate_modal_bottom").append('</div></div>');

        }, "json");
    });

    /*
     On Click function: get session times for the option selected

     */

    $(document).on("click", ".confirm_location", function() {
        $(".show_sessions").show();
        $(".select_modal_list").hide();
        $(".modal_list_sessions").html("");

        var t_id = $( "select.modal_list_options option:selected").val().split(",");
        $.unique(t_id);

        for (var j = 0; j < t_id.length; j++) {

            $.get("sessions", {mv_id: mv_id, t_id: t_id[j]}, function(sessions) {

                $.each(sessions, function(session, details) {
                    $(".modal_list_sessions").append("<li><span class='day'>"+details.weekday+" </span> " +
                        "<button class='btn btn-danger' name='sess_id' type='submit' value='"+details.id+"'><span class='time'>"+ details.start_time+"</span></button></li>");
                });
            }, "json");
        }
    });
});