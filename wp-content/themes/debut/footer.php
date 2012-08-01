<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main-container div and all content after
 *
 * @package WordPress
 * @subpackage Debut
 * @since Debut 1.0
 *
 */
?>

	<?php 
	/**
	 * Footbar
	 *
	 * Show footbar container if one of the footbar's has widgets
	 */
	if( is_active_sidebar( 'footbar-column-1' ) || is_active_sidebar( 'footbar-column-2' ) || is_active_sidebar( 'footbar-column-3' ) ) :	?>

		<section id="footbar-container" role="complementary">
		
			<?php get_sidebar( 'footer' ); // sidebar-footer.php ?>
		
		</section><!-- #footbar-container -->

	<?php	endif; // end sidebar check	?>
	
	<div class="clearfix"><!-- nothing to see here --></div>

</div><!-- #main-container -->


<div id="footer-container">
		
	<footer id="footer">
		
		<?php
  	/**
  	 * Social Networking Menu Items
  	 *
  	 */
		
		// Get theme options
		$of_social_twitter   = c7s_get_option( 'social_twitter' );
		$of_social_facebook  = c7s_get_option( 'social_facebook' );
		$of_social_flickr    = c7s_get_option( 'social_flickr' );
		$of_social_vimeo     = c7s_get_option( 'social_vimeo' );
		$of_social_youtube   = c7s_get_option( 'social_youtube' );
		$of_social_delicious = c7s_get_option( 'social_delicious' );
		$of_social_lastfm    = c7s_get_option( 'social_lastfm' );
		$of_social_rss       = c7s_get_option( 'social_rss' );
		
		// Check if any social network theme options are set
		if ( $of_social_twitter || $of_social_facebook || $of_social_flickr || $of_social_vimeo || $of_social_youtube || $of_social_delicious || $of_social_lastfm || $of_social_rss ) :	?>
		
			<ul id="networking">
				<li class="text"><?php _e( 'Connect with us: ', 'framework' ); ?></li>
				
				<li class="humans ir">
					<a href="<?php echo get_template_directory_uri(); ?>/functions/humans.txt" title="<?php _e( 'Humans.txt', 'framework' ); ?>"><?php _e( 'Humans.txt', 'framework' ); ?></a>
				</li>
				
				<?php if ( $of_social_twitter ) { ?>
				  <li class="twitter ir"><a href="http://twitter.com/<?php echo esc_html( $of_social_twitter ); ?>" title="Twitter.com"><?php _e( 'Twitter', 'framework' ); ?></a></li>
				<?php } ?>
				
				<?php if ( $of_social_facebook ) { ?>
				  <li class="facebook ir"><a href="http://facebook.com/<?php echo esc_html( $of_social_facebook ); ?>" title="Facebook.com"><?php _e( 'Facebook', 'framework' ); ?></a></li>
				<?php } ?>
				
				<?php if ( $of_social_flickr ) { ?>
				  <li class="flickr ir"><a href="http://flickr.com/<?php echo esc_html( $of_social_flickr ); ?>" title="Flickr.com"><?php _e( 'Flickr', 'framework' ); ?></a></li>
				<?php } ?>
				
				<?php if ( $of_social_vimeo ) { ?>
				  <li class="vimeo ir"><a href="http://vimeo.com/<?php echo esc_html( $of_social_vimeo ); ?>" title="Vimeo.com"><?php _e( 'Vimeo', 'framework' ); ?></a></li>
				<?php } ?>
				
				<?php if ( $of_social_youtube ) { ?>
				  <li class="youtube ir"><a href="http://youtube.com/<?php echo esc_html( $of_social_youtube ); ?>" title="YouTube.com"><?php _e( 'YouTube', 'framework' ); ?></a></li>
				<?php } ?>
				
				<?php if ( $of_social_delicious ) { ?>
				  <li class="delicious ir"><a href="http://delicious.com/<?php echo esc_html( $of_social_delicious ); ?>" title="Delicious.com"><?php _e( 'Delicious', 'framework' ); ?></a></li>
				<?php } ?>
				
				<?php if ( $of_social_lastfm ) { ?>
				  <li class="lastfm ir"><a href="http://lastfm.com/<?php echo esc_html( $of_social_lastfm ); ?>" title="Last.fm"><?php _e( 'Last.fm', 'framework' ); ?></a></li>
				<?php } ?>
				
				<?php if ( $of_social_rss == 1 ) : ?>
					<?php	$of_feedburner_url = c7s_get_option( 'feedburner_url' ); ?>
					
					<?php
					if ( $of_feedburner_url ) :
						$rss_link = 'http://feeds.feedburner.com/' . esc_html( $of_feedburner_url );
					else :
						$rss_link = get_bloginfo( 'rss2_url' );
					endif;
					?>
					<li class="rss ir">
						<a href="<?php echo esc_url( $rss_link ); ?>" title="<?php _e( 'Subscribe via RSS', 'framework' ); ?>"><?php _e( 'Subscribe', 'framework' ); ?></a>
					</li>
				<?php endif; ?>
			</ul><!-- .social-networking -->
		
		<?php	endif; // end social network check ?>
		
		<ul id="role-credits" role="contentinfo">
			<?php
  		/**
  		 * Copyright
  		 *
  		 */
			$of_footer_copyright_default = 'Debut - All Rights Reserved';
			$of_footer_copyright = stripslashes( c7s_get_option( 'footer_copyright', $of_footer_copyright_default ) ); ?>
			
		  <li class="copyright"><?php echo __( '&copy; Copyright ', 'framework' ) . date( 'Y ' ) . esc_html( $of_footer_copyright ); ?></li>
		  
		  <?php 
  		/**
  		 * Footer Text
  		 *
  		 */
		  $of_footer_text_default = __( 'Powered by ', 'framework' ) . '<a href="http://www.wordpress.org" title="WordPress.org">' . __( 'WordPress', 'framework' ) . '</a>';
		  $of_footer_text = stripslashes( c7s_get_option( 'footer_text', $of_footer_text_default ) ); ?>
		  
		  <li class="footer-text"><?php echo $of_footer_text; ?> | <?php do_action( 'c7s_user_login' ) ?></li>
		</ul><!-- #role-credits -->
		
	</footer><!-- #footer -->

</div><!-- #footer-container -->
	

<?php wp_footer(); ?>


</body>
</html>