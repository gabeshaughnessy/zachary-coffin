<?php //Background Image Markup and the Like	?>
		<div class="bg_image">
			<img src="<?php 
			if(of_get_option('blog_bg')){
			echo of_get_option('blog_bg');
			}	
			else {
			echo of_get_option('default_bg');
			}
			?>" alt="" width="100%" height="auto" />
		</div>
	