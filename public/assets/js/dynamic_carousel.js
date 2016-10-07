const CAROUSEL_LIMIT = 10;
const BACKDROP_URL = "http://image.tmdb.org/t/p/h632/";

// loaded in footer so no need to use document.ready()
// no longer exposes api key
$.get("api_request", {type: "popular", limit: 10}, function(movies) {

    var movieCount = movies.length;
    var items = [];
    var dots = [];

    var ol = $("<ol>", {
        class: "carousel-indicators"
    });

    // cleaner way that doesn't need to use random bs anymore
    $.each(movies, function(i, details) {
        var item = $("<div>", {
            class: "item"
        });
        var img = $("<img>", {
            class: "img-responsive",
            src: BACKDROP_URL + details.bg,
            alt: "backdrop"
        });
        var title = $("<div>", {
            class: "container",
            html: $("<div>", {
                class: "carousel-caption",
                html: "<h1>" + details.title + "</h1>" + "<p>RATING : "+ details.voteAvg +"☆</p>"
            })
        });

        $(img).appendTo(item);
        $(title).appendTo(item);
        $(item).appendTo(".carousel-inner");

        // carousel indicators
        var dot = $("<li>");
        $(dot).data("target", "#myCarousel");
        $(dot).data("slide-to", i);
        $(dot).appendTo(ol);

        items[i] = item;
        dots[i] = dot;
    });

    $(ol).appendTo("#myCarousel");

    // start looping the carousel
    $(items[0]).addClass("active");
    $(dots[0]).addClass("active");

}, "json");