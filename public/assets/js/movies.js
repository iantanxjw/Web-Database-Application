$(function() {
    var i = 0;

    /* Populating movie posters, title and modal for tab upcoming movies*/
    $.get("api_request", {type: "upcoming"}, function(movies) {
        i = 0;
        var movieNames = [];
        $.each(movies, function(movie, details) {

            if(i==0) { $("#upcoming").append("<div class='row'>");}
            if (details.poster == null)
            {
                $("#upcoming").append("<div class='col-sm-3 text-center'><p>Poster not available</p><br></div>");
            }
            else
            {
                $("#upcoming").append("<a class='col-sm-3 text-center' href='#modal'><img class='img-responsive' src='http://image.tmdb.org/t/p/w185/" + details.poster + "'alt='poster'></a>");
            }

            movieNames.push(details.title);
            i++;

            if(i==4) {
                $("#upcoming").append("</div><div class='rows'>");
                $.each(movieNames, function(index){
                    $("#upcoming").append("<div class='col-sm-3 text-center'><p>"+movieNames[index]+"</p></div>");
                })
                $("#upcoming").append("</div>");
                //Empty array
                movieNames = [];
                i=0;
            }
        })
    }, "json");

    /* Populating movie posters, title and modal for tab now showing movies*/
    $.get("api_request", {type: "now_playing"}, function(movies) {
        var movieNames = [];
        i = 0;

        $.each(movies, function(movie, details) {
            if(i==0) { $("#movies").append("<div class='row'>");}

            if (details.poster == null)
            {
                $("#movies").append("<div class='col-sm-3 text-center'><p>Poster not available</p></div>");
            }
            else
            {
                $("#movies").append("<a class='col-sm-3 text-center' href='#modal'><img class='img-responsive' src='http://image.tmdb.org/t/p/w185/" + details.poster + "'alt='poster'><br></a>");
            }
            movieNames.push(details.title);

            $("#populate_modal").append("<h1>"+details.title+"</h1><p>"+details.overview+"</p>");
            i++;

            if(i==4) {
                $("#movies").append("</div><div class='rows'>");
                $.each(movieNames, function(index){
                    $("#movies").append("<div class='col-sm-3 text-center'><p>"+movieNames[index]+"</p></div>");
                })
                $("#movies").append("</div>");
                //Empty array
                movieNames = [];
                i=0;
            }
        })


        opentabs(null, 'NS');


    }, "json");

});