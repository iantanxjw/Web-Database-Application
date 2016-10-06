
$(function() {
    /* When clicking create object fade out table */
        $(".create-form").click(function(){
            $(".create-form").fadeOut('slow');
            console.log("Clicked on create form");
            $('.admin_tables').fadeOut('slow');
            $('#create-session').fadeIn('slow');
            $('#create-theatre').fadeIn('show');
        });

        $(".create-back").click(function(){
            $(".create-form").fadeIn();
            $('#create-session').fadeOut('slow');
            $('#create-theatre').fadeOut('slow');
            $('.admin_tables').fadeIn('slow');
        });

});
