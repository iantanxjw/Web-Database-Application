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

                $("#upcoming").append("<a class='col-sm-3 text-center modalPop' href='#modal' data-id='" + details.id + "' name='"+details.title+
                    "'><div class='polaroid'>" +
                    "<img class='img-responsive' src='" +
                    details.poster +
                    "'alt='poster'><div class='p_container'><p class='title_movies'>"+details.title+
                    "</p><p><span class='icon-calendar' ></span> "+details.release_date+"</p></div></div></a>");}

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
                $("#movies").append("<a class='col-sm-3 text-center modalPop' href='#modal' data-id='" + details.id + "' name='"+details.title+
                    "'><div class='polaroid'>" +
                    "<img class='img-responsive' src='" +details.poster +
                    "'alt='poster'><div class='p_container'><p>"+details.title+"</p></div></div></a>");
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

    // modal click
    $(document).on("click", ".modalPop", function() {
        $("#populate_modal").html("<div class='featurette'><div class='row'>");

        $.get("movieid", {id: $(this).data("id")}, function(movie) {
            
            $("#populate_modal").append("<img class='featurette-image pull-left' src='" + movie.poster + "'>");
            $("#populate_modal").append("<h1 class='featurette-heading'>"+movie.title+"</h1><p class='lead'>"+movie.desc+"</p>");
            $("#populate_modal").append("<i class='lead fa fa-calendar'> Release Date: "+movie.release_date+"</i></div></div>");
        }, "json");
    });
});