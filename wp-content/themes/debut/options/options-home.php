<?php

$options[] = array( 
  'name' => __( 'Home', 'framework' ),
  'type' => 'heading'
);


/*
 * Announcement
 */
$options[] = array( 
  'name' => __( 'Announcement', 'framework' ),
  'desc' => __( 'Easily add an announcement to the homepage by setting the following options.', 'framework' ),
  'class' => 'featured toggle-section',
  'type' => 'info'
);

$options[] = array( 
  'name'  => __( 'Announcement Title', 'framework' ),
  'id'    => 'announcement_title',
  'std'   => '',
  'type'  => 'text'
); 

$options[] = array(
  'name'  => __( 'Announcement Message', 'framework' ),
  'id'    => 'announcement_message',
  'std'   => '',
  'type'  => 'textarea'
); 

$options[] = array( 
  'name'  => __( 'Announcement Button Title', 'framework' ),
  'id'    => 'announcement_button_title',
  'std'   => '',
  'type'  => 'text'
); 

$options[] = array( 
  'name'  => __( 'Announcement Button Link (URL)', 'framework' ),
  'id'    => 'announcement_button_link',
  'std'   => '',
  'type'  => 'text'
);


/*
 * Hero
 */
 
$options[] = array( 
  'name' => __( 'Hero Slider', 'framework' ),
  'desc' => __( 'The following options control how the slider on the home page functions.', 'framework' ),
  'class' => 'featured toggle-section',
  'type' => 'info'
);

$options[] = array( 
  'name'  => __( 'Hero Slider Speed', 'framework' ),
  'desc'  => __( 'Speed (in seconds) at which the slides will animate between transitions.' ),
  'id'    => 'hero_cycle_speed',
  'std'   => '2',
  'class' => 'mini',
  'type'  => 'text'
);

$options[] = array( 
  'name'  => __( 'Hero Slider Timeout', 'framework' ),
  'desc'  => __( 'Time (in seconds) before transitioning to the next slide. Leave empty to disable.', 'framework' ),
  'id'    => 'hero_cycle_timeout',
  'std'   => '6',
  'class' => 'mini',
  'type'  => 'text'
);

$options[] = array(
  'name'    => __( 'Hero Transition Style', 'framework' ),
  'desc'    => __( 'Select a style from the drop down to control how the slides transition from one to the next. To see some of the effects in action, visit the <a href="http://jquery.malsup.com/cycle/browser.html" target="_blank">Cycle Plugin</a> effects page.', 'framework' ),
  'id'      => 'hero_cycle_fx',
  'std'     => __( 'scrollHorz' ),
  'type'    => 'select',
  'options' => array( 
  	'all'         => __( 'All Effects' ),
  	'blindX'      => __( 'Blinds - Horizontal' ),
  	'blindY'      => __( 'Blinds - Veritcal' ),
  	'blindZ'      => __( 'Blinds - Diagonal' ),
  	'cover'       => __( 'Cover' ),
  	'curtainX'    => __( 'Curtain - Horizontal' ),
  	'curtainY'    => __( 'Curtain - Veritcal' ),
  	'fade'        => __( 'Fade' ),
  	'fadeZoom'    => __( 'Fade Zoom' ),
  	'growX'       => __( 'Grow - Horizontal' ),
  	'growY'       => __( 'Grow - Vertical' ),
  	'none'        => __( 'None - No Effect' ),
  	'scrollUp'    => __( 'Scroll - Up' ),
  	'scrollDown'  => __( 'Scroll - Down' ),
  	'scrollLeft'  => __( 'Scroll - Left' ),
  	'scrollRight' => __( 'Scroll - Right' ),
  	'scrollHorz'  => __( 'Scroll - Horz' ),
  	'scrollVert'  => __( 'Scroll - Vert' ),
  	'shuffle'     => __( 'Shuffle' ),
  	'slideX'      => __( 'Slide - Horizontal' ),
  	'slideY'      => __( 'Slide - Vertical' ),
  	'toss'        => __( 'Toss' ),
  	'turnUp'      => __( 'Turn - Up' ),
  	'turnDown'    => __( 'Turn - Down' ),
  	'turnLeft'    => __( 'Turn - Left' ),
  	'turnRight'   => __( 'Turn - Right' ),
  	'uncover'     => __( 'Uncover' ),
  	'wipe'        => __( 'Wipe' ),
  	'zoom'        => __( 'Zoom' )
  )
);

