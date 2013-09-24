jQuery(document).ready(function($) {

  //----------------------------------------------------------------------
  // Fancybox
  //

  $('a.mask').fancybox({
    'titlePosition' 		: 'inside',
    'arrows'  : 'true',
    'cyclic'	  : 'true',	
  });

  $(".fancyboxLauncher").on("click", function(){
  	var clicked = $(this).attr('data-number');
    $(".mask").eq(clicked).trigger("click");
    return false;
});




  //----------------------------------------------------------------------
  // Make link hover on whole slider hover on home page
  //

$(".link-hide").on("hover", function(e) {
    if (e.type == "mouseenter") {
        $(".headline-box p a").css("color","#C4B7B3");   
    }
    else { // mouseleave
          $(".headline-box p a").css("color","#19A1DA");
    }
});



   //----------------------------------------------------------------------
   // top-menu
   //


    $('.main-nav-wrap ul.menu').find('> li').hover (
      function() {
        $(this).find('.sub-menu:first').fadeIn(150);
        $(this).find('> a').addClass('hover');
      },
      function(){
        $(this).find('.sub-menu:first').fadeOut(150);
        $(this).find('> a').removeClass('hover');
      }
    );




	//----------------------------------------------------------------------
	// Sidebar Gallery
	//	


		$('li.gallery-thumb').hover(
  		function () {
  			var imgSrc = ($('img', this).attr('name'));
  			imgSrc = imgSrc.replace('-150x150','-210x160');
				$('img.main-gallery-image').attr('src', imgSrc);

				var dataNumber = ($('a', this).attr('data-number'));
				$('.fancyboxLauncher').attr('data-number', dataNumber);


				var imgTit = ($('a', this).attr('title'));
				$('div.thumb-caption').text(imgTit);
			}
		);



	//----------------------------------------------------------------------
	// Hide related section if nothing in it
	//

	//$('.sidebar-related').each(function(index) {
	//var kids = $(this).find("ul li").length;
	//if(kids==0) {
		//$(this).css("display","none");
	//}

	//});

	//----------------------------------------------------------------------
	// Two Column Sidebar Loop
	//


	function twoColumnNav(threshold) {
	$( ".sub-menu" ).each(function( index ) {

	// Get the length of all the items
	var navLength = $(this).find("li").children().length;

	// Find the middle of the items
	var halfItem = navLength/2;
	halfItem = Math.round(halfItem);

	// If there are more than 8 items split it.
	if(navLength>=threshold) {

	$(this).addClass("twoColWide");
	$(this).find(".menu-item:nth-child("+halfItem+")").addClass("middle");

	// Add a class of floatRight or floatLeft depending on if its after or before the middle item
	$(this).find(".middle").nextAll(".menu-item").addClass("floatRight");
	$(this).find(".middle").addClass("floatLeft");
	$(this).find(".middle").prevAll(".menu-item").addClass("floatLeft");

	// Wrap it in a div depending on wheather its floated right or left
	$(this).find(".floatRight").wrapAll('<div class="subFloatRight" />');
	$(this).find(".floatLeft").wrapAll('<div class="subFloatLeft" />');
	}

	});
	};


	// Make anything above 10 items multi column
	twoColumnNav(10);


}); // document ready