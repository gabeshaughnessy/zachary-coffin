<?php
/*
Plugin Name: Custom 220x125 Ad Block
Plugin URI: http://www.celtic7.com
Description: Configure a single 220x125 advertisement area
Version: 1.1
Author: Luke McDonald
Author URI: http://www.lukemcdonald.com
*/

add_action( 'widgets_init', 'c7s_ad_220x125_widgets' );

function c7s_ad_220x125_widgets() {
	register_widget( 'c7s_ad_220x125_widget' );
}

class c7s_ad_220x125_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Setup
/*-----------------------------------------------------------------------------------*/

	function c7s_ad_220x125_widget() {
		/* Widget settings */
		$widget_ops = array( 'classname' => 'c7s-ad-widget', 'description' => __( 'Display a single 220x125 ad block.', 'framework') );

		/* Widget control settings */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'c7s_ad_220x125_widget' );

		/* Create the widget */
		$this->WP_Widget( 'c7s_ad_220x125_widget', __( 'Custom Ad 220x125 - Sidebar', 'framework' ), $widget_ops, $control_ops );
	}

/*-----------------------------------------------------------------------------------*/
/*	Display
/*-----------------------------------------------------------------------------------*/

	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters( 'widget_title', $instance['title'] );
		$ad = $instance['ad'];
		$link = $instance['link'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . esc_html( $title ) . $after_title;
			
		/* Display a containing div */
		echo '<div class="ad-220x125">';

		/* Display Ad */
		if ( $link )
			echo '<a href="' . esc_url( $link ) . '"><img src="' . esc_url( $ad ) . '" width="220" height="125" alt="" /></a>';
			
		elseif ( $ad )
		 	echo '<img src="' . esc_url( $ad ) . '" width="220" height="125" alt="" />';
			
		echo '</div>';

		/* After widget (defined by themes). */
		echo $after_widget;
	}

/*-----------------------------------------------------------------------------------*/
/*	Update
/*-----------------------------------------------------------------------------------*/

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['ad']    = esc_url_raw( strip_tags( $new_instance['ad'] ) );
		$instance['link']  = esc_url_raw( strip_tags( $new_instance['link'] ) );

		return $instance;
	}
	
/*-----------------------------------------------------------------------------------*/
/*	Settings
/*-----------------------------------------------------------------------------------*/

	function form( $instance ) {
	
		$defaults = array(
			'title' => '',
			'ad'    => get_template_directory_uri() . "/images/banner-220x125.png",
			'link'  => 'http://www.lukemcdonald.com',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'debut') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Ad image url: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ad' ); ?>"><?php _e('Ad image url:', 'debut') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'ad' ); ?>" name="<?php echo $this->get_field_name( 'ad' ); ?>" value="<?php echo $instance['ad']; ?>" />
		</p>
		
		<!-- Ad link url: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e('Ad link url:', 'debut') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" value="<?php echo $instance['link']; ?>" />
		</p>
		
	<?php
	}
}
?>