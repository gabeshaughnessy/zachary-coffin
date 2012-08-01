<?php

$options[] = array( 
  'name' => __( 'Logos', 'framework' ),
  'type' => 'heading'
);


// Logos
$options[] = array( 
  'name'  => __( 'Logos', 'framework' ),
  'desc'  => __( 'The following options allow you to add your own custom logos.', 'framework' ),
  'class' => 'featured toggle-section',
  'type'  => 'info'
);

$options[] = array(
  'name'    => __( 'Miscellaneous Logo Options', 'framework' ),
  'desc'    => __( '', 'framework' ),
  'id'      => 'logo_options',
  'std'     => '',
  'type'    => 'multicheck',
  'options' => array( 
  	'logo_text'        => __( 'Use a text based logo.' ), 
  	'site_description' => __( 'Show site description below logo' )
  )
);

$options[] = array( 
  'name' => __( 'Image Logo', 'framework' ),
  'desc' => __( 'Upload an image based logo for the website.', 'framework' ),
  'id'   => 'logo_image',
  'std'  => '',
  'type' => 'upload'
);

$options[] = array( 
  'name' => __( 'Login Logo', 'framework' ),
  'desc' => __( 'Upload an image based logo for the login pages. Recommended size is 325px x 80px.', 'framework' ),
  'id'   => 'logo_login',
  'std'  => '',
  'type' => 'upload'
);


// Icons
$options[] = array( 
  'name'  => __( 'Icons', 'framework' ),
  'desc'  => __( 'The following options allow you to add your own Favicon, Apple Touch Icon, and Gravatar.', 'framework' ),
  'class' => 'featured toggle-section',
  'type'  => 'info'
);

$options[] = array( 
  'name' => __( 'Favicon', 'framework' ),
  'desc' => __( 'Upload and configure a custom favicon. It is recommended that you use an image that is proportionally square (e.g. 50px x 50px).', 'framework' ),
  'id'   => 'icon_favicon',
  'std'  => '',
  'type' => 'upload'
);

$options[] = array( 
  'name' => __( 'Apple Touch Icon', 'framework' ),
  'desc' => __( 'Upload and configure a custom favicon. It is recommended that you use an image that is proportionally square (e.g. 50px x 50px).', 'framework' ),
  'id'   => 'icon_apple_touch',
  'std'  => '',
  'type' => 'upload'
);

$options[] = array( 
  'name' => __( 'Gravatar Icon', 'framework' ),
  'desc' => __( 'Upload and configure a custom default gravatar and select it from the "Discussion" options which can be found under', 'framework' ) . '<strong>' . __( 'Settings > Discussion', 'framework' ) . '</strong>' . __( '.  It is recommended that you use an image that is proportionally square and large (e.g. "512px x 512px").', 'framework' ),
  'id'   => 'icon_gravatar',
  'std'  => '',
  'type' => 'upload'
);
