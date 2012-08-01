<?php
/**
 * Here we create custom metaboxes to be used in the theme.
 *
 * @package WordPress
 * @subpackage Debut
 * @since Debut 1.0
 *
 */


/**
 * Register and Enqueue Scripts and Styles
 *
 * @since Debut 1.0
 *
 */

add_action( 'add_meta_boxes', 'c7s_metabox_init' );

function c7s_metabox_init() {
	// Register
	wp_register_script( 'metabox',        C7S_ADMINURL . '/metabox/MetaBox.js',		'jquery', '1.0',	true );
	wp_register_style(  'metabox',        C7S_ADMINURL . '/metabox/MetaBox.css' );
	wp_register_style(  'metabox-custom', C7S_ADMINURL . '/metabox/metabox-custom.css' );
	
	// Enqueue
	wp_enqueue_script( 'metabox' );
	wp_enqueue_style( 'metabox' );
	wp_enqueue_style( 'metabox-custom' );
}




/**
 * Load Custom Metabox Class
 * http://farinspace.com/wpalchemy-metabox/
 *
 * @since Debut 1.0
 */

include_once( C7S_ADMINPATH . '/metabox/MetaBox.php' );           // MetaBox Class


/**
 * Load Custom MediaAccess Class (upload media)
 * http://farinspace.com/wpalchemy-metabox/
 *
 * @since Debut 2.4
 */

include_once( C7S_ADMINPATH . '/metabox/MediaAccess.php' ); // MediaAccess Class

// Define a media acess object
$wpalchemy_media_access = new WPAlchemy_MediaAccess();




/**
 * Define Billbaord Metabox
 *
 * @since Debut 1.0
 */

$hero_mb = new WPAlchemy_MetaBox( array(
  'id'       => '_hero_mb',
  'title'    => 'Hero Options',
  'types'    => array( 'post' ),
  'template' => C7S_ADMINPATH . '/metabox/metabox-hero-options.php'
));




/**
 * Define Page Excerpt Metabox
 *
 * @since Debut 1.0
 */

$page_excerpt_mb = new WPAlchemy_MetaBox( array(
  'id'       => '_page_excerpt_mb',
  'title'    => 'Page Excerpt',
  'types'    => array( 'page' ),
  'template' => C7S_ADMINPATH . '/metabox/metabox-page-excerpt.php'
));




/**
 * Define Media Embed
 *
 * @since Debut 1.0
 */

$media_embed_mb = new WPAlchemy_MetaBox( array(
  'id'       => '_media_embed_mb',
  'title'    => 'Media Embed',
  'types'    => array( 'page', 'post' ),
  'context'  => 'side',
  'types'    => array( 'post', 'page' ),	
  'template' => C7S_ADMINPATH . '/metabox/metabox-media-embed.php'
));




/**
 * Define Post Page
 *
 * @since Debut 1.0
 */

$post_page_mb = new WPAlchemy_MetaBox( array(
  'id'               => '_post_page_mb',
  'title'            => 'Custom Post Page',
  'types'            => array( 'page' ),
  'context'          => 'side',
  'include_template' => array( 'template-post-page.php', 'template-post-gallery.php' ),
  'template'         => C7S_ADMINPATH . '/metabox/metabox-post-page.php'
));




?>