//jQuery.noConflict();

(function($){

	/**
	 * No Spam Email
	 *
	 */
	
	$('a.emailaddy').each(function(i) {
		var text = $(this).text();
		var address = text.replace(" at ", "@");
		$(this).attr('href', 'mailto:' + address);
		$(this).text(address);
	});


	/**
	 * Remove Empty P tags
	 *
	 */
	
	$( "p:empty" ).remove();


	/**
	 * Superfish Menus
	 *
	 */
	
	$('ul.sf-menu').superfish();
		
	
	/**
	 * Nav Styles
	 *
	 */
	
  $('#primary-nav li:last-child').css({borderRight: '0'});
	
	
	/**
	 * Fade
	 *
	 */
	
	$('.fade').hover(function() {
	  $(this).fadeTo("fast", 0.7);
	}, function() {
	  $(this).fadeTo("fast", 1);
	});
	
	
	/**
	 * Widget UL items - Remove bottom border on last item
	 *
	 */
	
	$(".widget ul li:last-child").css({
		border: 'none', 
		paddingBottom: '0', 
		marginBottom: '0'
	});


	/**
	 * Hero Effects
	 *
	 */
	
	// Set default variables that will later be set by localized variables in functions.php
	c7s_cycle_speed = 2000;
	c7s_cycle_timeout = 6000;
	c7s_cycle_fx = 'scrollHorz';
	
	// Check if localized variable "optionsframework_enabled" is true/enabled
	// If so, set other localized variables that are controlled through the theme options.
	if (script_options.optionsframework_enabled == true) {
		c7s_cycle_speed = script_options.hero_cycle_speed;
		c7s_cycle_timeout = script_options.hero_cycle_timeout;
		c7s_cycle_fx = script_options.hero_cycle_fx;
	}
	
  if ($('#hero .inner').length > 0) {
    if ($(window).width() > 1024) {
    	$('#hero .inner').after('<a href="#" class="prev ir" title="Previous">Previous</a><a href="#" class="next ir" title="Next">Next</a>');
    }
    $('#hero .inner').cycle({
    	fx:      c7s_cycle_fx,      // Set in theme options, translated in functions.php
    	speed:   c7s_cycle_speed,   // Set in theme options, translated in functions.php
    	timeout: c7s_cycle_timeout, // Set in theme options, translated in functions.php
    	prev:    '.prev',
    	next:    '.next',
    	easing:  'easeInOutQuint',
    	pause:   true,
    	pauseOnPagerHover: true,
    	manualTrump: false
    });
    
		if (c7s_cycle_fx == 'scrollVert' || c7s_cycle_fx == 'blindY' || c7s_cycle_fx == 'curtainY' || c7s_cycle_fx == 'growY' || c7s_cycle_fx == 'slideY' || c7s_cycle_fx == 'turnUp' || c7s_cycle_fx == 'turnDown' ) {
			$('#hero .prev, #hero .next').css({
  	    '-moz-transform': 'rotate(90deg)',
  	    '-webkit-transform': 'rotate(90deg)'
  	  });
		}
  }		
	
		
	/**
	 * Add class to flickr photos
	 *
	 */
	
  $('.flickr_badge_image').addClass('entry-thumbnail');
	  
  
})(window.jQuery);




jQuery(document).ready(function($) {

	/**
	 * Equal Hieght
	 *
	 */
	
  $('#primary-nav li:last-child').css({borderRight: '0'});
	function sortNumber(a,b)    {
		return a - b;
	}
	
	function maxHeight() {
		var heights = new Array();
		$('#featured .entry').each(function(){
			$(this).css('height', 'auto');
			heights.push($(this).height());
			heights = heights.sort(sortNumber).reverse();
			$(this).css('height', heights[0]);
		});        
	}
	
	$(document).ready(function() {
		maxHeight();
	})
	
	$(window).resize(maxHeight);
	
	
	
	//$('a.inline').fancybox();
	
	
});
	








