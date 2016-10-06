
$(function() {
        $(".create-form").click(function(){
            $(".create-form").fadeOut();
            console.log("Clicked on create form");
            $('#create-session').toggle('show');
            $('#create-theatre').toggle('show');
        });

        $(".create-back").click(function(){
            $(".create-form").fadeIn();
            $('#create-session').toggle('show');
            $('#create-theatre').toggle('show');
        });

});
