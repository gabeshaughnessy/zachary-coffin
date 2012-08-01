<?php 
//Media Box -- appears above posts that have had a media soource added, for example a youtube url will embed a video in the media box.
?> 
<div class="media_box">
<?php
$media_source = get_post_meta($post->ID, 'video_url', true);
		$media_width = 610;
		$media_height = 460;
		if($media_source){
		$wp_embed = new WP_Embed();
		$the_media = $wp_embed->run_shortcode( '[embed width='. $media_width . ' height='. $media_height .']' . $media_source . '[/embed]' );
	     echo $the_media; 
	     }
?>
</div>