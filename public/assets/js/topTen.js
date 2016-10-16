$.getJSON('https://api.themoviedb.org/3/movie/top_rated?api_key=767dab209295a6b3b0ff89be7be1fa86&language=en-US',
    function (json) {
        var tr;
        for (var i = 0; i < 10; i++) {
            tr = $('<tr/>');
            tr.append("<td><strong>"  + (i+1) + " - " + json.results[i].original_title + "</strong></td>");
            $('#topten_tables').append(tr);
        }
    });


