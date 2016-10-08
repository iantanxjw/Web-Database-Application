$(function() {
    var i = 0;

    $.get("api_request", {type: "upcoming"}, function(movies) {
        i=0;

        $.each(movies, function(movie, details) {
            if(i==0) { $("#upcoming").append("<div class='row'>");}
            if (details.poster == null)
            {
                $("#upcoming").append("<a class='col-sm-3 text-center UC_modalpop' href='#modal' name = '"+details.title+
                    "'><p>Poster not available</p><h3>" + details.title +"</h3><br></a>");
            }
            else
            {
                $("#upcoming").append("<a class='col-sm-3 text-center UC_modalPop' href='#modal' name='"+details.title+
                    "'><div class='polaroid'>" +
                    "<img class='img-responsive' src='" +
                    details.poster +
                    "'alt='poster'><div class='p_container'><p class='title_movies'>"+details.title+
                    "</p><p><span class='icon-calendar' ></span> "+details.release_date+"</p></div></div></a>");}

            i++;
            if(i==4) {
                $("#upcoming").append("</div>");

                i=0;
            }
        })
    }, "json");

    $.get("api_request", {type: "showing"}, function(movies) {

        i = 0;
        $.each(movies, function(movie, details) {
            if(i==0) { $("#movies").append("<div class='row'>");}

            if (details.poster == null)
            {
                $("#movies").append("<a class='col-sm-3 text-center modalPop' href='#modal' name = '"+details.title+
                    "'><p>Poster not available</p><h3>" + details.title +"</h3><br></a>");
            }
            else
            {
                $("#movies").append("<a class='col-sm-3 text-center modalPop' href='#modal' name='"+details.title+
                    "'><div class='polaroid'>" +
                    "<img class='img-responsive' src='" +details.poster +
                    "'alt='poster'><div class='p_container'><p>"+details.title+"</p></div></div></a>");
            }

            i++;
            if(i==4) {
                $("#movies").append("</div>");
                i = 0;
            }
        })

        opentabs(event, 'NS');
        $(".tablinks:contains(Now Showing)").addClass("active");

    }, "json");

    $(document).ready(function() {
        $(document).on("click", ".modalPop", function() {
        var title = $(this).attr('name');
        console.log(title);

            $("#populate_modal").html("<div class='featurette'><div class='row'>");
        $.get("api_request", {type: "showing"}, function(movies) {
            $.each(movies, function(movie, details) {
                if (details.title == title)
                {
                    $("#populate_modal").append("<img class='featurette-image pull-left' src='"+
                details.poster+"'>" +
                "<h1 class='featurette-heading'>"+details.title+"</h1><p class='lead'>"+details.desc+"</p>" +
                        "<i class='lead fa fa-calendar'> Release Date: "+details.release_date+"</i>");
                }
            })

            $("#populate_modal").append("</div></div>");
        }, "json")
        });
    });

    $(document).ready(function() {
        $(document).on("click", ".UC_modalPop", function() {
            var title = $(this).attr('name');
            console.log(title);

            $("#populate_modal").html("<div class='featurette'>");
            $.get("api_request", {type: "upcoming"}, function(movies) {
                $.each(movies, function(movie, details) {
                    if (details.title == title)
                    {
                        $("#populate_modal").append("<img class='featurette-image pull-left' src='"+
                            details.poster+"'>" +
                            "<h1 class='featurette-heading'>"+details.title+"</h1><p class='lead'>"+details.desc+"</p>" +
                            "<i class='lead fa fa-calendar'> Release Date: "+details.release_date+"</i>");
                    }
                })

            }, "json")

            $("#populate_modal").append("</div>");
        });
    });


});