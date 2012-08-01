<?php
/**
 * Template Name: Custom Post Page
 *
 * The custom post page template page. This page template is used to
 * show posts for any given page. Options are set via a custom metabox
 * to determine which categories should be included.
 *
 * @package WordPress
 * @subpackage Debut
 * @since Debut 1.0
 *
 */

get_header(); ?>

<?php 
// Get custom post page metabox options (functions/theme-metabox.php)
$post_page_mb->the_meta(); 
$enable_post_page_title 	= $post_page_mb->get_the_value( 'enable_post_page_title' );
$enable_post_page_content = $post_page_mb->get_the_value( 'enable_post_page_content' );

// Get page excerpt metabox options (functions/theme-metabox.php)
$page_excerpt_mb->the_meta();
$page_excerpt = $page_excerpt_mb->get_the_value( 'page_excerpt' );
?>

<section id="main">

	<section id="entry-container"> 
		
		<?php if ( $enable_post_page_title || $enable_post_page_content ) : ?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry page-header' ) ?>>
				
				<?php 
				/**
				 * Entry Title & Excerpt
				 *
				 */
				if ( $enable_post_page_title ) : ?>
				
					<header class="entry-header">
				  	
						<h1 class="entry-title"><?php the_title(); ?></h1>
				  	
						<?php if( $page_excerpt_mb->get_the_value( 'page_excerpt' ) ) : ?>
				  	
						  <p class="entry-excerpt"><span><?php echo $page_excerpt_mb->the_value( 'page_excerpt' ); ?></span></p>
				  	
						<?php endif; ?>
				  
					</header><!-- .entry-header -->
		  	
				<?php endif; ?>
		  	
		  	
				<?php 
				/**
				 * Entry Content
				 *
				 */
				if ( $enable_post_page_content ) : ?>
		  	  
					<div class="entry-content">
		  	  
						<?php	the_content(); ?>  
		  	  
					</div><!-- entry-content -->
				
				<?php endif; ?>
			
			</article><!-- #post-## -->
		
		<?php endif; // end enable post title and content check ?>
		
		
		<?php
		/**
		 * Entry Posts Setup
		 *
		 */
		
		$is_page = 'template-post-page';
		
		// Check for pages
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		
		if ( $paged > 1 ) {
			$args['paged'] = $paged;
		}
		
		// Get custom metabox options
		$post_page_cats = $post_page_mb->get_the_value( 'post_page_cats' );
		$posts_per_page = $post_page_mb->get_the_value( 'post_page_number' ); // -1 shows all posts
		
		// Get custom post page cats and split array into comma deliminated string
		
		if( $post_page_cats ) {
			$post_page_cats = implode(",", $post_page_cats);
		} else {
			$post_page_cats = null;
		}
		
		// Create query based on metabox options
		$args = array( 
			'cat'            => $post_page_cats,
			'posts_per_page' => $posts_per_page,
			'paged'          => $paged
		 );
		 
		query_posts( $args ); ?>
		
		<?php
		/**
		 * The Loop
		 *
		 */
		get_template_part( 'loop', 'index' ); ?>
		
		
		<?php	wp_reset_query(); // reset the query for next use ?>
		
	</section><!-- #entry-container -->
		
	<?php get_sidebar(); ?>

</section><!-- #main -->

<?php get_footer(); ?>