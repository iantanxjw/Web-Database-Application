
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
    })
});
