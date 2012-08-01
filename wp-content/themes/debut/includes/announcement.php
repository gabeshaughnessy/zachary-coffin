<?php  
/**
 * The announcement template file. This includes the options and settings
 * necessary to display the announcment set via the theme options.
 *
 * @package WordPress
 * @subpackage Debut
 * @since Debut 2.0
 *
 */


/**
 * Announcment Setup
 *
 */
 
// Get theme options
$announcement_title = c7s_get_option( 'announcement_title' );

if ( $announcement_title ) : // Show announcment if it atleast has a title enabled in theme options ?>

	<?php
	// Get theme options  
	$announcement_message      = c7s_get_option( 'announcement_message' );
	$announcement_button_title = c7s_get_option( 'announcement_button_title' );
	$announcement_button_link  = c7s_get_option( 'announcement_button_link' );
	?>

	<section id="announcement" role="note">
		
		<div class="content">
		
			<h3>
				<?php 
				/**
				 * Announcment Title
				 *
				 */
				esc_html_e( $announcement_title, 'framework' ); ?>
			</h3>
		
			<p>
				<?php 
				/**
				 * Announcment Message
				 *
				 */
				esc_html_e( $announcement_message, 'framework' ); ?>
			</p>
		
		</div><!-- .content -->
		
		<?php 
		/**
		 * Announcment Button
		 *
		 */
		if ( $announcement_button_title && $announcement_button_link ) : // Show button if announcement button title and link are enabled in theme options ?>
		
			<div class="link">
			  
				<a href="<?php echo esc_url( $announcement_button_link ) ?>" title="<?php esc_attr_e( $announcement_button_title, 'framework' ); ?>"><?php esc_html_e( $announcement_button_title, 'framework' ); ?></a>
			
			</div><!-- .link -->
		
		<?php	endif; // end button title and link check	?>
		
	</section><!-- #announcement -->

<?php endif; // end announcment title check ?>
