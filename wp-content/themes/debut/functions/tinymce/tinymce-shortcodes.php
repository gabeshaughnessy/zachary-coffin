<?php
/*-----------------------------------------------------------------------------------*/
/*	Google Map
/*-----------------------------------------------------------------------------------*/

add_shortcode("googlemap", "c7s_googlemap");

function c7s_googlemap($atts, $content) {
	$atts = shortcode_atts( 
		array(
			"width" => '550',
			"height" => '400',
			"src" => $content
		), $atts);
   
	return '<p class="c7s_googlemap"><iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="' . $atts['src'] . '&amp;output=embed"></iframe></p><!-- .google-map -->';
}




/*-----------------------------------------------------------------------------------*/
/*	Email Address
/*-----------------------------------------------------------------------------------*/

add_shortcode( 'emailaddy', 'c7s_emailaddy' );

function c7s_emailaddy( $atts ) {
	$atts = shortcode_atts(
		array(
			'name'		=> '',
			'domain'	=> '',
		), $atts);
		
	if ( empty( $atts['name'] ) || empty( $atts['domain'] ) )
        return '';
    
	return '<a class="emailaddy">' . $atts['name'] . ' at ' . $atts['domain'] . '</a>';
}





/*-----------------------------------------------------------------------------------*/
/*	Columns Shortcodes
/*-----------------------------------------------------------------------------------*/

/* 1/2 */
function c7s_one_half( $atts, $content = null ) {
   return '<div class="one-half">' . do_shortcode( $content ) . '</div>';
}
add_shortcode('one_half', 'c7s_one_half');

/* 1/2 Last */
function c7s_one_half_last( $atts, $content = null ) {
   return '<div class="one-half last">' . do_shortcode( $content ) . '</div><div class="clearfix"></div>';
}
add_shortcode('one_half_last', 'c7s_one_half_last');

/* 1/3 */
function c7s_one_third( $atts, $content = null ) {
   return '<div class="one-third">' . do_shortcode( $content ) . '</div>';
}
add_shortcode('one_third', 'c7s_one_third');

/* 1/3 Last */
function c7s_one_third_last( $atts, $content = null ) {
   return '<div class="one-third last">' . do_shortcode( $content ) . '</div><div class="clearfix"></div>';
}
add_shortcode('one_third_last', 'c7s_one_third_last');

/* 2/3 */
function c7s_two_third( $atts, $content = null ) {
   return '<div class="two-third">' . do_shortcode( $content ) . '</div>';
}
add_shortcode('two_third', 'c7s_two_third');

/* 2/3 Last */
function c7s_two_third_last( $atts, $content = null ) {
   return '<div class="two-third last">' . do_shortcode( $content ) . '</div><div class="clearfix"></div>';
}
add_shortcode('two_third_last', 'c7s_two_third_last');

/* 1/4 */
function c7s_one_fourth( $atts, $content = null ) {
   return '<div class="one-fourth">' . do_shortcode( $content ) . '</div>';
}
add_shortcode('one_fourth', 'c7s_one_fourth');

/* 1/4 Last */
function c7s_one_fourth_last( $atts, $content = null ) {
   return '<div class="one-fourth last">' . do_shortcode( $content ) . '</div><div class="clearfix"></div>';
}
add_shortcode('one_fourth_last', 'c7s_one_fourth_last');

/* 3/4 */
function c7s_three_fourth( $atts, $content = null ) {
   return '<div class="three-fourth">' . do_shortcode( $content ) . '</div>';
}
add_shortcode('three_fourth', 'c7s_three_fourth');

/* 3/4 Last */
function c7s_three_fourth_last( $atts, $content = null ) {
   return '<div class="three-fourth last">' . do_shortcode( $content ) . '</div><div class="clearfix"></div>';
}
add_shortcode('three_fourth_last', 'c7s_three_fourth_last');


?>