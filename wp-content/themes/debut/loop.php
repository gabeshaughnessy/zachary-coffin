<?php  
/**
 * The loop for displaying multiple posts (blog, search, categories, tags, etc).
 *
 * @package WordPress
 * @subpackage Debut
 * @since Debut 2.0
 *
 */
?>

<section id="entry-container" role="contentinfo">
	
	<?php	if( have_posts() ) : ?>
	
		<?php
		/**
		 * Page Header
		 *
		 */
		locate_template( 'includes/page-header.php', true ); ?>
		
		<?php	while( have_posts() ) : the_post(); ?>
	
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ) ?>>
	  		
				<?php 
				/**
				 * Entry Thumbnail
				 *
				 */
				locate_template( 'includes/entry-thumbnail.php', true, false ); ?>
	  		
	  		
				<?php
				/**
				 * Entry Header
				 *
				 */
				locate_template( 'includes/entry-header.php', true, false ); ?>
	  		
	  		
				<?php
				/**
				 * Entry Content/Summary
				 *
				 */
				if ( is_archive() || is_search() ) : // Check if this is an Archives and Search page ?>
	  	  
					<div class="entry-summary">
						
						<?php the_excerpt(); ?>
						
						<a class="more-link" href="<?php the_permalink() ?>" title="<?php c7s_the_title_attribute(); ?>"><?php _e( 'Read More &rarr;', 'framework' ); ?></a>
					
					</div><!-- .entry-summary -->
	  	  
				<?php else : // If not Archives or Search page ?>
	  		
					<div class="entry-content">
	  	  		
						<?php global $more; $more = 0; // Needed for more tag to work ?>
						
						<?php the_content( __( 'Read More &rarr;', 'framework' ) ); // Show content ?>
						
						<?php do_action( 'get_page_links' ); // Show page links (custom function to wp_link_pages() - functions/theme-helpers.php ?>
	  	  		
					</div><!-- .entry-content -->
	  		
				<?php endif; // End Archive and Search page check ?>
			
			</article><!-- #post-## -->
			
			
			<?php 
			/**
			 * Instant View Modal Box
			 *
			 */
			do_action( 'reveal_modal', $post->ID, true ); ?>

	  	
			<?php 
			/**
			 * Entry Comments
			 *
			 */
			comments_template( '', true ); ?>
	  	
		<?php endwhile; // end posts loop ?>
	  
	<?php	else : // If there are not any posts ?>
		
		<?php
		/**
		 * Page Header
		 *
		 */
		locate_template( 'includes/page-header.php', true ); ?>
		
		
		<?php
		/**
		 * Archives
		 *
		 */
		get_template_part( 'loop', 'archives' ); ?>
		

	<?php endif; // end loop ?>
	
	
	<?php
	/**
	 * Pagination
	 *
	 */
	if ( $wp_query->max_num_pages > 1 ) : // Check for pages ?>
	
		<div id="nav-below" class="pagenavi">
			
			<?php if ( function_exists( 'wp_pagenavi' ) ) : // Check for WP Page Navi Plugin ?>
			
				<?php wp_pagenavi(); ?>
			
			<?php else : ?>
				
				<div class="nav-previous"><?php next_posts_link( '<span class="meta-nav">&larr;</span>' . __( ' Older posts', 'framework' ) ); ?></div>
			  
				<div class="nav-next"><?php previous_posts_link( __( 'Newer posts ', 'framework' ) . '<span class="meta-nav">&rarr;</span>' ); ?></div>
			
			<?php endif; // End WP Page Navi plugin check ?>
		
		</div><!-- #nav-below -->
	
	<?php endif; // end page check ?>
	
</section><!-- #entry-container -->


