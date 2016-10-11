function appendResult(data) {
    var result = $("<div>");
    var i = 0;

    $(result).hide();

    $.each(data, function(index, details) {
        if(i==0)
        { 
            $(result).append("<div class='row'>");
        }

        if (details.poster == null)
        {
            $(result).append(
                "<div class='col-sm-3 text-center'>" +
                "<div class='polaroid'>" +
                "<p style='margin-bottom:100px'>Poster not available</p>" +
                "<div class='p_container'><p>"+details.title+"</p>" +
                "<p><span class='icon-calendar' ></span> "+details.release_date+"</p>"+
                "<a class='btn btn-default modalPopCS' style='width:100%'href='#modal' data-id='" + details.id + "' name='"+details.title+"'>info</a>" +
                "</div></div></div>"
            );
        }
        else
        {
            $(result).append(
                "<div class='col-sm-3 text-center'>" +
                "<div class='polaroid'>" +
                "<img class='img-responsive' src='" +details.poster +"'alt='poster'>" +
                "<div class='p_container'><p>"+details.title+"</p>" +
                "<p><span class='icon-calendar' ></span> "+details.release_date+"</p>"+
                "<a class='btn btn-default modalPopCS' style='width:100%'href='#modal' data-id='" + details.id + "' name='"+details.title+"'>info</a>" +
                "</div></div></div>");
        }

        i++;
        if(i==4) {
            $(result).append("</div>");
            i=0;
        }

    });

    $("#search-result").html(result);
    $(result).fadeIn("slow");
}


$("#search-form").on("submit", function(event) {
    // prevent the form from submitting and clear results on enter
    event.preventDefault();

    if ($("input[name=search]").val().length == 0)
    {
        $("#search-result").empty();
    }
});

$("input[name=search]").keyup(function() {

    var sb = $("input[name=search]");

    if ($(sb).val().length >= 3)
    {
        var result = null;

        if ($("input[name=type]:checked").val() === "movie")
        {
            $.get("searchmovies", {title: $(sb).val()}, function(movies) {
                appendResult(movies);
            }, "json");
        }
        else if ($("input[name=type]:checked").val() === "location")
        {
            $.get("theatremovies", {location: $(sb).val()}, function(movies) {
                appendResult(movies);
            }, "json");
        }
    }
});