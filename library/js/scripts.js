/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
*/


/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y };
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *	// update the viewport, in case the window size has changed
 *	viewport = updateViewportDimensions();
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/

/*
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
*/
function loadGravatars() {
  // set the viewport using the function above
  viewport = updateViewportDimensions();
  // if the viewport is tablet or larger, we load in the gravatars
  if (viewport.width >= 768) {
  jQuery('.comment img[data-gravatar]').each(function(){
    jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
  });
	}
} // end function

$('p:empty').each(function(){
	$(this).remove();
});


equalheight = function(container){
	var currentTallest = 0,
		 currentRowStart = 0,
		 rowDivs = new Array(),
		 $el,
		 topPosition = 0;
	$(container).each(function() {

	 $el = $(this);
	 $($el).height('auto')
	 topPostion = $el.position().top;

	 if (currentRowStart != topPostion) {
		 for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
			 rowDivs[currentDiv].height(currentTallest);
		 }
		 rowDivs.length = 0; // empty the array
		 currentRowStart = topPostion;
		 currentTallest = $el.height();
		 rowDivs.push($el);
	 } else {
		 rowDivs.push($el);
		 currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
	}
	 for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
		 rowDivs[currentDiv].height(currentTallest);
	 }
	});
}


/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function($) {

	$('a[href^="#"]').click(function() {
			var scrollTo = $(this).attr("href");
	    $('html, body').animate({
	        scrollTop: $(scrollTo).offset().top
	    }, 500);
	});

	$('div#bars').click(function() {
	    $('.top-nav').slideToggle();
			$('div#bars>i').toggle();
	});


	$('.equalheightcols>div').matchHeight();
	$('.equalheightcols>a').matchHeight();
	$('.equalheightcols>section').matchHeight();
	$('.event-block-container>.event-block').matchHeight();

	$('.faculty-member, .admin-member').each(function(){
		$(this).find('.name').textfill({
			maxFontPixels: 18
		});
	});

	$('.show_more>button').click(function(){
			$(this).parent().find('.show_content').slideDown();
			$(this).fadeOut();
	});

	// <div class="show-more-container">
	// 		<div class="show-more-content +showContent">
	// 			<form></form>
	// 		</div>
	// 		<button>Sign Up</button>
	// </div>
	$(".show-more-container button").on("click", function() {
    $(this).parent().find(".show-more-content").slideDown();
		$(this).fadeOut();
	});

  /*
   * Let's fire off the gravatar function
   * You can remove this if you don't need it
  */
  //loadGravatars();

	$('.mapoverlay').click(function() {
	    $(this).hide();
	});

	$('.accordion-dropdown>.title').click(function() {
			var $c = $(this).parent().find('.content');

			$('.accordion-dropdown .content').each(function(){
				$(this).slideUp().parent().removeClass('shown');
			});

			if($c.is(':hidden')){
				$c.slideDown().parent().addClass('shown');;
			}
	});


	$('#watchvideobtn').click(function(){
		$('section#watchvideo').slideDown();
		$('html, body').animate({
				scrollTop: $('section#watchvideo').offset().top
		}, 500);
	});


if($('.mid-menu-cont').length){

	var  mn = $(".mid-menu");
    mns = "mid-menu-scrolled";
    hdr = $(".mid-menu-cont").offset().top;

	$(window).scroll(function() {
	  if( $(this).scrollTop() > hdr ) {
	    mn.addClass(mns);
	  } else {
	    mn.removeClass(mns);
	  }
	});
}

	$('.accordion-header, .accordion-question').click(function(){
		$(this).toggleClass('open').next().toggle();
	});


	$('ul#howwehelp-nav>li').click(function(){
		var item = $(this).data("item");
		$(this).addClass('active')
			.siblings().removeClass('active');
		$('#howwehelp-desc>div[id="'+item+'"]')
			.siblings().hide().end().fadeIn();
	});

});

/* end of as page load scripts */

$(document).ready(function() {
  $('#sponsor-slider').lightSlider({
      item:4,
      loop:true,
      slideMove:1,
      easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
      speed:600,
			slideMargin:0.1,
			pager:false,
			auto: true,
			pause: 4000,
      responsive : [
          {
              breakpoint:991,
              settings: {
                  item:3,
                  slideMove:3,
									controls:false
                }
          },
          {
              breakpoint:550,
              settings: {
                  item:2,
                  slideMove:2,
									controls:false
                }
          }
      ]
  });
});
