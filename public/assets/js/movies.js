$(function() {
    var i = 0;

    // coming soon tab
    $.get("api_request", {type: "upcoming"}, function(movies) {
        i=0;

        $.each(movies, function(movie, details) {
            if(i==0) { $("#upcoming").append("<div class='row'>");}
            if (details.poster == null)
            {
                $("#upcoming").append("<a class='col-sm-3 text-center modalPop' href='#modal' data-id='" + details.id + "' name = '"+details.title+
                    "'><p>Poster not available</p><h3>" + details.title +"</h3><br></a>");
            }
            else
            {

                $("#upcoming").append("<div class='col-sm-3 text-center'>" +
                    "<div class='polaroid'>" +
                    "<img class='img-responsive' src='" +details.poster +"'alt='poster'>" +
                    "<div class='p_container'><p>"+details.title+"</p>" +
                    "<a class='btn btn-default modalPopCS' style='width:100%' href='#modal' data-id='" + details.id + "' name='"+details.title+"'>info</a>" +
                    "</div></div></div>");
            }

            i++;
            if(i==4) {
                $("#upcoming").append("</div>");

                i=0;
            }
        })
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
        })

        opentabs(event, 'NS');
        $(".tablinks:contains(Now Showing)").addClass("active");

    }, "json");

    // modal for coming soon click information
    $(document).on("click", ".modalPopCS", function() {
        $("#populate_modal").html("<div class='featurette'><div class='row'>");

        var mv_id = $(this).data("id");

        $.get("movieid", {id: mv_id}, function(movie) {
            $("#populate_modal").append("<img class='featurette-image pull-left' src='" + movie.poster + "'>"+
                "<h1 class='featurette-heading'>"+movie.title+"</h1><p class='lead'>"+movie.desc+"</p>"+
                "<i class='lead fa fa-calendar'> Release Date: "+movie.release_date+"</i></div></div>");
        }, "json");
    });

    // modal click information
    $(document).on("click", ".modalPop", function() {
        $("#populate_modal").html("<div class='featurette'><div class='row'>");

        var mv_id = $(this).data("id");

        $.get("movieid", {id: mv_id}, function(movie) {
            $("#populate_modal").append("<div class='col-sm-3 text-center'><img class='featurette-image pull-left' src='" + movie.poster + "'>"+
                "<a class='btn btn-primary modal_button modalPopSessions remodal-bg' href='#modal' data-id='" + mv_id + "' name='"+movie.title+"'>Sessions</a></div>"+
                "<h1 class='featurette-heading'>"+movie.title+"</h1><p class='lead'>"+movie.desc+"</p>"+
                "<i class='lead fa fa-calendar'> Release Date: "+movie.release_date+"</i></div></div>");
        }, "json");
    });

    // modal click sessions
    $(document).on("click", ".modalPopSessions", function() {
        $("#populate_modal").html("<div class='featurette'><div class='row'>");

        var mv_id = $(this).data("id");

        $.get("movieid", {id: mv_id}, function(movie) {
            $("#populate_modal").append("<img class='featurette-image pull-left' src='" + movie.poster + "'>");
            $("#populate_modal").append("<h1 class='featurette-heading'>"+movie.title+"</h1>");
        }, "json");

        //get theatres available
        $.get("locations", {m_id: mv_id}, function(locations) {

            $("#populate_modal").append(' ' +
                '<div class="form-group"><strong>Cinema Location:  </strong><select class="form-control" autocomplete="on" name="t_id">');
            console.log(locations.length);
            $.each(locations, function(location, details) {

                $("#populate_modal").append('<option value="'+details.id+'">'+details.location+'</option>');
            })

            $("#populate_modal").append('</select></div></div></div>');

        }, "json");
    });
});