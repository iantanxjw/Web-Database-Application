const CAROUSEL_LIMIT = 10;
const BACKDROP_URL = "http://image.tmdb.org/t/p/h632/";

// loaded in footer so no need to use document.ready()
// no longer exposes api key
$.get("api_request", {type: "popular"}, function(movies) {

    var movieCount = movies.length;
    var items = [];
    var dots = [];

    var ol = $("<ol>", {
        class: "carousel-indicators"
    });

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
                html: "<h1>" + movie.title + "</h1>" + "<p>RATING : "+movie.popularity+"☆</p>"
            })
        });
       // var title =  "<div class = 'container'><div class='carousel-caption'><h1>'"+movie.title+"'</h1><p>'"+movie.overview+"'</p></div></div>";

        // dump each item div into an array to randomly select for active later
        items[i] = item;

        // append the image and title to the div and then the div to the carousel
        $(img).appendTo(item);
        $(title).appendTo(item).trigger("custom");
        $(item).appendTo(".carousel-inner");

        var li = $("<li>");
        $(li).data("target", "#myCarousel");
        $(li).data("slide-to", i);

        dots[i] = li;

        $(ol).append(li);
        
    }

    //var currentRating = $('.ratings').data('current-rating').toFixed(1);
    //console.log(currentRating);
    $(ol).appendTo("#myCarousel");

    $(".carousel").on("custom", function() {
        $(".ratings").barrating("show", {theme: "fontawesome-stars", readonly:true});
    });

    $(items[0]).addClass("active");
    $(dots[0]).addClass("active");
    $(".carousel-caption").trigger("custom");

}, "json");