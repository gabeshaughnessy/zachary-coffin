<?php //Background Image for the Archive Pages
global $post;
		$bg_image = apply_filters( 'taxonomy-images-queried-term-image-url', '', array(
    'image_size' => 'big-background'
    ) );
    
		?>
		<div class="bg_image">
			<img src="<?php 
if($bg_image){
			echo $bg_image; 
			}
			else {
			echo of_get_option('default_bg');
			}
			?>" alt="" width="100%" height="auto" />
		</div>
		<?php
		
		?>