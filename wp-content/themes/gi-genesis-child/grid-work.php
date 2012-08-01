<a href="<?php the_permalink(); ?>" title="View <?php the_title(); ?>">
<?php 
echo get_the_post_thumbnail($post->ID, 'archive-thumb'); ?>
<?php
the_excerpt();
?>
</a>