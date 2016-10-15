/*
/!*
/!*
// document.ready() shortcut
$(function() {

    // Get Request
    $.get("https://api.themoviedb.org/3/movie/top_rated?api_key=767dab209295a6b3b0ff89be7be1fa86&language=en-US",
    function(json) {

        // JavaScript
        var html = "";

        // Create loop
        for (var i = 0; i < 9; i++) {
            // get the title
            html += "<tr><td>" + json.original_title + "</td></tr>"
        }

/!*        // parse the json result
        var result = JSON.parse(body);

        for (var i = 0; i< 9; i++) {
            html += "<tr>";

            result.results.forEach(function(results) {
                html += "<td>";
                switch (i) {
                    case 0:
                        html += results.original_title;
                        break;
                }
                html += "</td>";
            });
            html += "</tr>";
        }*!/

        $('#topten_tables').append(html);
    });
});

*!/


$(function() {

    // Get Request
    $.get("https://api.themoviedb.org/3/movie/top_rated?api_key=767dab209295a6b3b0ff89be7be1fa86&language=en-US",
        function (json) {
            var tr;
            for (var i = 0; i < 10; i++) {
                tr = $('<tr/>');
                tr.append("<td>" + json.id + "</td>");
                $('#topten_tables').append(tr);
            }
        });

});
*!/

$(document).ready(function () {
    $.getJSON('https://api.themoviedb.org/3/movie/top_rated?api_key=767dab209295a6b3b0ff89be7be1fa86&language=en-US',
    function (results) {
        var tr;
        for (var i = 0; i < results.length; i++) {
            tr = $('<tr/>');
            tr.append("<td>" + results[i].id + "</td>");
            $('#topten_tables').append(tr);
        }
    });
});
*/

/*$.getJSON('https://api.themoviedb.org/3/movie/top_rated?api_key=767dab209295a6b3b0ff89be7be1fa86&language=en-US',
    function (json) {
        var tr;
        for (var i = 0; i < 10; i++) {
            tr = $('<tr/>');
            tr.append("<td>" + json[i].id + "</td>");
            $('#topten_tables').append(tr);
        }
    });*/

$(function() {
    // get request
    $.get("http://api.themoviedb.org/3/movie/157336?api_key=767dab209295a6b3b0ff89be7be1fa86", function(json) {

        // java script
        var html = "";

        // get the title and details
        html += "<p>" + json.original_title + "</p>";

        // jquery again
        $("#topten_tables").append(html);
    })
})
/*

$(function() {
    // get request
    $.get("https://api.themoviedb.org/3/movie/top_rated?api_key=767dab209295a6b3b0ff89be7be1fa86&language=en-US", function(json) {

        var html = "";
        for (var i = 0; i < 10; i++) {

            html += jsonData.results[i].original_title;
        }

        // jquery again
        $("#topten_tables").append(html);
    })
})*/


