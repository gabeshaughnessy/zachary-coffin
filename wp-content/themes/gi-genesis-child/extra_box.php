<?php 
//Extras box appears on the right side of works, posts and pages and can contain an image gallery if images are uploaded to the post
?>
<div class="extra_box">
<?php echo get_the_post_thumbnail($post->ID, 'post-image'); 
?>

<?php
$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
					if ( $images ) :
					foreach($images as $image){
						$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
						$image_atts =  wp_get_attachment_image_src( $image->ID, 'large' );
						$caption = $image->post_excerpt;
				?>

				<div class="gallery-thumb">
					<a href="<?php echo $image_atts[0] ?>" rel="lightbox[<?php echo 'gallery ' . $post->ID; ?>]" title="<?php echo $caption; ?>"><?php echo $image_img_tag; ?> </a>
				</div><!-- .gallery-thumb --><?php 
				}
				endif; ?>
				
</div>