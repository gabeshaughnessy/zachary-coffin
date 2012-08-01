<?php //header( "Content-Type: text/javascript; charset=utf-8"  ); // Make the browser read this as javascript - http://www.maheshchari.com/serve-your-php-file-as-javascript-file/
// this is PHP variable
$slide_time_out = of_get_option('slider_pause', '5000'); ?>
<style type="text/javascript">
jQuery(document).ready(function($){//The $ makes the shorthand work for function inside this wrapper
 //Do this once the doucment has loaded
 var slideTime_out = <?php echo $slide_time_out; ?>;
 $('.cycle #content').cycle({
  fx: 'fade', 
speed: 300, 
timeout: slideTimeOut,
containerResize: 0		 });
 $('#present_on').click(function(){
	$('#present_on').animate({opacity: 0}, 'fast').hide();
	$('#present_off').animate({opacity: .5	}, 'fast').show();
 $('#header').delay(300).slideUp('fast');
 $('#nav').slideUp('fast');
 
 $('#subnav').animate({
'marginLeft' : "-=200px"
	});
/*  $('#subnav li:nth-child(1)').hover(
	 function(){//do this on hover mouse enter
		$('#subnav').animate({
		    'marginLeft' : "0px"
			});
			 },
	 function(){//do this on hover mouse exit

		$('#subnav').animate({
				    'marginLeft' : "+=200px"
		}); 
			 
			 }); */
		 
return false;	
 });
 
  $('#present_off').click(function(){
  $('#present_off').animate({opacity: 0}, 'fast').hide();
  $('#present_on').animate({opacity: .5}, 'fast').show();
 $('#header').slideDown('fast');
 $('#nav').delay(300).slideDown('fast');
$('#subnav').animate({
'marginLeft' : "+=200px"
	});
 $('#subnav li:nth-child(1)').click(function(){
	 return true; //if we're not in presentation mode, we want the tab to link to the archive.
	 });
 return false;
 });

//Accordion Menu, 
 $('#subnav .nav>li>a').click(function(){
  $(this).parent().find('.sub-menu').toggle('fast');//.find('.sub-menu').show('fast');//slide the sub menu into view on click
	 return false;//don't navigate anywhere if first level nav is clicked
 });

 
 /* Window Scroll function to hide the presentation mode when you scroll down */
	var tempScrollTop, currentScrollTop = 0; //first set the scroll positions to 0
	
	$(window).scroll(function(){ //execute this function every time the window is scrolled
		currentScrollTop = $(window).scrollTop(); 
		//set the current scroll to the position of the wrap element
		
		if (currentScrollTop != 0) 
		//the current is greater then the marker, you are scrolling down
		$('#presentation_button').hide('fast');//do this when scrolling down
		
		else if (currentScrollTop == 0 ) //if the current is less than the marker, you are scrolling up
		$('#presentation_button').show('fast');//do this when scrolling up
		tempScrollTop = currentScrollTop; //set the marker to the current value
	});
  //Fade the Content in once it has loaded 
  $('#wrap').animate({opacity: 1},'slow');
 
 });//end of document ready function