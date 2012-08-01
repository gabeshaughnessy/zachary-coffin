<?php
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage Debut
 */

get_header(); ?>

	<?php
	/**
	 * Hero Loop
	 *
	 */
	get_template_part( 'loop', 'hero' ); // loop-hero.php ?>
	
	
	<?php
	/**
	 * Announcement
	 *
	 */
	locate_template( 'includes/announcement.php', true ); ?>
	
	
	<?php
	/**
	 * Featured Loop
	 *
	 */
	$is_page = 'home'; // Set page type to be used in featured loop
	
	// ADDED
	// Get theme options
	$of_featured_hide               = c7s_get_option( 'featured_hide', 0 );
	$of_featured_filter_thumbs      = c7s_get_option( 'featured_filter_thumbs',	null );
	$of_featured_category           = c7s_get_option( 'featured_category', null );
	$of_featured_posts_per_page     = c7s_get_option( 'featured_posts_per_page', null );
	
	// Check if filter posts without featured thumbs is enabled in theme options
	if ( $of_featured_filter_thumbs == 1 ) :
		$thumbnail_id = '_thumbnail_id';
	else :
		$thumbnail_id = null;
	endif;

	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;


	if ( $paged > 1 ) {
	  $args['paged'] = $paged;
	}
	
	// Set query arguments
	$featured_args = array(
		'cat'            => $of_featured_category,
		'posts_per_page' => $of_featured_posts_per_page,
		'paged'          => $paged,
		'meta_query'     => array ( 
			array (
				'key'    => $thumbnail_id 
			)
		)
	);
	query_posts( $featured_args );
	// end ADDED
	
	get_template_part( 'loop', 'featured' ); // loop-featured.php ?>
			
<?php get_footer(); ?>