$options[] = array(
  'name'    => __( 'Hero Category', 'framework' ),
  'desc'    => __( 'Select which categories should be shown in the hero area.', 'framework' ),
  'id'      => 'hero_category',
  'std'     => 'Select a category:',
  'type'    => 'select',
  'options' => __( $options_categories )
);

$options[] = array( 
  'name' => __( 'Hero Filter Posts by Featured Image', 'framework' ),
  'desc' => __( 'Only includes posts that have a featured image set.', 'framework' ),
  'id'   => 'hero_filter_thumbs',
  'std'  => 0,
  'type' => 'checkbox'
);

$options[] = array( 
  'name'  => __( 'Hero Number of Posts', 'framework' ),
  'desc'  => __( 'If you wish to only display a specific number of posts or all posts on the home page\'s hero, provide a number or enter -1 to show all posts.', 'framework' ),
  'id'    => 'hero_posts_per_page',
  'std'   => '',
  'class' => 'mini',
  'type'  => 'text'
);


/*
 * Featured
 */
 
$options[] = array( 
  'name' => __( 'Featured Content', 'framework' ),
  'desc' => __( 'The following options are for the featured area below the slider on the home page.', 'framework' ),
  'class' => 'featured toggle-section',
  'type' => 'info'
);

$options[] = array( 
  'name' => __( 'Featured Section Title', 'framework' ),
  'desc' => __( 'Name of the featured section. Generally, the type of posts that will be shown. (e.g. Featured Images)', 'framework' ),
  'id'   => 'featured_section_title',
  'std'  => '',
  'type' => 'text'
);

$options[] = array( 
  'name' => __( 'Featured Link Title', 'framework' ),
  'desc' => __( 'Provide a text link by inserting a title here. NOTE: Link required below.', 'framework' ),
  'id'   => 'featured_section_link_title',
  'std'  => '',
  'type' => 'text'
);

$options[] = array( 
  'name' => __( 'Featured Link URL', 'framework' ),
  'desc' => __( 'Provide a URL for the link (e.g. http://wordpress.com)', 'framework' ),
  'id'   => 'featured_section_link_url',
  'std'  => '',
  'type' => 'text'
);

$options[] = array(
  'name'    => __( 'Featured Category', 'framework' ),
  'desc'    => __( 'Select a specific category of posts to display.', 'framework' ),
  'id'      => 'featured_category',
  'std'     => __( 'Select a category:' ),
  'type'    => 'select',
  'options' => __( $options_categories )
);

$options[] = array( 
  'name'  => __( 'Featured Number of Posts', 'framework' ),
  'desc'  => __( 'Provide a number of featured posts to display. Enter -1 to show all posts. Leave blank to show your default number.', 'framework' ),
  'id'    => 'featured_posts_per_page',
  'std'   => '',
  'class' => 'mini',
  'type'  => 'text'
);

$options[] = array( 
  'name' => __( 'Featured Filter Posts by Featured Image', 'framework' ),
  'desc' => __( 'Only includes posts that have a featured image set.', 'framework' ),
  'id'   => 'featured_filter_thumbs',
  'std'  => 0,
  'type' => 'checkbox'
);

$options[] = array( 
  'name' => __( 'Featured Pagination', 'framework' ),
  'desc' => __( 'Show pagination for featured posts.', 'framework' ),
  'id'   => 'featured_enable_pagination',
  'std'  => 0,
  'type' => 'checkbox'
); 

$options[] = array(
  'name'    => __( 'Featured Layout Options', 'framework' ),
  'id'      => 'featured_hide',
  'std'     => '',
  'type'    => 'multicheck',
  'options' => array( 
  	'images'    => __( 'Hide Images' ), 
  	'titles'    => __( 'Hide Titles' ), 
  	'content'   => __( 'Hide Content' ), 
  	'read_more' => __( 'Hide Read More' ) )
);

?>