<?php
/**
 * The loop for displaying hero posts on home page.
 *
 * @package WordPress
 * @subpackage Debut
 * @since Debut 2.0
 *
 */

// Get custom global metabox info
global $hero_mb, $media_embed_mb;

// Get custom theme options info
$of_hero_filter_thumbs  = c7s_get_option( 'hero_filter_thumbs',  null );
$of_hero_category       = c7s_get_option( 'hero_category',       null );
$of_hero_posts_per_page = c7s_get_option( 'hero_posts_per_page', null );

// Check if filter posts without featured thumbs is enabled in theme options
if ( $of_hero_filter_thumbs == 1 ) :
	$thumbnail_id = '_thumbnail_id';
else:
	$thumbnail_id = null;
endif;

// Set query arguments
$hero_args = array(
	'cat'            => $of_hero_category,
	'posts_per_page' => $of_hero_posts_per_page,
	'meta_query'     => array ( 
		array (
			'key'    => $thumbnail_id 
  	)
  )
);
$hero_query = new WP_Query( $hero_args ); // Create new query


/**
 * The Loop
 *
 */
 
if ( $hero_query->have_posts() ) : ?>

	<section id="hero" role="complementary">
	
		<div class="inner">
		
			<?php while ( $hero_query->have_posts() ) : $hero_query->the_post(); ?>
		  
				<?php
				// Get and set hero metabox options
				$hero_mb->the_meta();
				$hero_position         = $hero_mb->get_the_value( 'position' );
				$hero_color            = $hero_mb->get_the_value( 'color' );
				$hero_title            = $hero_mb->get_the_value( 'hero_title' );
				$hero_content          = $hero_mb->get_the_value( 'hero_content' );
				$hero_more_link        = $hero_mb->get_the_value( 'hero_more_link' );
				$hero_media            = $hero_mb->get_the_value( 'hero_media' );
				$hero_background_image = $hero_mb->get_the_value( 'hero_background_image' );
				
				// Image: Set post style
				if ( $hero_background_image ) :
					$post_style = 'style="background-image: url(' . esc_url( $hero_background_image ) . '); background-repeat: no-repeat;"';
				elseif ( has_post_thumbnail() ) :
					$attachment_image_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'hero-image' ); // Get post thumbnail full image source
					$post_style = 'style="background-image: url(' . esc_url( $attachment_image_src[0] ) . '); background-repeat: no-repeat;"';
				else :
					$post_style = '';
				endif;
			  
				$post_class = 'slide-container' . ' entry'; // Set post class
				
				// Position: Add hero postion to post class based on custom metabox options
				if ( $hero_position ) : 
					$post_class .= ' ' . $hero_position; 
				else :
					$post_class .= ' alignleft'; 
				endif;
				
				// Color: Add hero color to post class based on custom metabox options
				if ( $hero_color ) : 
			    	$post_class .= ' ' . $hero_color; 
			  	else :
			    	$post_class .= ' dark-on-light'; 
				endif;
				?>
			  
				<article <?php post_class( $post_class ) ?> <?php echo $post_style ?>>
			  
					<div class="slide">
			  	
						<?php	if ( ! $hero_title || ! $hero_content ) : // Check if here post title or post content are enabled ?>
			  		
							<div class="entry-content">
			  			
								<?php 
								/**
								 * Entry Header
								 *
								 */
								if ( ! $hero_title ) : // Show post title if not disabled ?>
			  				
									<header class="entry-header">
			  						
										<h2><a href="<?php the_permalink() ?>" title="<?php c7s_the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			  					
									</header><!-- .entry-header -->
			  				
								<?php endif; // end entry title check ?>
			  				
			  				
								<?php
								/**
								 * Entry Summary
								 *
								 */
								if ( ! $hero_content ) : // Show post content if not disabled ?>
			  					
									<?php the_excerpt(); ?>
			  				
								<?php endif; // end hero content check ?>
			  				
			  				
								<footer class="entry-footer">
			  					
									<nav class="action">
			  						
										<ul>
			  						
											<?php 
											/**
											 * More Link
											 *
											 */
											if ( ! $hero_more_link ) : // Check if read more is enabled ?>
			  							
												<li>
			  									
													<a href="<?php the_permalink() ?>" title="<?php c7s_the_title_attribute(); ?>"><?php _e( '&raquo; Read More', 'framework' ); ?></a> 
			  								
												</li>
			  							
											<?php endif; // end read more check ?>
			  							
			  							
											<?php
											/**
											 * Custom Links
											 *
											 */
											while ( $hero_mb->have_fields_and_multi( 'links' ) ) : // Loop through hero links and display ?>
			  							
												<li>
			  									
													<a href="<?php $hero_mb->the_value( 'link' ); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'framework' ), $hero_mb->get_the_value( 'title' ) ); ?>" <?php if ( $hero_mb->get_the_value( 'target' ) ) : ?>target="<?php $hero_mb->the_value( 'target' ); ?>"<?php endif; ?> >&raquo; <?php $hero_mb->the_value( 'title' ); ?></a>
			  								
												</li>		
			  							
											<?php endwhile; // end links loop ?>
			  							
										</ul>
			  						
									</nav><!-- .action -->
			  					
								</footer><!-- .entry-footer -->
			  				
							</div><!-- .entry-content -->
			  		
						<?php endif; // end post title and post content check ?>
			  		
			  		
						<?php
						/**
						 * Entry Media
						 *
						 */
						 
						// Get and set media embed metabox options
						$media_embed_mb->the_meta();
						$media_source	= $media_embed_mb->get_the_value( 'media_source' );
						$media_embed_code = $media_embed_mb->get_the_value( 'media_embed_code' );
						
						if ( $media_source || $media_embed_code ) : // Check if media source is provided and if it is enabled ?>
						
							<?php if (  ! $hero_media ) : ?>
			  		
								<div class="entry-media">
			  				  
									<?php	do_action( 'get_media', $post->ID, '400', '260' ); ?>
			  				
								</div><!-- .entry-media -->
								
							<?php endif; // end $hero_media check (hero metabox options) ?>
			  		
						<?php endif; // end media source check ?>
			  	
					</div><!-- .slide -->
			  
				</article><!-- .slide-container -->
			    
			<?php endwhile; ?>
		
		</div><!-- .inner -->
		
	</section><!-- #hero -->

<?php endif; // end loop ?>

<?php wp_reset_query(); // reset query ?>
