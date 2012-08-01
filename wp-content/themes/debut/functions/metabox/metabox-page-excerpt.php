<div id="c7s-page-excerpt" class="c7s-metabox">
	
	<div class="content">
		
		<p><?php echo __( 'Highlighted text shown after the page title. A little HTML is accepted.', 'framework' ); ?></p>
		
		<p>
		  <?php $mb->the_field( 'page_excerpt' ); ?>
		  <textarea name="<?php $mb->the_name(); ?>" ><?php $mb->the_value(); ?></textarea><br />
		</p>
	
	</div>
	<!-- .content -->
	
</div>
<!-- #c7s-page-excerpt -->
