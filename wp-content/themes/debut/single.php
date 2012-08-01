<?php
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage Debut
 * @since Debut 1.0
 *
 */

get_header(); ?>

<section id="main">

	<?php 
	
	/**
	 * Singular Loop (single, page, attachment)
	 *
	 */
	get_template_part( 'loop', 'singular' ); // loop-singular.php ?>
	
	
	<?php	
	/**
	 * Sidebar
	 *
	 */
	get_sidebar(); ?>

</section><!-- #main -->

<?php get_footer(); ?>