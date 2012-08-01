<?php 
// Get MediaAccess global variable
global $wpalchemy_media_access; 
?>

<div id="c7s-hero" class="c7s-metabox">

	<div class="metabox-tabs-div">
	  
	  <ul class="metabox-tabs" id="metabox-tabs">
	  	<li class="active tab1"><a class="active" href="javascript:void(null);"><?php echo __( 'Content Layout', 'framework' ); ?></a></li>
	  	<li class="tab2"><a href="javascript:void(null);"><?php echo __( 'Additional Links', 'framework' ); ?></a></li>
	  	<li class="tab3"><a href="javascript:void(null);"><?php echo __( 'Background Image', 'framework' ); ?></a></li>
	  	<li class="tab4"><a href="javascript:void(null);"><?php echo __( 'Help', 'framework' ); ?></a></li>
	  </ul>
	  
	  <div class="tab1">
	  	<h4 class="heading"><?php echo __( 'Content Layout', 'framework' ); ?></h4>
	  	<table class="form-table">
	  		<tr>
					<th scope="col"><?php echo __( 'Position', 'framework' ); ?></th>
					<th scope="col"><?php echo __( 'Visibility', 'framework' ); ?></th>
					<th scope="col"><?php echo __( 'Color ', 'framework' ) . '<span style="font-weight: normal">' . __( '(Text ', 'framework' ) . '<em>' . __( 'on ', 'framework' ) . '</em>' . __( 'Bg)', 'framework' ) . '</span>'; ?></th>
	  		</tr>
	  		<tr>
	  			<td>
	  	  		<?php $mb->the_field( 'position' ); ?>
	  	  	  <input type="radio" name="<?php $mb->the_name(); ?>" value="alignleft"<?php $mb->the_radio_state( 'alignleft' ); ?>/> <?php echo __( 'Left Side', 'framework' ); ?><br />
	  	  	  <input type="radio" name="<?php $mb->the_name(); ?>" value="centercontent"<?php $mb->the_radio_state( 'centercontent' ); ?>/> <?php echo __( 'Center Content', 'framework' ); ?><br />
	  	  	  <input type="radio" name="<?php $mb->the_name(); ?>" value="centermedia"<?php $mb->the_radio_state( 'centermedia' ); ?>/> <?php echo __( 'Center Media Embed', 'framework' ); ?><br />
	  	  	  <input type="radio" name="<?php $mb->the_name(); ?>" value="alignright"<?php $mb->the_radio_state( 'alignright' ); ?>/> <?php echo __( 'Right Side', 'framework' ); ?>
	  			</td>
	  			<td>
						<?php $mb->the_field( 'hero_title' ); ?>
						<label><input type="checkbox" name="<?php $mb->the_name(); ?>" value="1"<?php if ( $mb->get_the_value() ) echo ' checked="checked"'; ?>/> 
						<?php echo __( 'Hide Title', 'framework' ); ?></label><br />
						<?php $mb->the_field( 'hero_content' ); ?>
						<label><input type="checkbox" name="<?php $mb->the_name(); ?>" value="1"<?php if ( $mb->get_the_value() ) echo ' checked="checked"'; ?>/>
						<?php echo __( 'Hide Content', 'framework' ); ?></label><br />
						<?php $mb->the_field( 'hero_media' ); ?>
						<label><input type="checkbox" name="<?php $mb->the_name(); ?>" value="1"<?php if ( $mb->get_the_value() ) echo ' checked="checked"'; ?>/>
						<?php echo __( 'Hide Media Embed', 'framework' ); ?></label><br />						<?php $mb->the_field( 'hero_more_link' ); ?>
						<label><input type="checkbox" name="<?php $mb->the_name(); ?>" value="1"<?php if ( $mb->get_the_value() ) echo ' checked="checked"'; ?>/>
						<?php echo __( 'Hide More Link', 'framework' ); ?></label>
	  			</td>
	  			<td>
				  	<?php $mb->the_field( 'color' ); ?>
				  	<input type="radio" name="<?php $mb->the_name(); ?>" value="dark-on-light"<?php $mb->the_radio_state( 'dark-on-light' ); ?>/> 
				  	<?php echo __( 'Dark', 'framework' ) . ' <em>' . __( 'on', 'framework' ) . '</em>' . __( ' Light', 'framework' ); ?><br />
				  	<input type="radio" name="<?php $mb->the_name(); ?>" value="light-on-dark"<?php $mb->the_radio_state( 'light-on-dark' ); ?>/> 
				  	<?php echo __( 'Light', 'framework' ) . ' <em>' . __( 'on', 'framework' ) . '</em>' . __( ' Dark', 'framework' ); ?><br />
				  	<input type="radio" name="<?php $mb->the_name(); ?>" value="dark-on-none"<?php $mb->the_radio_state( 'dark-on-none' ); ?>/> 
				  	<?php echo __( 'Dark', 'framework' ) . ' <em>' . __( 'on', 'framework' ) . '</em>' . __( ' None', 'framework' ); ?><br />
				  	<input type="radio" name="<?php $mb->the_name(); ?>" value="light-on-none"<?php $mb->the_radio_state( 'light-on-none' ); ?>/> 
				  	<?php echo __( 'Light', 'framework' ) . ' <em>' . __( 'on', 'framework' ) . '</em>' . __( ' None', 'framework' ); ?><br />
	  			</td>
	  		</tr>
	  	</table>
	  </div><!-- .tabs1 -->
	 
	  <div class="tab2">
	  	<h4 class="heading"><?php echo __( 'Additional Links', 'framework' ); ?></h4>
	  	<table>
	  		<thead>
	  			<tr>
	  			  <th class="w25"><h4><?php echo __( 'Custom Links' , 'framework' ); ?></h4></th>
	  			  <td class="w50"><p><?php echo __( 'Add custom links to this post that will show up on the home page\'s hero section. Reorder links by drag and drop.' , 'framework' ); ?></p></td>
	  			  <td class="w25 textright"><p><a class="dodelete deletion right" href="#"><?php echo __( 'Remove All', 'framework' ); ?></a></p></td>
	  			</tr>
	  		</thead>
	  	</table>
	  	
			<?php while( $mb->have_fields_and_multi( 'links' ) ): ?>
			<?php $mb->the_group_open(); ?>
	  	<table class="form-table">
	  		<tbody>
	  			<tr>
					  <td>
					    <label><?php echo __( 'Link Title' , 'framework' ); ?></label><br />
					    <?php $mb->the_field( 'title' ); ?>
					    <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
					  </td>
					  <td>
					    <label><?php echo __( 'Link URL' , 'framework' ); ?></label><br />
					   	<?php $mb->the_field( 'link' ); ?>
					    <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
					  </td>
					  <td>
					  	<label><?php echo __( 'Link Target' , 'framework' ); ?></label><br />
					  	<?php $selected = ' selected="selected"'; ?>
					  	<?php $mb->the_field( 'target' ); ?>
					  	<select name="<?php $mb->the_name(); ?>">
					  	  <option value=""></option>
					  	  <option value="_self"<?php if ( $mb->get_the_value() == '_self' ) echo $selected; ?>>_self</option>
					  	  <option value="_blank"<?php if ( $mb->get_the_value() == '_blank' ) echo $selected; ?>>_blank</option>
					  	  <option value="_parent"<?php if ( $mb->get_the_value() == '_parent' ) echo $selected; ?>>_parent</option>
					  	  <option value="_top"<?php if ( $mb->get_the_value() == '_top' ) echo $selected; ?>>_top</option>
					  	</select>
					  </td>
					  <td class="textright">
					  	<input type="button" class="dodelete button right" value="<?php echo __( 'Remove', 'framework' ); ?>" />
					    <input type="button" class="docopy-links button right" value="<?php echo __( 'Add', 'framework' ); ?>" />
					  </td>
	  			</tr>
	  		</tbody>
	  	</table>
			<?php $mb->the_group_close(); ?>
			<?php endwhile; ?>
	  </div><!-- .tab2 -->
	  
	  <div class="tab3">
			<table class="form-table">
				<thead>
					<tr>
						<td scope="row" colspan="2">
							<p>
								<?php _e( 'By default, the featured thumbnail is used for the background image of the post in the Hero slider. The option to upload a custom background image for this post can be set. This will override the featured thumbnail if set. The recommended size of the Hero slider image is 940x350.', 'framework' ); ?>
							</p>
						</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="w66">
			  			<?php $mb->the_field( 'hero_background_image' ); ?>
			  			<?php $wpalchemy_media_access->setGroupName( 'n' . $mb->get_the_index() )->setInsertButtonLabel( 'Insert Background Image' ); ?>
			  			<?php echo $wpalchemy_media_access->getField( array( 'name' => $mb->get_the_name(), 'value' => $mb->get_the_value() ) ); ?>
						</td>
						<td class="w33">
							<div style="margin: 10px 0;">
								<?php echo $wpalchemy_media_access->getButton( array( 'label' => 'Add Background Image', 'class' => 'media-access-button' ) ); ?>
							</div>
						</td>
					</tr>
					<?php	if( $mb->get_the_value( 'hero_background_image' ) ) : ?>
						<tr>
							<td scope="row" colspan="2">
								<h4><?php echo __( 'Background Image Preview', 'framework' ); ?></h4>
								<p><?php echo '<a href="' . esc_url( $mb->get_the_value() ) . '" title="Link to Hero background preview image" target="_blank"><img src="' . esc_url( $mb->get_the_value() ) . '" alt="Hero background preview image" /></a>'; ?></p>
							</td>
						</tr>
			  	<?php endif; // end custom background image check ?>
				</tbody>
			</table>
	  </div><!-- .tab3 -->
	  
	  <div class="tab4">
	  	<h4 class="heading"><?php echo __( 'Help', 'framework' ); ?></h4>
	  	<table class="form-table">
	  		<thead>
	  			<tr>
	  				<td scope="row" colspan="2">
	  					<p><?php echo __( 'The "Hero" area of the theme is the large (940x350) image slider located on the home page. This area provides the option to uniquely display the posts information in the home pages "Hero" area. Various options are available to control this area which can be set here. Additionally, more General Options, such as setting a particular category, can be set in the Theme Options.', 'framework' ); ?></p>
						</td>
	  			</tr>
	  		</thead>
	  		<tbody>
	  			<tr>
	  				<th scope="row"><h4><?php echo __( 'Content Layout', 'framework' ); ?></h4></th>
	  				<td>
	  					<p><?php echo __( 'By default, the Hero area pulls in the posts Title, Excerpt, Featured Image (as background), and a More Link (linking to post). The ability to adjust how those elements are shown can be set by the option settings described below.', 'framework' ); ?></p>
	  					<p><?php echo '<strong>' . __( 'Position: ', 'framework' ) . '</strong>' . __( 'Decide to show the post content on the Left, Center, or Right side of the Hero area. If the center is a desired location, only the Content or the Media Embed (if set), can be centered. The options to do so are provided.', 'framework' ); ?></p>
	  					<p><?php echo '<strong>' . __( 'Visibility: ', 'framework' ) . '</strong>' . __( 'This area allows for different elements to be hidden. Simply check the box and the element is hidden.', 'framework' ); ?></p>
	  					<p><?php echo '<strong>' . __( 'Color: ', 'framework' ) . '</strong>' . __( 'The color option allows for a little bit of control to match the content background color to the featured image used. The option to not have a background color behind the content is provided as well.', 'framework' ); ?></p>
	  				</td>
	  			</tr>
	  			<tr>
	  				<th scope="row"><h4><?php echo __( 'Additional Links', 'framework' ); ?></h4></th>
	  				<td><?php echo __( 'Additional links can be added to show in similar fashion as the Read More link of the hero area. There is no limit to the amount of additional links that can be set, however, use a maximum of 3 links for best results (including the "More Link"). The option to Add/Remove/Remove All links is available by clicking on the respective buttons. Links can also be re-ordered by dragging and dropping into place. Remember to update the post after re-ordering the links. ', 'framework' ); ?></td>
	  			</tr>
	  			<tr>
	  				<th scope="row"><h4><?php echo __( 'Background Image', 'framework' ); ?></h4></th>
	  				<td>
	  					<p><?php echo __( 'By default, the featured thumbnail is used for the background image of the post in the Hero slider. The option to upload a custom background image for this post can be set. This will override the featured thumbnail if set. The recommended size of the Hero slider image is 940x350.', 'framework' ); ?></p>
	  					<p><?php echo __( 'Uploading an image is easy. By clicking on the "Upload Background Image" button, a familiar pop up box will appear. Follow the same steps you would use to upload an image. After the image is uploaded or selected from the media library, be sure to choose the correct size to insert, which in most cases will be the ', 'framework' ) . '<strong>' . __( '"Full Image" ', 'framework' ) . '</strong>' . __( 'size. Lastly, simple click the "Insert Background Image" button located next to the familiar "Use As Featured Image" link.', 'framework' ); ?></p>
	  					<p><?php echo __( 'In addition, to help get the images to fit this theme better, you can adjust the Full Image size options. To do this, go to ', 'framework' ) . '<strong>' . __( '"Settings -> Media" ', 'framework' ) . '</strong>' . __( 'and set the "Large size" options to 940 for both width and height. This is the max width of the Hero slider area.', 'framework' ); ?></p>
	  				</td>
	  			</tr>
	  		</tbody>
	  	</table>
	  </div><!-- .tab3 -->
	
	</div><!-- .metabox-tabs-div -->

</div> <!-- wpalchemy-metabox -->

<style type="text/css">
/* Group Styles */
#wpa_loop-links .wpa_group {
  cursor: move;
  overflow: hidden;
  border-bottom: 1px dotted #E3E3E3;
  background: url(<?php echo C7S_ADMINURL; ?>/images/corner.png) no-repeat;
}
#wpa_loop-links .wpa_group:nth-child(odd) {
  background-color: #fff;
}
#wpa_loop-links .wpa_group:hover {
  background-color: #eaf2fb;
}
#wpa_loop-links .slide-highlight {
  height: 70px;
  border: 3px dashed #E3E3E3;
  background: #f5f5f5;
}
</style>

<script type="text/javascript">
//<![CDATA[
	
	jQuery(function($)
	{
		$("#wpa_loop-links").sortable({
			placeholder: 'slide-highlight',
			change: function() {
				$('.sort-warning').show();
			}
		});
	})
	
//]]>
</script>


