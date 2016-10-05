$(function() {
    var i = 0;

    $.get("api_request", {type: "upcoming"}, function(movies) {
        i=0;

        $.each(movies, function(movie, details) {
            if(i==0) { $("#upcoming").append("<div class='row'>");}
            if (details.poster == null)
            {
                $("#upcoming").append("<div class='col-sm-3 text-center modal_pop'><p>Poster not available</p><h3>" + details.title +"</h3><br></div>");
            }
            else
            {
                $("#upcoming").append("<a class='col-sm-3 text-center modal_pop' href='#modal'><img class='img-responsive' src='http://image.tmdb.org/t/p/w185/" + details.poster + "'alt='poster'><br><p>"+details.title+"</p></a></div>");
            }

            i++;
            if(i==4) {
                $("#upcoming").append("</div>");

                i=0;
            }
        })
    }, "json");

    $.get("api_request", {type: "now_playing"}, function(movies) {

        i = 0;
        $.each(movies, function(movie, details) {
            if(i==0) { $("#movies").append("<div class='row'>");}

            if (details.poster == null)
            {
                $("#movies").append("<a class='col-sm-3 text-center modalPop' href='#modal' name = '"+details.title+
                    "'><p>Poster not available</p><h3>" + details.title +"</h3><br></a>");
            }
            else
            {
                $("#movies").append("<a class='col-sm-3 text-center modalPop' href='#modal' name='"+details.title+
                    "'><div class='polaroid'>" +
                    "<img class='img-responsive' src='http://image.tmdb.org/t/p/w185/" +
                    details.poster +
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

    $(document).ready(function() {
        $(document).on("click", ".modalPop", function() {
        var title = $(this).attr('name');
        console.log(title);

            $("#populate_modal").html("<div class='featurette'>");
        $.get("api_request", {type: "now_playing"}, function(movies) {
            $.each(movies, function(movie, details) {
                if (details.title == title)
                {
                    $("#populate_modal").append("<img class='featurette-image pull-left' src='http://image.tmdb.org/t/p/w342/"+
                details.poster+"'>" +
                "<h1 class='featurette-heading'>"+details.title+"</h1><p class='lead'>"+details.desc+"</p>" +
                        "<i class='lead fa fa-calendar'> Release Date: "+details.release_date+"</i>");
                }
            })

        }, "json")

            $("#populate_modal").append("</div>");
        });
    });


});