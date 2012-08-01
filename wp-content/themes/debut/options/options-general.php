<?php

$options[] = array( 
  'name' => __( 'General', 'framework' ),
  'type' => 'heading'
);


/*
 * Misc.
 */
$options[] = array( 
  'name' => __( 'Miscellaneous', 'framework' ),
  'desc' => __( 'Below are a few miscellaneous features that can be enabled/disabled.', 'framework' ),
  'class' => 'featured toggle-section',
  'type' => 'info'
);

$options[] = array( 
  'name' => __( 'Instant View', 'framework' ),
  'desc' => __( 'Yes, enable Instant View. By enabling instant view, any posts that have a media embed option set, will pop up in a modal window.', 'framework' ),
  'id'   => 'instant_view',
  'std'  => 0,
  'type' => 'checkbox'
);

$options[] = array( 
  'name' => __( 'Disable "Posted On" Meta Info', 'framework' ),
  'desc' => __( 'This option removes the post meta information, for example, "Posted on April 25, 2011 by Luke McDonald".', 'framework' ),
  'id'   => 'disable_posted_on',
  'std'  => 0,
  'type' => 'checkbox'
);


$options[] = array( 
  'name' => __( 'Top Menu Search Form', 'framework' ),
  'desc' => __( 'Display search form in Top Menu', 'framework' ),
  'id'   => 'top_search_form',
  'std'  => 0,
  'type' => 'checkbox'
);


/*
 * Footer
 */
$options[] = array( 
  'name' => __( 'Footer Text', 'framework' ),
  'desc' => __( 'The following options updated the text in the footer at the bottom of each page.', 'framework' ),
  'class' => 'featured toggle-section',
  'type' => 'info'
);

$options[] = array( 
  'name' => __( 'Copyright Text', 'framework' ),
  'desc' => __( 'Enable "Copyright" text by entering your business name.', 'framework' ),
  'id'   => 'footer_copyright',
  'std'  => '',
  'type' => 'text'
);

$options[] = array(
  'name' => __( 'General Text', 'framework' ),
  'desc' => __( 'Additional text below the copyright', 'framework' ),
  'id'   => 'footer_text',
  'std'  => '',
  'type' => 'textarea'
);


/*
 * Social Media
 */
$options[] = array( 
  'name' => __( 'Social Media', 'framework' ),
  'desc' => __( 'The following options allow you to enter in your username for a few of the social media networks available. If set, a small icon will be displayed in the footer.', 'framework' ),
  'class' => 'featured toggle-section',
  'type' => 'info'
);

$options[] = array( 
  'name' => __( 'RSS Icon', 'framework' ),
  'desc' => __( 'Enable RSS Icon', 'framework' ),
  'id'   => 'social_rss',
  'std'  => 1,
  'type' => 'checkbox'
);

$options[] = array( 
	'name' => __( 'FeedBurner', 'framework' ),
  'desc' => __( 'Provide your <a href="http://feedburner.google.com" title="Go to FeedBurner" target="_blank">FeedBurner</a> feed name to enable this functionality. The RSS icon must be enabled above.', 'framework' ),
  'id'   => 'feedburner_url',
  'std'  => '',
  'type' => 'text'
);


$options[] = array( 
  'name' => __( 'Twitter', 'framework' ),
  'desc' => __( '', 'framework' ),
  'id'   => 'social_twitter',
  'std'  => '',
  'type' => 'text'
);

$options[] = array( 
  'name' => __( 'Facebook', 'framework' ),
  'desc' => __( '', 'framework' ),
  'id'   => 'social_facebook',
  'std'  => '',
  'type' => 'text'
);

$options[] = array( 
  'name' => __( 'Flickr', 'framework' ),
  'desc' => __( '', 'framework' ),
  'id'   => 'social_flickr',
  'std'  => '',
  'type' => 'text'
);

$options[] = array( 
  'name' => __( 'Vimeo', 'framework' ),
  'desc' => __( '', 'framework' ),
  'id'   => 'social_vimeo',
  'std'  => '',
  'type' => 'text'
);

$options[] = array( 
  'name' => __( 'YouTube', 'framework' ),
  'desc' => __( '', 'framework' ),
  'id'   => 'social_youtube',
  'std'  => '',
  'type' => 'text'
);

$options[] = array( 
  'name' => __( 'Delicious', 'framework' ),
  'desc' => __( '', 'framework' ),
  'id'   => 'social_delicious',
  'std'  => '',
  'type' => 'text'
);

$options[] = array( 
  'name' => __( 'Last.fm', 'framework' ),
  'desc' => __( '', 'framework' ),
  'id'   => 'social_lastfm',
  'std'  => '',
  'type' => 'text'
);

