<?php
/**
 * Template Name: Archives
 *
 * The arvhives template page.
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
	 * Archives Loop
	 *
	 */
	get_template_part( 'loop', 'archives' ); ?>
	
	<?php 
	/**
	 * Sidebar
	 *
	 */
	get_sidebar(); ?>
	
</section><!-- #main -->

<?php get_footer(); ?>