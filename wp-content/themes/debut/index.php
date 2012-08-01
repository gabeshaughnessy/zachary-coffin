<?php
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage Debut
 *
 */

get_header(); ?>

<section id="main">

	<?php 
	/**
	 * Index Loop (default)
	 *
	 */
	get_template_part( 'loop', 'index' ); // loop.php ?>
	
	<?php
	/**
	 * Sidebar
	 *
	 */
	get_sidebar(); ?>
	
</section><!-- #main -->

<?php get_footer(); ?>