
$(function() {
    function fade(hide, show) {

        $.each(hide, function(index, element) {
            $(element).fadeOut("slow");
        });

        $(":animated").promise().done(function() {
            $.each(show, function(index, element) {
                $(element).fadeIn("slow");
            });
        });
    }

    /* When clicking create object fade out table */
    $(".show-form").click(function(){
        fade([".admin_tables", $(this).parent("div")], [".create-form"])
    });

    // fade tables back in when click back
    $(".create-back").click(function(){
        fade([".create-form", ".edit-form"], [".admin_tables", $(".show-form").parent("div")]);
    });

    /* this function should be able to serve all CRUD edits as long as 
        everything is named correctly - see any of the admin crud for
        an example */
    $(".show-edit").click(function() {
        // get the current path and set it as the form action
        var str = window.location.pathname;
        var url = str.substr(str.lastIndexOf("/") + 1);

        // set the form action
        $(".edit-form .row > form").prop("action", url + "/" + $(this).data("id"));

        // disable id editing
        $(".edit-form input[name='id']").prop("readonly", true);

        $(".pull-left h2").append(" " + $(this).data("id"));
        
        // re-request the movie for editing
        $.get(url + "/" + $(this).data("id") + "/edit", function(data) {
            
            $.each(data, function(k, v) {
                $(".edit-form input[name=" + k).val(v);
            });
        }, "json");

        fade([".admin_tables", ".links"], [".edit-form"]);

        $(".show-form").fadeOut("slow");
    });

    //Create drop down options for creating sessions for now showing movies
    $.get("api_request", {type: "showing"}, function(movies) {

        $.each(movies, function(movie, details) {
            if (movies == null)
            {
                $(".session_movie_list").append("<p>No theatres in the database</p>");
                return;
            }
            $(".session_movie_list").append('<option value="'+details.id+'">'+details.title+'</option>');
        })

    }, "json");

    //Create drop down options for creating sessions for Theatres available
    $.get("theatres_available", {} ,function(theatres) {
        console.log("it works");
        $.each(theatres, function(theatre, details) {
            if (theatre.length === 0)
            {
                $(".session_theatre_list").append("No theatres in the database");
                return;
            }
            $(".session_theatre_list").append('<option value="'+details.id+'">Location: '+details.location+
                ' Theatre no.:'+details.theatre_num+'</option>');
        })

    }, "json");

});
