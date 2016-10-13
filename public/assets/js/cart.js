$(function() {

    $(document).on("click", ".pay_button", function() {
        $(".booking_summary").hide();
        $(".pay_button").hide();
        $(".checkout").show();
    });

});
