<?php
/**
 * Template Name: Full Width
 *
 * The full width template page. Page width is adjusted via CSS.
 * The CSS class is provided via the WordPress body_class() function.
 *
 * @package WordPress
 * @subpackage Debut
 * @since Debut 2.0
 *
 */

get_header(); ?>

<section id="main">
	
	<?php
	
	$is_page = 'template-full'; // Used to set media embed size in includes/entry-thumbnail.php
	
	/**
	 * Singular Loop (single, page, attachment)
	 *
	 */
	get_template_part( 'loop', 'singular' ); ?>
	
</section><!-- #main -->

<?php get_footer(); ?>