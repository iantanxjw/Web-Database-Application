
$(function() {
    /* When clicking create object fade out table */
        $(".show-form").click(function(){
            $('.admin_tables').fadeOut('slow');
            $(this).parent("div").fadeOut("slow");

            $(":animated").promise().done(function() {
                $(".create-form").fadeIn("slow");
            });
        });

        // fade tables back in when click back
        $(".create-back").click(function(){
            $(".create-form").fadeOut("slow");

            $(":animated").promise().done(function() {
                $('.admin_tables').fadeIn('slow');
                $(".show-form").parent("div").fadeIn("slow");
            });
        });

});
