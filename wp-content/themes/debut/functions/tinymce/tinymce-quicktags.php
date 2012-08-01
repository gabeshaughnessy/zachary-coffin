<?php

/*-----------------------------------------------------------------------------------*/
/*	Quicktag Shortcodes
/*-----------------------------------------------------------------------------------*/

function c7s_add_simple_buttons() { 
	
	wp_print_scripts( 'quicktags' );
		
	$output = "<script type='text/javascript'>\n
	/* <![CDATA[ */ \n";
		
	$buttons = array();
	
	$buttons[] = array( 
	  'name' 					=> 'email',
	  'options' 			=> array(
	  	'display_name'	=> 'email',
	  	'open_tag' 			=> '<a class="jquery-email">' . __( 'NAME at DOMAIN', 'framework' ) . '</a>',
	  	'close_tag' 		=> '',
	  	'key' 					=> ''
	));
	
	$buttons[] = array( 
	  'name' 					=> 'callout_light',
	  'options' 			=> array(
	  	'display_name'	=> 'callout light',
	  	'open_tag' 			=> '<div class="callout-light">',
	  	'close_tag' 		=> '</div>',
	  	'key' 					=> ''
	));
	
	$buttons[] = array( 
	  'name' 					=> 'callout_medium',
	  'options' 			=> array(
	  	'display_name'	=> 'callout medium',
	  	'open_tag' 			=> '<div class="callout-medium">',
	  	'close_tag' 		=> '</div>',
	  	'key' 					=> ''
	));
	
	$buttons[] = array( 
	  'name' 					=> 'callout_dark',
	  'options' 			=> array(
	  	'display_name'	=> 'callout dark',
	  	'open_tag' 			=> '<div class="callout-dark">',
	  	'close_tag' 		=> '</div>',
	  	'key' 					=> ''
	));
	
	$buttons[] = array( 
	  'name' 					=> 'one_half',
	  'options' 			=> array(
	  	'display_name'	=> '&frac12; column',
	  	'open_tag' 			=> '\n<div class="one-half">',
	  	'close_tag' 		=> '</div>\n',
	  	'key' 					=> ''
	));
	
	$buttons[] = array( 
	  'name' 					=> 'one_third',
	  'options' 			=> array(
	  	'display_name'	=> '&frac13; column',
	  	'open_tag' 			=> '\n<div class="one-third">',
	  	'close_tag' 		=> '</div>\n',
	  	'key' 					=> ''
	));
	
	$buttons[] = array( 
	  'name' 					=> 'one_fourth',
	  'options' 			=> array(
	  	'display_name'	=> '&frac14; column',
	  	'open_tag' 			=> '\n<div class="one-fourth">',
	  	'close_tag' 		=> '</div>\n',
	  	'key' 					=> ''
	));
	
	$buttons[] = array( 
	  'name' 					=> 'two_third',
	  'options' 			=> array(
	  	'display_name'	=> '&frac23; column',
	  	'open_tag' 			=> '\n<div class="two-third">',
	  	'close_tag' 		=> '</div>\n',
	  	'key' 					=> ''
	));
	
	$buttons[] = array( 
	  'name' 					=> 'three_fourth',
	  'options' 			=> array(
	  	'display_name'	=> '&frac34; column',
	  	'open_tag' 			=> '\n<div class="three-fourth">',
	  	'close_tag' 		=> '</div>\n',
	  	'key' 					=> ''
	));
	
	$buttons[] = array( 
	  'name' 					=> 'one_half_last',
	  'options' 			=> array(
	  	'display_name'	=> '&frac12; column last',
	  	'open_tag' 			=> '\n<div class="one-half last">',
	  	'close_tag' 		=> '</div>\n',
	  	'key' 					=> ''
	));

	$buttons[] = array( 
	  'name' 					=> 'one_third_last',
	  'options' 			=> array(
	  	'display_name'	=> '&frac13; column last',
	  	'open_tag' 			=> '\n<div class="one-third last">',
	  	'close_tag' 		=> '</div>\n',
	  	'key' 					=> ''
	));
	
	$buttons[] = array( 
	  'name' 					=> 'one_fourth_last',
	  'options' 			=> array(
	  	'display_name'	=> '&frac14; column last',
	  	'open_tag' 			=> '\n<div class="one-fourth last">',
	  	'close_tag' 		=> '</div>\n',
	  	'key' 					=> ''
	));
	
	$buttons[] = array( 
	  'name' 					=> 'two_third_last',
	  'options' 			=> array(
	  	'display_name'	=> '&frac23; column last',
	  	'open_tag' 			=> '\n<div class="two-third last">',
	  	'close_tag' 		=> '</div>\n',
	  	'key' 					=> ''
	));
	
	$buttons[] = array( 
	  'name' 					=> 'three_fourth_last',
	  'options' 			=> array(
	  	'display_name'	=> '&frac34; column last',
	  	'open_tag' 			=> '\n<div class="three-fourth last">',
	  	'close_tag' 		=> '</div>\n',
	  	'key' 					=> ''
	));
	
	$buttons[] = array( 
	  'name' 					=> 'embed',
	  'options' 			=> array(
	  	'display_name'	=> 'embed',
	  	'open_tag' 			=> '\n[embed]',
	  	'close_tag' 		=> '[/embed]\n',
	  	'key' 					=> ''
	));
				

	
							
	// Out put $buttons array of options
	for ( $i=0; $i <= ( count( $buttons ) - 1 ); $i++ ) {
	  $output .= "edButtons[edButtons.length] = new edButton('ed_{$buttons[$i]['name']}'
	  	,'{$buttons[$i]['options']['display_name']}'
	  	,'{$buttons[$i]['options']['open_tag']}'
	  	,'{$buttons[$i]['options']['close_tag']}'
	  	,'{$buttons[$i]['options']['key']}'
	  ); \n";
	}
	
	$output .= "\n /* ]]> */ \n
	
	</script>";
	
	echo $output;

}

?>