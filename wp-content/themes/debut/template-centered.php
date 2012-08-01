<?php
/**
 * Template Name: Centered
 *
 * The centered template page. Page content is centered via css.
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
	/**
	 * Singular Loop (single, page, attachment)
	 *
	 */
	get_template_part( 'loop', 'singular' ); ?>

</section><!-- #main -->

<?php get_footer(); ?>