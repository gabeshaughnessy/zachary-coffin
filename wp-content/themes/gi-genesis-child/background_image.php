<?php //Background Image Markup and the Like

global $post;
		$bg_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'big-background'); //get the big background sized image
		?>
		<div class="bg_image">
			<img src="<?php 
			if($bg_image[0]){
			echo $bg_image[0]; 
			}
			else {
			echo of_get_option('default_bg');
			}
			?>" alt="" width="100%" height="auto" />
		</div>
	