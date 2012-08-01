<?php
/*
Plugin Name: Custom Flickr Photostream
Plugin URI: http://www.celtic7.com
Description: A widget that displays your Flickr photos
Version: 1.1
Author: Luke McDonald
Author URI: http://www.lukemcdonald.com
*/

add_action( 'widgets_init', 'c7s_flickr_widgets' );

function c7s_flickr_widgets() {
	register_widget( 'c7s_flickr_widget' );
}

class c7s_flickr_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Setup
/*-----------------------------------------------------------------------------------*/

	function c7s_flickr_widget() {
		$widget_ops = array( 'classname' => 'c7s-flickr-widget', 'description' => __( 'Show Flickr photos', 'framework' ) );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'c7s_flickr_widget' );
		$this->WP_Widget( 'c7s_flickr_widget', __( 'Custom Flickr Photos', 'framework' ), $widget_ops, $control_ops );
	}
	
	
/*-----------------------------------------------------------------------------------*/
/*	Setup
/*-----------------------------------------------------------------------------------*/

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'] );
		$flickrID = $instance['flickrID'];
		$postcount = $instance['postcount'];
		$type = $instance['type'];
		$display = $instance['display'];

		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title;

		 ?>
			
			<div class="clearfix flickr-badge-wrapper">
				<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $postcount ?>&amp;display=<?php echo $display ?>&amp;size=s&amp;layout=x&amp;source=<?php echo $type ?>&amp;<?php echo $type ?>=<?php echo $flickrID ?>"></script>
			</div>
		
		<?php

		echo $after_widget;
	}


/*-----------------------------------------------------------------------------------*/
/*	Update
/*-----------------------------------------------------------------------------------*/

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['flickrID'] = strip_tags( $new_instance['flickrID'] );
		$instance['postcount'] = $new_instance['postcount'];
		$instance['type'] = $new_instance['type'];
		$instance['display'] = $new_instance['display'];

		return $instance;
	}
	
/*-----------------------------------------------------------------------------------*/
/*	Settings
/*-----------------------------------------------------------------------------------*/

	function form( $instance ) {

		$defaults = array(
		'title' => 'My Photostream',
		'flickrID' => '49559723@N04',
		'postcount' => '9',
		'type' => 'user',
		'display' => 'random',
		);
		$instance = wp_parse_args( ( array ) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'framework') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<!-- Flickr ID: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'flickrID' ); ?>"><?php _e('Flickr ID:', 'framework') ?> (<a href="http://idgettr.com/" target="_blank"><?php _e( 'idGettr', 'framework' ); ?></a>)</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'flickrID' ); ?>" name="<?php echo $this->get_field_name( 'flickrID' ); ?>" value="<?php echo $instance['flickrID']; ?>" />
		</p>
		
		<!-- Postcount: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'postcount' ); ?>"><?php _e('Number of Photos:', 'framework') ?></label>
			<select id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" class="widefat">
				<option <?php if ( '3' == $instance['postcount'] ) echo 'selected="selected"'; ?>>3</option>
				<option <?php if ( '6' == $instance['postcount'] ) echo 'selected="selected"'; ?>>6</option>
				<option <?php if ( '9' == $instance['postcount'] ) echo 'selected="selected"'; ?>>9</option>
			</select>
		</p>
		
		<!-- Type: Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id( 'type' ); ?>"><?php _e('Type (user or group):', 'framework') ?></label>
			<select id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" class="widefat">
				<option <?php if ( 'user' == $instance['type'] ) echo 'selected="selected"'; ?>>user</option>
				<option <?php if ( 'group' == $instance['type'] ) echo 'selected="selected"'; ?>>group</option>
			</select>
		</p>
		
		<!-- Display: Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id( 'display' ); ?>"><?php _e('Display (random or latest):', 'framework') ?></label>
			<select id="<?php echo $this->get_field_id( 'display' ); ?>" name="<?php echo $this->get_field_name( 'display' ); ?>" class="widefat">
				<option <?php if ( 'random' == $instance['display'] ) echo 'selected="selected"'; ?>>random</option>
				<option <?php if ( 'latest' == $instance['display'] ) echo 'selected="selected"'; ?>>latest</option>
			</select>
		</p>
		
	<?php
	}
}
?>