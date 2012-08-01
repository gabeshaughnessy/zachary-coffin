<div id="c7s-media" class="c7s-metabox">

	<div class="metabox-tabs-div">
		<p><?php echo __( 'It\'s super easy to embed videos, images, and other content into your WordPress site. Okay, so ', 'framework' ) . '<a href="http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F" target="_blank">' . __( 'what sites can you embed from?', 'framework' ) . '</a>'; ?></p>
		
	  <ul class="metabox-tabs">
	  	<li class="active tab1"><a class="active" href="javascript:void(null);"><?php echo __( 'URL', 'framework' ); ?></a></li>
	  	<li class="tab2"><a href="javascript:void(null);"><?php echo __( 'Code', 'framework' ); ?></a></li>
	  	<li class="tab3"><a href="javascript:void(null);"><?php echo __( 'Help', 'framework' ); ?></a></li>
	  </ul>
	  
	  <div class="tab1">
	  	<h4 class="heading"><?php echo __( 'URL', 'framework' ); ?></h4>
	  	<table>
	  		<tr>
	  			<td scope="row" colspan="2">
	  				<label><strong><?php echo __( 'Media Source', 'framework' ); ?></strong></label>
	  				<?php $mb->the_field( 'media_source' ); ?>
	  				<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	  			</td>
	  		</tr>
	  		<tr>
	  			<td>
			  		<label><strong><?php echo __( 'Custom Width', 'framework' ); ?></strong></label>
	  				<?php $mb->the_field( 'media_width' ); ?>
			  		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	  			</td>
	  			<td>
			  		<label><strong><?php echo __( 'Custom Height', 'framework' ); ?></strong></label>
			  		<?php $mb->the_field( 'media_height' ); ?>
			  		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	  			</td>
	  		</tr>
	  	</table>
	  </div><!-- .tab1 -->
	  
	  <div class="tab2">
	  	<h4 class="heading"><?php echo __( 'Code', 'framework' ); ?></h4>
	  	<table>
	  		<tr>
	  			<td>
						<?php $mb->the_field( 'media_embed_code' ); ?>
						<label><strong><?php echo __( 'Custom Embed Code', 'framework' ); ?></strong></label>
						<textarea name="<?php $mb->the_name(); ?>" rows="4"><?php $mb->the_value(); ?></textarea>
	  			</td>
	  		</tr>
	  	</table>
	  </div><!-- .tab2 -->
	  
	  <div class="tab3">
	  	<h4 class="heading"><?php echo __( 'Help', 'framework' ); ?></h4>
	  	<table>
	  		<tr>
	  			<td>
	  				<strong><?php echo __( 'In General...', 'framework' ); ?></strong>
	  				<p><?php echo __( 'The Media Embed option (', 'framework' ) . '<a href="http://codex.wordpress.org/Embeds#oEmbed" target="_blank">' . __( 'oEmbed', 'framework' ) . '</a>' . __( ') allows you to embed media from various external sites easily. This theme uses the media embed in various ways, inserting it into the theme already sized for the best results.', 'framework' ); ?></p>
	  			</td>
	  		</tr>
	  		<tr>
	  			<td>
	  				<strong><?php echo __( 'URL Option', 'framework' ); ?></strong>
	  				<p><?php echo __( 'To use this option, simply copy and past the URL of media content from an ', 'framework' ) . '<a href="http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F" target="_blank">' . __( 'approved site', 'framework' ) . '</a>' . __( '(e.g. youtube.com). ', 'framework' ) . '<em>' . __( 'The option to resize the media is available, but not recommended', 'framework' ) . '</em> ' . __( 'as the media is already sized for best results.', 'framework' ); ?></p>
	  			</td>
	  		</tr>
	  		<tr>
	  			<td>
	  				<strong><?php echo __( 'Code Option', 'framework' ); ?></strong>
	  				<p><?php echo __( 'Same as the URL option, only it takes embed code if provided. This option will override the URL Option.', 'framework' ); ?></p>
	  			</td>
	  		</tr>
	  		<tr>
	  			<td>
	  				<strong><?php echo __( 'Media Preview', 'framework' ); ?></strong>
	  				<p><?php echo __( 'If set, a preview of the media embed option that will show in the website will be shown below. This is done after the page has been Published or Updated', 'framework' ); ?></p>
	  			</td>
	  		</tr>
			</table>
	  </div><!-- .tab3 -->
	  
	</div><!-- .metabox-tabs-div -->
	
	<?php if( $mb->get_the_value( 'media_source' ) || $mb->get_the_value( 'media_embed_code' ) ) : ?>
	  <div class="c7s-embed-preview" style="padding-top: 8px">
	  		<?php do_action( 'get_media', false, '258', '258' ); ?>
	  </div>
	<?php endif; ?>
	  
</div><!-- .c7s-metabox -->

<style type="text/css">

#c7s-embed-preview {
	display: block;
	border: 1px solid #DFDFDF;
	border-top: none;
}

</style>