const CAROUSEL_LIMIT = 10;
const BACKDROP_URL = "http://image.tmdb.org/t/p/h632/";

// loaded in footer so no need to use document.ready()
// no longer exposes api key
$.get("api_request", {type: "now_playing"}, function(movies) {

    var movieCount = movies.length;
    var items = [];

    for (var i = 0; i < CAROUSEL_LIMIT; i++) {

        // randomly select a movie from the query result
        var index = Math.floor(Math.random() * movieCount);
        var movie = movies[index];

        // remove movie being selected again
        movies.splice(index, 1);
        movieCount--;

        // create the elements
        var item = $("<div>", {class: "item"});
        var img = $("<img>", {
                    class: "img-responsive", 
                    src: BACKDROP_URL + movie.bg, 
                    alt: "backdrop"
        });
        // this is kinda messy
        var title = $("<div>", {
            class: "container",
            html: $("<div>", {
                class: "carousel-caption",
                html: "<h1>" + movie.title + "</h1>" + "<p>RATING : "+movie.vote_average+"☆</p>"
            })
        });
       // var title =  "<div class = 'container'><div class='carousel-caption'><h1>'"+movie.title+"'</h1><p>'"+movie.overview+"'</p></div></div>";

        // dump each item div into an array to randomly select for active later
        items[i] = item;

        // append the image and title to the div and then the div to the carousel
        $(img).appendTo(item);
        $(title).appendTo(item).trigger("custom");
        $(item).appendTo(".carousel-inner");
    }

    //var currentRating = $('.ratings').data('current-rating').toFixed(1);
    //console.log(currentRating);

    $(".carousel").on("custom", function() {
        $(".ratings").barrating("show", {theme: "fontawesome-stars", readonly:true});
    });

    // randomly set an item as active to start the carousel
    $(items[Math.floor(Math.random() * items.length)]).addClass("active");
    $(".carousel-caption").trigger("custom");

}, "json");