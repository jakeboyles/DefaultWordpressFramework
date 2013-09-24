jQuery(document).ready(function($) {

    //----------------------------------------------------------------------
  // Slides
  //

    var slide_pos = 0;
    var slide_len = 0;

    $(document).ready(function(){

      slide_int = setInterval(slide,5000);
      slide_len = $(".slide").size() - 1;

      $(".slide:gt(0)").hide();

    });
    slide = function(){

      slide_cur = $(".slide:eq(" + slide_pos + ")");
      slide_cur.fadeOut(2000);

      slide_pos = (slide_pos == slide_len ? 0 : (slide_pos + 1));

      slide_cur = $(".slide:eq(" + slide_pos + ")");
      slide_cur.fadeIn(2000);

    };



}); // document ready