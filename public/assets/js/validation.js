$("#btn1").click(function(event){

    /*
    if($("#Name").val().length === 0)
    {
        $( "#eName" ).text( "Not valid!" ).show().fadeOut( 1000 );
        event.preventDefault();
    }    alert ($("#Address").val().length);
         alert ($.trim($("#Address").val().length));
    */

    var rName = new RegExp(/^[a-z\s]{1,20}$/i);

    if (rName.test($.trim($("#Name").val())) == false) {
        /*alert ($("#Name").val().length);*/
        $( "#eName" ).text( "*Invalid!" ).show().fadeOut( 4000 );
        event.preventDefault();
    }

    if ($("#Address").val() == "" || $("#Address").val() == null)
    {

        $( "#eAdd" ).text( "*Invalid" ).show().fadeOut( 4000 );
        event.preventDefault();
    }

    if($("#Suburb").val() == "" || $("#Suburb").val() == null)
    {
        $( "#eSub" ).text( "*Invalid" ).show().fadeOut( 4000 );
        event.preventDefault();
    }

    if($("#PCode").val() == "" || $("#PCode").val() == null)
    {
        $( "#ePCode" ).text( "*Invalid" ).show().fadeOut( 4000 );
        event.preventDefault();
    }

    if($("#CreditCard").val() == "" || $("#CreditCard").val() == null)
    {
        $( "#eCard" ).text( "*Invalid" ).show().fadeOut( 4000 );
        event.preventDefault();
    }

    if($("#ExpDate").val() == "" || $("#ExpDate").val() == null)
    {
        $( "#eExp" ).text( "*Invalid" ).show().fadeOut( 4000 );
        event.preventDefault();
   }


});
