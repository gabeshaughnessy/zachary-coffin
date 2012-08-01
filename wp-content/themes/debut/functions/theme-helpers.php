<?php
/**
 * Functions and definitions for theme
 *
 * @package WordPress
 * @subpackage Debut
 * @since Debut 1.0
 *
 */


/**
 * Filters that allow shortcodes in Text Widgets
 *
 * @since Debut 2.0
 *
 */
 
add_filter( 'widget_text', 'shortcode_unautop' );
add_filter( 'widget_text', 'do_shortcode' );




/**
 * Filter WordPress wp_title to accomadate page types and text set below.
 *
 * @since Debut 2.0
 *
 */
 
add_filter( 'wp_title', 'c7s_wp_title' );

function c7s_wp_title() {
	
	$title = '';

	if ( is_home() ) { 
		$title = get_bloginfo( 'name' ) . ' | ' . get_bloginfo( 'description' ); 
	}
	elseif ( is_search() ) { 
		$title = get_bloginfo( 'name' ) . ' | ' . __( 'Search Results', 'framework' );
	}
	elseif ( is_author() ) { 
		$title = get_bloginfo( 'name' ) . ' | ' . __( 'Author Archives', 'framework' ); 
	}
	elseif ( is_single() ) {
		$title = the_title( '', '', false ) . ' | ' . get_bloginfo( 'name' );
	}
	elseif ( is_page() ) {
		$title = get_bloginfo( 'name' ) . ' | ' . the_title( '', '', false );
	}
	elseif ( is_category() ) {
		$title = get_bloginfo( 'name' ) . ' | ' . __( 'Archive', 'framework' ) . ' | ' . single_cat_title( '', false );
	}
	elseif ( is_month() ) {
		$title = get_bloginfo( 'name' ) . ' | ' . __( 'Archive', 'framework' ) . ' | ' . the_time( 'F' );
	}
	elseif ( is_tag() ) {
		$title = get_bloginfo( 'name' ) . ' | ' . __( 'Tag Archive', 'framework' ) . ' | ' . single_tag_title( '', false );
	}
	
	// Send it out
	echo $title;
}




/**
 * Detect Browser. Used in some cases to do various things depending on broswer, usually IE
 *
 * @since Debut 2.0
 *
 */

add_filter( 'body_class', 'c7s_browser_body_class' );

function c7s_browser_body_class( $classes ) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

	if( $is_lynx ) $classes[] = 'lynx';
	elseif( $is_gecko ) $classes[] = 'gecko';
	elseif( $is_opera ) $classes[] = 'opera';
	elseif( $is_NS4 ) $classes[] = 'ns4';
	elseif( $is_safari ) $classes[] = 'safari';
	elseif( $is_chrome ) $classes[] = 'chrome';
	elseif( $is_IE ) $classes[] = 'ie';
	else $classes[] = 'unknown';

	if( $is_iphone ) $classes[] = 'iphone';
	return $classes;
}




/**
 * Theme Info. I typically use to print in header.php for reference of theme info.
 *
 * @since Debut 2.0
 *
 */

add_action( 'wp_head', 'c7s_theme_data', 1 );

function c7s_theme_data() {
	$themedata = get_theme_data( STYLESHEETPATH . '/style.css' );
	
	$output  = "<!--\n";
	$output .= "**********************************************************************************************\n";
	$output .=  "\n";
	$output .=  esc_html( $themedata['Name'] ) . " (" . esc_html( $themedata['Version'] ) . ") - " . esc_html( $themedata['Description'] ) . "\n";
	$output .=  "\n";
	$output .=  "CSS, LESS, XHTML and design files are all Copyright " . esc_html( date( 'Y' ) ) . " CELTIC7.com" . "\n";
	$output .=  "\n";
	$output .=  "**********************************************************************************************\n";
	$output .=  "-->";
	
	echo $output;
	
}




/**
 * Add custom login/logout links. I usually use this in the footer text.
 *
 * @since Debut 2.0
 *
 */

