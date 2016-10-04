$(function() {
    var i = 0;

    $.get("api_request", {type: "upcoming"}, function(movies) {
        i=0;

        $.each(movies, function(movie, details) {
            if(i==0) { $("#upcoming").append("<div class='row'>");}
            if (details.poster == null)
            {
                $("#upcoming").append("<div class='col-sm-3 text-center'><p>Poster not available</p><h3>" + details.title +"</h3><br></div>");
            }
            else
            {
                $("#upcoming").append("<a class='col-sm-3 text-center' href='#modal'><img class='img-responsive' src='http://image.tmdb.org/t/p/w185/" + details.poster + "'alt='poster'><br><p>"+details.title+"</p></a></div>");
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
                $("#movies").append("<div class='col-sm-3 text-center'><p>Poster not available</p><h3>" + details.title +"</h3><br></div>");
            }
            else
            {
                $("#movies").append("<a class='col-sm-3 text-center' href='#modal'><img class='img-responsive' src='http://image.tmdb.org/t/p/w185/" + details.poster + "'alt='poster'><br><p>"+details.title+"</p></a></div>");
            }

            $("#populate_modal").append("<h1>"+details.title+"</h1><p>"+details.overview+"</p>");
            i++;
            if(i==4) {
                $("#movies").append("</div>");
                i=0;
            }
        })


        opentabs(null, 'NS');


    }, "json");

});