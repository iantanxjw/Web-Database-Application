const CAROUSEL_LIMIT = 5;
const BACKDROP_URL = "http://image.tmdb.org/t/p/h632/";

// loaded in footer so no need to use document.ready()
// currently exposes api key - will change to posting to backend later
$.post("https://api.themoviedb.org/3/movie/popular?api_key=767dab209295a6b3b0ff89be7be1fa86&language=en-US", {}, function(movies) {

    var movieCount = movies.results.length;
    var items = [];

    for (var i = 0; i < CAROUSEL_LIMIT; i++) {

        // randomly select a movie from the query result
        var movie = movies.results[Math.floor(Math.random() * movieCount)];

        // create the elements
        var item = $("<div>", {class: "item"});
        var img = $("<img>", {
                    class: "img-responsive", 
                    src: BACKDROP_URL + movie.backdrop_path, 
                    alt: "backdrop"
        });

        // this is kinda messy
        var title = $("<div>", {
            class: "container",
            html: $("<div>", {
                class: "carousel-caption",
                html: $("<h1>", {
                    html: movie.title
                })
            })
        });

        // dump each item div into an array to randomly select for active later
        items[i] = item;

        // append the image and title to the div and then the div to the carousel
        $(img).appendTo(item);
        $(title).appendTo(item);
        $(item).appendTo(".carousel-inner");
    }

    // randomly set an item as active to start the carousel
    $(items[Math.floor(Math.random() * items.length)]).addClass("active");
});