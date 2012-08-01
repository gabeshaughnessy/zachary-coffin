<?php 
/**
 * The loop for displaying singular page content (single, page, attachements)
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
	
	<section id="entry-container" role="contentinfo">
	
		<?php while( have_posts() ) : the_post(); ?>
	
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ) ?>>
				
				<?php 
				/**
				 * Entry Thumbnail
				 *
				 */
				locate_template( 'includes/entry-thumbnail.php', true ); ?>
				
				
				<?php
				/**
				 * Entry Header
				 *
				 */
				locate_template( 'includes/entry-header.php', true ); ?>
				
				<div class="entry-content">
					
					<?php 
					/**
					 * Entry Content
					 *
					 */
					the_content(); ?>
					
					
					<?php
					/**
					 * Page Links
					 *
					 */
					do_action( 'get_page_links' ); // Show page links (custom function to wp_link_pages() - functions/theme-helpers.php ?>
					
					
					<?php if( is_single() ) : // Show entry utility if single page ?>
					
						<div class="entry-utility">
			  		
							<?php 
							/**
							 * Entry Utility
							 *
							 */
							c7s_posted_in(); // Get post cateogry and comment information (functions.php) ?>
			  			
						</div><!-- .entry-utility -->
					
					<?php endif; // End single page check ?>
					
				</div><!-- .entry-content -->
			
			</article><!-- #post-## -->
		
			<?php 
			/**
			 * Entry Comments
			 *
			 */
			comments_template( '', true ); ?>
		
		<?php endwhile; ?>
		
	</section><!-- #entry-container -->

<?php endif; // end of the loop ?>