
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

                if (k === "genre") {
                    // select all options matching the movie genre string
                    $.each(v.split(", "), function(index, substr) {
                        $(".edit-form select option[value=" + substr).prop("selected", true);
                    });
                }
                else if (k === "admin") {
                    // only set to checked if admin
                    // nested if prevents value from being defaulted to 0
                    if (v === 1) {
                        $(".edit-form input[name=" + k).prop("checked", true);
                    }
                }
                else {
                    $(".edit-form input[name=" + k).val(v);
                }
            });
        }, "json");

        fade([".admin_tables", ".links", ".show-form"], [".edit-form"]);

        //$(".show-form").fadeOut("slow");
    });

    //Create drop down options for creating sessions for now showing movies
    $.get("api_request", {type: "showing"}, function(movies) {
        if (movies==0)
        {
            $(".session_movie_list_NA").html('<p>No movies available in the database</p>');
            return;
        }

        $.each(movies, function(movie, details) {
            $(".session_movie_list").append('<option value="'+details.id+'">'+details.title+'</option>');
        })

    }, "json");

    //Create drop down options for creating sessions for Theatres available
    $.get("theatres_available" ,function(theatres) {

        if (theatres==0)
        {
            $(".session_theatre_list_NA").html('<p>No theatres available in the database</p>');
            return;
        }
        $.each(theatres, function(theatre, details) {
            $(".session_theatre_list").append('<option value="'+details.id+'"> Location: '+details.location+
                '  |   Theatre number: '+details.theatre_num+'</option>');
        });

    }, "json");

});
