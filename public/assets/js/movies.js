$(function() {
    var url = "https://api.themoviedb.org/3/movie/upcoming?api_key=767dab209295a6b3b0ff89be7be1fa86&language=en-US";
    var i = 0;

    $.post(url, {}, function(movies) {

        $.each(movies.results, function(movie, details) {
            if(i==0) { $("#upcoming").append("<div class='row'>");}

            $("#upcoming").append("<div class='col-md-3 text-center'><img class='img-responsive' src='http://image.tmdb.org/t/p/w342/" + details.poster_path + "'alt='poster'><br></div>");

            i++;
            if(i==4) {
                $("#upcoming").append("</div>");
                i=0;
            }
        })
    })

    var url = "https://api.themoviedb.org/3/movie/now_playing?api_key=767dab209295a6b3b0ff89be7be1fa86&language=en-US";
    $.post(url, {}, function(movies) {

        i = 0;
        $.each(movies.results, function(movie, details) {
            if(i==0) { $("#movies").append("<div class='row'>");}

            $("#movies").append("<div class='col-md-3 text-center'><img class='img-responsive' src='http://image.tmdb.org/t/p/w342/" + details.poster_path + "'alt='poster'><br></div>");
            i++;
            if(i==4) {
                $("#movies").append("</div>");
                i=0;
            }

        })
    })
});