add_action( 'c7s_user_login', 'c7s_user_login' );

function c7s_user_login() {
	if ( is_user_logged_in() ) {
	    wp_loginout();
	    echo ' | <a href="' . esc_url ( home_url() ) . '/wp-admin">' . esc_html__( 'Admin Dashboard', 'framework' ) . '</a>';
	} else {
	    esc_url ( wp_loginout() );
	};
}




/**
 * Add Custom Media Filters (PDF, MP3, MOV etc).
 *
 * @since Debut 2.0
 *
 */

add_filter( 'post_mime_types', 'c7s_post_mime_types' );

function c7s_post_mime_types( $post_mime_types ) {
    $post_mime_types['application/pdf'] = array( __( 'PDF' ), __( 'Manage PDF' ), _n_noop( 'PDF <span class="count">(%s)</span>', 'PDF <span class="count">(%s)</span>' ) );
    
    return $post_mime_types;
}




/**
 * Menus Behind Embedded Video Fix. Adds wmode=transparent to embed objects (Thanks YouTube... :( )
 *
 * @since Debut 2.0
 *
 */


add_filter( 'embed_oembed_html', 'c7s_add_video_wmode_transparent', 10, 3 );

function c7s_add_video_wmode_transparent( $html, $url, $attr ) {
	if ( strpos( $html, "<embed src=" ) !== false ) {
		$html = str_replace( '</param><embed', '</param><param name="wmode" value="transparent"></param><embed wmode="transparent"', $html );
		return $html;
	} else {
		return $html;
	}
}




/**
 * Allow iFrames in Tiny MCE. Allows google maps, youtube iframe embeds, etc. to not be romoved from editor.
 *
 * @since Debut 2.0
 *
 */

add_filter( 'tiny_mce_before_init', create_function( '$a',
'$a["extended_valid_elements"] = "iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]"; return $a;') );




/**
 * Custom breadcrumb function that integrates Yoast Breadcrumbs.
 *
 * @since Debut 2.0
 *
 */

add_action( 'show_breadcrumbs', 'c7s_show_breadcrumbs', 10, 1 );

function c7s_show_breadcrumbs( $show_breadcrumbs ) {

	$edit_post_link = get_edit_post_link();
	
	if ( function_exists( 'yoast_breadcrumb' ) ) {
		if ( $show_breadcrumbs ) {
	  	yoast_breadcrumb( '<p id="breadcrumbs">', ' &rarr;<a href="' . esc_url( $edit_post_link ) . '" title="' . esc_attr__( 'Edit Post', 'framework' ) . '">' . esc_html__( 'Edit', 'framework' ) . '</a></p>' );
		}
	} 
	else {
	  if ( is_user_logged_in() ) {
	  	echo '<p id="breadcrumbs">', '<a href="' . esc_url( $edit_post_link ) . '" title="' . esc_attr__( 'Edit Post', 'framework' ) . '">' . esc_html__( 'Edit', 'framework' ) . '</a></p>';
	  }
	}	
}




/**
 * Custom Excerpt Length
 *
 * @since Debut 1.0
 *
 */

add_filter( 'excerpt_length', 'c7s_excerpt_length' );

function c7s_excerpt_length( $length ) {
	return 24;
}




/**
 * Custom Excerpt More Symbol
 *
 * @since Debut 1.0
 *
 */

add_filter( 'excerpt_more', 'c7s_excerpt_more' );

function c7s_excerpt_more( $more ) {
	return ' &hellip;';
}




/**
 * Modification of wp_link_pages() with an extra element to highlight the current page.
 * http://wordpress.stackexchange.com/questions/14406/how-to-style-current-page-number-wp-link-pages
 *
 * @since Debut 1.0
 *
 */

add_action( 'get_page_links', 'c7s_page_links', 10, 1 );

