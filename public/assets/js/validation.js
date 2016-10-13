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
    var rPCode = new RegExp(/^[0-9]{4}$/i);
    var rCard = new RegExp(/^[0-9]{4}[\s\-]?[0-9]{4}[\s\-]?[0-9]{4}[\s\-]?[0-9]{4}$/);
    var rExp = new RegExp(/^1[012]\/16|0[1-9]\/1[7-9]|1[012]\/1[7-9]|0[1-9]\/2[0-6]|1[012]\/2[0-6]$/);

    // TRIM then check if its not empty
    if ($.trim($("#Name").val()).length >= 1)
    {
        // if not empty. check if string has numbers/
        if (rName.test($.trim($("#Name").val())) == false) {
            // if string has numbers return invalid
            $("#eName").text("*Invalid!").show().fadeOut(4000);
            event.preventDefault();
        }
    }

    else
        //input is empty
    {
        $( "#eName" ).text( "*Required").show().fadeOut( 4000 );
        event.preventDefault();
    }

    if ($.trim($("#Address").val()).length == 0)
    {

        $( "#eAdd" ).text( "*Required").show().fadeOut( 4000 );
        event.preventDefault();
    }

    if($.trim($("#Suburb").val()).length == 0)
    {
        $( "#eSub" ).text( "*Required" ).show().fadeOut( 4000 );
        event.preventDefault();
    }

    if($.trim($("#PCode").val()).length >= 1)
    {
        if (rPCode.test($.trim($("#PCode").val())) == false) {
            $("#ePCode").text("*Invalid!").show().fadeOut(4000);
            event.preventDefault();
        }
    }
    else
    {
        $( "#ePCode" ).text( "*Required" ).show().fadeOut( 4000 );
        event.preventDefault();
    }

    if($.trim($("#CreditCard").val()).length >= 1)
    {
        if (rCard.test($.trim($("#CreditCard").val())) == false) {
            // if string has numbers return invalid
            $("#eCard").text("*Invalid!").show().fadeOut(4000);
            event.preventDefault();
        }
    }
    else
    {
        $( "#eCard" ).text( "*Required" ).show().fadeOut( 4000 );
        event.preventDefault();
    }

    if($.trim($("#ExpDate").val()).length >= 1)
    {
        if (rExp.test($.trim($("#ExpDate").val())) == false) {

            $("#eExp").text("*Invalid!").show().fadeOut(4000);
            event.preventDefault();
        }
    }
    else
    {
        $( "#eExp" ).text( "*Required" ).show().fadeOut( 4000 );
        event.preventDefault();
    }

});


$("#btn2").click(function(event){
    var total = 0;
    total = total + parseInt($("#Adult").val(),10);
    total = total + parseInt($("#Child").val(),10)
    total = total + parseInt($("#Student").val(),10)
    total = total + parseInt($("#Senior").val(),10)

     //   alert(total);
    if (total == 0){
        event.preventDefault();
    }

});
