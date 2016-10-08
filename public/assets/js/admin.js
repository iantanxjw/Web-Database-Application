
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

    $(".show-edit").click(function() {
        // set the form action
        $(".edit-form .row > form").prop("action", "admin_movies/" + $(this).data("id"));

        // disable id editing
        $(".edit-form input[name='id']").prop("readonly", true);
        
        // re-request the movie for editing
        $.get("admin_movies/" + $(this).data("id") + "/edit", function(data) {
            
            $.each(data, function(k, v) {
                $(".edit-form input[name=" + k).val(v);
            });
        }, "json");

        fade([".admin_tables", ".links"], [".edit-form"]);
    })
});
