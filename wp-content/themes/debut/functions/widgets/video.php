<?php
/*
Plugin Name: Custom Video Widget
Plugin URI: http://www.celtic7.com
Description: Display a video
Version: 1.1
Author: Luke McDonald
Author URI: http://www.lukemcdonald.com
*/

add_action( 'widgets_init', 'c7s_video_widgets' );

function c7s_video_widgets() {
	register_widget( 'c7s_video_widget' );
}

class c7s_video_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Setup
/*-----------------------------------------------------------------------------------*/

	function c7s_video_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'c7s-video-widget', 'description' => __( 'Embed a video', 'framework' ) );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'c7s_video_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'c7s_video_widget', __( 'Custom Video Widget', 'framework' ), $widget_ops, $control_ops );
		
	}

/*-----------------------------------------------------------------------------------*/
/*	Display
/*-----------------------------------------------------------------------------------*/

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'] );
		$embed = $instance['embed'];
		$desc = $instance['desc'];

		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title;

		?>
			
			<div class="c7s-video entry-thumbnail">
				<?php echo $embed ?>
			</div>
			
		<?php if( $desc ) { ?>
			<p class="c7s-video-desc"><?php echo $desc ?></p>
		<?php }

		echo $after_widget;
	}

/*-----------------------------------------------------------------------------------*/
/*	Update
/*-----------------------------------------------------------------------------------*/
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['desc'] = stripslashes( $new_instance['desc'] );
		$instance['embed'] = stripslashes( $new_instance['embed']);

		return $instance;
	}
	
/*-----------------------------------------------------------------------------------*/
/*	Settings
/*-----------------------------------------------------------------------------------*/
	 
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
			'title' => 'My Video',
			'embed' => stripslashes( '<iframe src="http://player.vimeo.com/video/2104600?title=0&amp;byline=0&amp;portrait=0" width="200" height="113" frameborder="0"></iframe>' ),
			'desc' => 'By supporting this theme, you are making a difference!',
		);
		$instance = wp_parse_args( ( array ) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'framework' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Embed Code: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'embed' ); ?>"><?php _e( 'Embed Code (Widths: Side 220px / Footer 240px)', 'framework' ) ?></label>
			<textarea style="height:200px;" class="widefat" id="<?php echo $this->get_field_id( 'embed' ); ?>" name="<?php echo $this->get_field_name( 'embed' ); ?>"><?php echo stripslashes( htmlspecialchars( ( $instance['embed'] ), ENT_QUOTES ) ); ?></textarea>
		</p>
		
		<!-- Description: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e( 'Short Description:', 'framework' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" value="<?php echo stripslashes( htmlspecialchars( ( $instance['desc'] ), ENT_QUOTES ) ); ?>" />
		</p>
		
	<?php
	}
}
?>