<?php
/**
 * This file adds features and functionality to the Tiny MCE editor.
 *
 * @package WordPress
 * @subpackage Debut
 * @since Debut 2.0
 *
 */


/**
 * Add Scripts and Styles
 *
 * @since Debut 2.0
 *
 */

add_action( 'add_meta_boxes', 'c7s_shortcodes_init' );

function c7s_shortcodes_init() {
	wp_register_style( 'tinymce-editor-plugin', C7S_ADMINURL .	'/tinymce/tinymce-editor-plugin.css',	false, '1.0' );
	wp_enqueue_style( 'tinymce-editor-plugin' );
}


/**
 * Get Shortcodes Snippets
 *
 * @since Debut 2.0
 *
 */

include( C7S_ADMINPATH . '/tinymce/tinymce-shortcodes.php' );
include( C7S_ADMINPATH . '/tinymce/tinymce-quicktags.php' );
include( C7S_ADMINPATH . '/tinymce/tinymce-tinymce.php' );


/**
 * Initialize TinyMCE Shortcodes/Snippets Button
 *
 * @since Debut 2.0
 *
 */

add_action( 'admin_init', 'c7s_shortcodes_mce_init' );

function c7s_shortcodes_mce_init() {
	if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
		if ( in_array( basename( $_SERVER['PHP_SELF'] ), array( 'post-new.php', 'page-new.php', 'post.php', 'page.php' ) ) ) {
			add_filter( 'mce_buttons', 'c7s_filter_mce_button' );
			add_filter( 'mce_external_plugins', 'c7s_filter_mce_plugin' );
			add_action( 'admin_head','c7s_add_simple_buttons' ); // tinymce/tinymce-quicktags.php
		}
	}
}

function c7s_filter_mce_button( $buttons ) {
	array_push( $buttons, '|', 'shortcodesbutton' );
	return $buttons;
}

function c7s_filter_mce_plugin( $plugins ) {
	$plugins['c7s_shortcodes'] = C7S_ADMINURL . '/tinymce/tinymce-editor-plugin.js';
	return $plugins;
}

?>