function c7s_page_links( $args = array () ) {
	
	$defaults = array(
	  'before'      => '<div class="pagenavi page-links"><span class="pages">' . __( 'Pages:', 'framework' ) . '</span>',
	  'after'       => '</div>',
	  'link_before' => '',
	  'link_after'  => '',
	  'pagelink'    => '%',
	  'echo'        => 1,	// element for the current page
	  'highlight'   => 'span'
	);
	
	$page_links = wp_parse_args( $args, $defaults );
	$page_links = apply_filters( 'wp_link_pages_args', $page_links );
	extract( $page_links, EXTR_SKIP );
	
	global $page, $numpages, $multipage, $more, $pagenow;
	
	if ( ! $multipage ) {
	  return;
	}
	
	$output = $before;
	
	for ( $i = 1; $i < ( $numpages + 1 ); $i++ ) {
	  $j       = str_replace( '%', $i, $pagelink );
	  $output .= ' ';
	  
	  if ( $i != $page || ( ! $more && 1 == $page ) )	{
	      $output .= _wp_link_page( $i ) . "{$link_before}{$j}{$link_after}</a>";
	  }	else {   
	  	// highlight the current page
	    // not sure if we need $link_before and $link_after
	  	$output .= "<$highlight class='current'>{$link_before}{$j}{$link_after}</$highlight>";
	  }
	}

	print $output . $after;
}




/**
 * Page Family Tree. Show subpages of a page. I often use this in the sidebar.
 *
 * @since Debut 1.0
 *
 */

add_action( 'page_family_tree', 'c7s_page_family_tree' );

function c7s_page_family_tree() {

	global $post, $wpdb;
	
	if ( $post->post_parent ) {
	  $children = wp_list_pages( 'title_li=&child_of=' . $post->post_parent . '&echo=0&depth=1' );
	} else {
	  $children = wp_list_pages( 'title_li=&child_of=' . $post->ID . '&echo=0&depth=1' );
	}
	
	if ( $children ) {
			
		$output  = '<div class="widget c7s_page_family">';
			$output .= '<h3 class="widget-title">';
		  
			$current = $post->ID;
			$parent = $post->post_parent;
			$grandparent_get = get_post( $parent );
			$grandparent = $grandparent_get->post_parent;
			  
			if ( $root_parent = get_the_title( $grandparent ) !== $root_parent = get_the_title( $current ) ) {
				$output .= get_the_title( $grandparent ); 
			} else { 
				$output .= get_the_title( $parent );
			}
			
			$output .= '</h3>';
			$output .= '<ul class="page-family-list">';
				$output .= $children;
			$output .= '</ul>';
		$output .= '</div>';
		
		echo $output;
	}
}




/**
 * Short Title Function
 *
 * @since Debut 1.0
 *
 */

add_action( 'the_short_title', 'c7s_the_short_title', 10, 4  );

function c7s_the_short_title( $before = '', $after = '', $echo = true, $length = false ) {
	$title = get_the_title();
	
	if ( $length && is_numeric( $length ) ) {
		$title = substr( $title, 0, $length );
	}
	
	if ( strlen( $title ) > 0 ) {
		
		if (strlen( $title ) < $length ) {
			$title = apply_filters( 'the_short_title', $before . $title, $before, $after );
		} else {
			$title = apply_filters( 'the_short_title', $before . $title . $after, $before, $after );
		}
		
		if ( $echo ) {
			echo $title;
		} else {
			return $title;
		}
		
	}
}




/**
 * Custom Login Styling. Adds link to stylesheet for styling.
 *
 * @since Debut 1.0
 *
 */

add_action( 'login_head', 'c7s_login_head_style' );

function c7s_login_head_style() { 
	echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/css/login.css" />'; 
}




/**
 * Custom Login Logo Link
 *
 * @since Debut 1.0
 *
 */

add_filter( 'login_headerurl', 'c7s_login_headerurl' );

function c7s_login_headerurl( $url ) {
	return home_url();
}




/**
 * Custom Login Title
 *
 * @since Debut 1.0
 *
 */

add_filter( 'login_headertitle', 'c7s_login_headertitle' );

function c7s_login_headertitle( $message ) {
	return get_bloginfo( 'name' );
}


?>