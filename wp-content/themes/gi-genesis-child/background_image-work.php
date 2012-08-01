<?php //Background Image for the Work Archive
global $post;
		$bg_image = of_get_option('work_bg');
	    if($bg_image){
		?>
		<div class="bg_image">
			<img src="<?php 
			
			if($bg_image){
			echo $bg_image; 
			}
			else {
			echo of_get_option('default_bg');//get the default bg if one isn't present.
			}
			
			?>" alt="" width="100%" height="auto" />
		</div>
	<?php
		}
		?>