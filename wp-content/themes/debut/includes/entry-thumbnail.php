<?php  
/**
 * This template file determines how to display the post thumbnail,
 * video, or gallery. Used across multiple files.
 *
 * @package WordPress
 * @subpackage Debut
 * @since Debut 2.0
 *
 */

// Get global metabox options
global $media_embed_mb;


// Get media embed metabox options
$media_embed_mb->the_meta(); 
$media_source     = $media_embed_mb->get_the_value( 'media_source' );
$media_embed_code = $media_embed_mb->get_the_value( 'media_embed_code' );


// Check if media embed has a source or embed code
if ( $media_source || $media_embed_code ) {
	$media_embed = true;
} else {
	$media_embed = false;
}


// Set post thumbnail
if ( has_post_thumbnail() ) {

	global $is_page;
	
	if ( isset( $is_page ) && $is_page == 'home' || $is_page == 'template-post-gallery' ) {
	  $the_post_thumbnail = get_the_post_thumbnail( $post->ID, 'thumbnail-wide' );
	}
	elseif ( isset( $is_page ) && $is_page == 'template-full' ) {
	  $the_post_thumbnail = get_the_post_thumbnail( $post->ID, 'full-image' ); 
	}
	elseif( is_singular() ) {
	  $the_post_thumbnail = get_the_post_thumbnail( $post->ID, 'singular-image' );
	} 
	else {
	  $the_post_thumbnail = get_the_post_thumbnail( $post->ID, 'thumbnail-large' ); 
	}
}


// Get theme options
$of_instant_view = c7s_get_option( 'instant_view', 0 );


if ( $of_instant_view == 1 ) : // Check for instant view theme option

	if ( $media_source || $media_embed_code ) : // Check if media embed has a source
		$link = '#video-' . get_the_ID();
		$link_class .= 'inline thumbnail-frame-video';
	else: // for posts without media embed options entered... go to post 
		$link = get_permalink();
	endif; // end media embed check
	
elseif ( has_post_thumbnail() ) : // Check for post thumbnail
	$link = get_permalink();
	$link_class = '';  
 
else : // Give it up.
	$link = get_permalink();
	$link_class = '';
	$the_post_thumbnail = '';
	
endif;


/**
 * Entry Thumbnail Setup
 *
 */

// Show thumbnail if there is a post thumbnail or a media embed item available
if ( $the_post_thumbnail || $media_embed ) : ?>

	<figure class="entry-thumbnail">
	
		<?php 
		/**
		 * Single, Page, Attachement Pages
		 *
		 */
		if ( is_singular() ) : ?>
		
			<?php if ( $media_embed ) : // Check for Media Embed value ?>
				
				<?php
				global $is_page; // Custom action to handle media embed (functions.php)
				
				if ( $is_page == 'template-full' ) : ?>

					<?php do_action( 'get_media', $post->ID, '840', '', true ); ?>
				
				<?php else : ?>
					
					<?php do_action( 'get_media', $post->ID, '530', '', true ); ?>
				
				<?php endif; // end $is_page=template-full check ?>
				
			<?php else :	// Or show the post thumbnail ?>
			
				<?php echo $the_post_thumbnail; // The post thumbnail ?>
			
			<?php endif; // end media embed check?>
			
			
		<?php	
		/**
		 * Other Pages
		 *
		 */
		elseif ( $media_embed ) : ?>
		 
		  <div class="entry-media">
		  
				<a class="<?php echo $link_class; ?>" href="<?php echo $link; ?>" title="<?php c7s_the_title_attribute(); ?>"><!-- nothing to see here --></a>

		  	<?php if ( $the_post_thumbnail ) : // Show the post thumbnail if available ?>
		  
		  		<?php echo $the_post_thumbnail; ?>
		    
		  	<?php else : // Else, show default thumbnail ?>
		  
		  		<?php
		  		// Get globale variable to check page type
		  		global $is_page;
		    	
		  		// Check if home page
		  		if( $is_page == 'home' || $is_page == 'template-post-gallery' ) :
		  			echo '<img src="' . get_template_directory_uri() . '/images/featured-post-thumbnail.png" alt="" />';
		  		else :
		  			echo '<img src="' . get_template_directory_uri() . '/images/multiple-post-thumbnail.png" alt="" />';
		  		endif; // end is_page=home check
		  		?>
		    	
		  	<?php endif; // end post thumbnail check ?>
		    
		  </div><!-- .entry-media -->
		
		<?php else : ?>
		
			<a class="<?php echo $link_class; ?> " href="<?php echo $link; ?>" title="<?php c7s_the_title_attribute(); ?>">
			
		  	<?php echo $the_post_thumbnail; ?>
		  
		  </a>
		
		<?php	endif; // end media check ?>
	
	</figure><!-- .entry-thumbnail -->

<?php endif; // end post thumbnail and media check ?>

