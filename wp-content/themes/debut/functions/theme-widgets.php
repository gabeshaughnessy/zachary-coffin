<?php
/**
 * This file includes or removes widgets.
 *
 * @package WordPress
 * @subpackage Debut
 * @since Debut 2.0
 *
 */


/**
 * Unregister Default WP Widgets. Uncomment lines to unregister widget.
 *
 * @package WordPress
 * @subpackage Debut
 * @since Debut 2.0
 *
 */

add_action( 'widgets_init', 'unregister_default_wp_widgets', 1 );

function unregister_default_wp_widgets() {
	//unregister_widget( 'WP_Nav_Menu_Widget' );
	//unregister_widget( 'WP_Widget_Akismet' );
	//unregister_widget( 'WP_Widget_Archives' );
	//unregister_widget( 'WP_Widget_Calendar' );
	//unregister_widget( 'WP_Widget_Meta' );
	//unregister_widget( 'WP_Widget_Pages' );
	//unregister_widget( 'WP_Widget_Recent_Posts' );
	//unregister_widget( 'WP_Widget_Recent_Comments' );
	//unregister_widget( 'WP_Widget_RSS' );
	//unregister_widget( 'WP_Widget_Search' );
	//unregister_widget( 'WP_Widget_Tag_Cloud' );
	//unregister_widget( 'WP_Widget_Text' );
}


/**
 * Include Custom Widgets.
 *
 * @package WordPress
 * @subpackage Debut
 * @since Debut 1.0
 *
 */

include( C7S_ADMINPATH . '/widgets/ad_220x125.php' );
include( C7S_ADMINPATH . '/widgets/ad_250x125.php' );
include( C7S_ADMINPATH . '/widgets/ads_125x125.php' );
include( C7S_ADMINPATH . '/widgets/ads_220x125.php' );
include( C7S_ADMINPATH . '/widgets/category-posts.php' );
include( C7S_ADMINPATH . '/widgets/flickr.php' );
include( C7S_ADMINPATH . '/widgets/tabbed.php' );
include( C7S_ADMINPATH . '/widgets/tweets.php' );
include( C7S_ADMINPATH . '/widgets/video.php' );

?>