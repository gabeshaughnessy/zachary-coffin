<?php

$options[] = array( 
  'name' => __( 'Styles', 'framework' ),
  'type' => 'heading'
);

$options[] = array( 
  'name' => __( 'Custom Theme Styles', 'framework' ),
  'desc' => __( 'Yes, enable custom theme styles. <strong>This option must be checked in order for the following options to take effect.</strong>', 'framework' ),
  'id'   => 'enable_styles',
  'std'  => 0,
  'class' => 'featured toggle-section',
  'type' => 'checkbox'
);

$body_background_defaults = array('color' => '#333333', 'image' => esc_url( $imagepath ) . 'texture-dark.png', 'repeat' => 'repeat', 'position' => 'top left', 'attachment'=>'scroll');
$options[] = array(
  'name' => __( 'Body - Background', 'framework' ),
  'desc' => __( 'By default this is the dark grey texture. This can be something unique, like a large photo of your dog.', 'framework' ),
  'id'   => 'body_background',
  'std'  => $body_background_defaults,
  'type' => 'background'
);

$action_nav_background_defaults = array('color' => '#7fccff', 'image' => esc_url( $imagepath ) . 'texture-color.png', 'repeat' => 'repeat', 'position' => 'top left', 'attachment'=>'scroll');
$options[] = array(
  'name' => __( 'Action Nav - Background', 'framework' ),
  'desc' => __( 'By default this is a light blue textured color.', 'framework' ),
  'id'   => 'action_nav_background',
  'std'  => $action_nav_background_defaults,
  'type' => 'background'
);

$options[] = array(
  'name' => __( '', 'framework' ),
  'desc' => __( 'Action Nav - Text Color', 'framework' ),
  'id'   => 'action_nav_text_color',
  'std'  => '#333333',
  'type' => 'color'
);

$options[] = array(
  'name' => __( '', 'framework' ),
  'desc' => __( 'Top Nav - Text Color', 'framework' ),
  'id'   => 'top_nav_text_color',
  'std'  => '#a9a9a9',
  'type' => 'color'
);

$options[] = array(
  'name' => __( '', 'framework' ),
  'desc' => __( 'Main - Link Color', 'framework' ),
  'id'   => 'main_link_color',
  'std'  => '#7fccff',
  'type' => 'color'
);
