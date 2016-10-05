 $(function() {

     var currentRating = $('#ratings').data('current-rating');
     $('#ratings').barrating({
         theme: 'fontawesome-stars',

     });
 });
// $("#ratings").trigger("custom");
// $("#ratings").on("custom", function() {
//     $(this).barrating("show", {theme: "bars-movie"});
// });