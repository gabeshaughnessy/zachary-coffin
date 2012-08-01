<?php
/**
 * The loop for displaying featured posts on home page.
 *
 * @package WordPress
 * @subpackage Debut
 * @since Debut 2.0
 *
 */


/**
 * The Loop
 *
 */
if ( have_posts() ) : ?>

	<section id="featured" role="contentinfo">
		
		<?php 
		global $is_page;
		if ( $is_page !== 'template-post-gallery' ) : ?>
		
			<header class="featured-header">
			  
				<h3 class="section-title">
			  
					<?php	  
					/**
					 * Section Title
					 *
					 */
					 
					// Get theme options
					$of_featured_section_title = c7s_get_option( 'featured_section_title', 'Featured' );

					esc_html_e( $of_featured_section_title, 'framework' ); ?>
			  	
				</h3><!-- .section-title -->
			  
			  
				<?php 
				/**
				 * Section Link
				 *
				 */
				
				// Get theme options
				$of_featured_section_link_title = c7s_get_option( 'featured_section_link_title' );
				$of_featured_section_link_url = c7s_get_option( 'featured_section_link_url' );
				 
				if ( $of_featured_section_link_title && $of_featured_section_link_url ) : ?>
				  
					<a href="<?php echo esc_url( $of_featured_section_link_url ); ?>" title="<?php esc_attr_e( $of_featured_section_link_title, 'framework' ); ?> " >&raquo; <?php esc_html_e( $of_featured_section_link_title, 'framework' ); ?></a>
				  
				<?php endif; // end section title and link check ?>
			  
			</header><!-- #featured-header -->
		
		<?php endif; // end page template check ?>
	
		<div class="entry-container">
		
			<?php while ( have_posts() ) : the_post(); ?>
				
				<?php $of_featured_hide = c7s_get_option( 'featured_hide' ); ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ) ?>>
					
					<?php
					/**
					 * Entry Thumbnail
					 *
					 */
					if ( $of_featured_hide['images'] == 0 ) : // Check if thumbnail is disabled in theme options ?>
						
						<?php locate_template( 'includes/entry-thumbnail.php', true, false ); ?>
					
					<?php endif; // end hide featured image check ?>
					

					<?php
					/**
					 * Entry Header
					 *
					 */
					if ( $of_featured_hide['titles'] == 0 ) : // Check if title is disabled in theme options ?>
					
						<header class="entry-header">
				  	  
							<h4><a href="<?php the_permalink() ?>" title="<?php c7s_the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
				  	
						</header><!-- .entry-header -->
					
					<?php endif; // end show title check ?>
					
					
					<?php
					/**
					 * Entry Summary
					 *
					 */
					if ( $of_featured_hide['content'] == 0 ) : // Check if content is disabled in theme options ?>
					
						<div class="entry-summary">
							
							<?php the_excerpt(); ?>
						
						</div><!-- .entry-summary -->
					
					<?php endif; // end show summary check ?>
					
					
					<?php
					/**
					 * More Link
					 *
					 */
					if ( $of_featured_hide['read_more'] == 0 ) : // Check if read more is disabled in theme options ?>
					
						<footer class="entry-footer">
							
							<a class="more-link" href="<?php the_permalink() ?>" title="<?php c7s_the_title_attribute(); ?>"><span><?php _e( 'Read More &rarr;', 'framework' ); ?></span></a>
						
						</footer><!-- .entry-footer -->
					
					<?php endif; // end read more check ?>
					
				</article><!-- #post-## -->
				
				
				<?php 
				/**
				 * Instant View Modal Box
				 *
				 */
				do_action( 'reveal_modal', $post->ID, true ); ?>

			
			<?php endwhile; // end while loop ?>
			
		</div><!-- .entry-container -->
		
		<?php
		/**
		 * Pagination
		 *
		 */
		 
		// Get theme options
		$featured_enable_pagination = c7s_get_option( 'feautred_enable_pagination', 0 );
		
		if ( $featured_enable_pagination == 1 && $wp_query->max_num_pages > 1 ) : // Check for pages ?>
		
			<div id="nav-below" class="pagenavi">
				
				<?php if ( function_exists( 'wp_pagenavi' ) ) : // Check for WP Page Navi Plugin ?>
				
					<?php wp_pagenavi(); ?>
				
				<?php else : ?>
					
					<div class="nav-previous"><?php next_posts_link( '<span class="meta-nav">&larr;</span>' . __( ' Older posts', 'framework' ) ); ?></div>
				  
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts ', 'framework' ) . '<span class="meta-nav">&rarr;</span>' ); ?></div>
				
				<?php endif; // End WP Page Navi plugin check ?>
			
			</div><!-- #nav-below -->
		
		<?php endif; // end page check ?>
		
	</section><!-- #featured -->
	
<?php endif; // end loop ?>



<?php wp_reset_query(); // reset query ?>
