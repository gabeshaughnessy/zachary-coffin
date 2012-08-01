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
 * General Path/URI Functions
 *
 * @since Debut 2.0
 *
 */

define( 'C7S_FILEPATH',  TEMPLATEPATH );
define( 'C7S_DIRECTORY', get_template_directory() );
define( 'C7S_URL',       get_template_directory_uri() );

define( 'C7S_ADMINPATH', C7S_FILEPATH .  '/functions' );
define( 'C7S_ADMINDIR',  C7S_DIRECTORY . '/functions' );
define( 'C7S_ADMINURL',  C7S_URL .       '/functions' );

require_once( C7S_ADMINPATH . '/theme-helpers.php' );			// Helper functions used throught the theme
require_once( C7S_ADMINPATH . '/theme-metabox.php' );			// Metabox setup via WPAlchemy class
require_once( C7S_ADMINPATH . '/theme-tinymce.php' );			// TinyMCE Editor options and settings
require_once( C7S_ADMINPATH . '/theme-widgets.php' );			// Widets available for use
	



/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Debut 2.0
 *
 */
if ( ! isset( $content_width ) )
	$content_width = 560;




/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since Debut 2.1
 *
 */

add_action( 'after_setup_theme', 'c7s_setup' );

if ( ! function_exists( 'c7s_setup' ) ) :
	function c7s_setup() {
	
		/* Visual Editor Styles */		
		add_editor_style();
	
		/* Register Custom Menus */		
		register_nav_menus( array(
		  'top-nav'     => __( 'Top Menu',     'framework' ),
		  'primary-nav' => __( 'Primary Menu', 'framework' ),
		  'action-nav'  => __( 'Action Menu',  'framework' )
		));
		
		
		/* Add Thumbnail Support */		
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 255, 255, true );
		add_image_size( 'thumbnail-small',  55, 55,   true );
		add_image_size( 'thumbnail-medium', 75, 75,   true );
		add_image_size( 'thumbnail-large',  150, 150, true );
		add_image_size( 'thumbnail-wide',   240, 140, true );
		add_image_size( 'singular-image',   530, 300, true );
		add_image_size( 'full-image',       840, 470, true );
		add_image_size( 'hero-image',       940, 350, true );
	
	
		/* Add RSS Feed Links */
		add_theme_support( 'automatic-feed-links' );
	
	
		/* Load Translation Text Domain */
		load_theme_textdomain( 'framework' );
	}
endif;




/**
 * Options Framework Plugin Helper Function - Return the theme option value
 *
 * @since Debut 2.0
 *
 */

if ( !function_exists( 'c7s_get_option' ) ) :
	function c7s_get_option( $name, $default = false ) {
	
		$optionsframework_settings = get_option( 'optionsframework' );
	
		// Gets the unique option id
		$option_name = $optionsframework_settings['id'];
	
		if ( get_option( $option_name ) ) {
			$options = get_option( $option_name );
		}
	
		if ( isset( $options[$name] ) && !empty( $options[$name] ) ) {
			return $options[$name];
		} else {
			return $default;
		}
	}	
endif; // End c7s_get_option check




/**
 * Check for Options Framework Plugin
 *
 * @since Debut 2.0
 *
 */

add_action( 'admin_init', 'c7s_of_check' );

function c7s_of_check() {
	if ( ! function_exists( 'optionsframework_init' ) ) {
		add_thickbox(); // Required for the plugin install dialog.
		add_action( 'admin_notices', 'c7s_of_check_notice' );
	}
}

// The admin notice.
function c7s_of_check_notice() {
	if ( ! current_user_can( 'install_plugins' ) ) return;
?>	
	<div class="updated fade">
		<p><?php _e( 'The Options Framework plugin is required for this theme to function properly.', 'framework' ); ?> <a href="<?php echo admin_url('plugin-install.php?tab=plugin-information&plugin=options-framework&TB_iframe=true&width=640&height=517'); ?>" class="thickbox onclick"><?php _e( 'Install now', 'framework' ); ?></a>.</p>
	</div>

<?php
}




/**
 * Load Required Theme Styles
 *
 * @since Debut 1.0
 *
 */

add_action( 'wp_print_styles', 'c7s_theme_styles' );

function c7s_theme_styles() {
	if ( is_admin() ) return;
	
	// Register Styles
	wp_register_style( 'fancybox',     C7S_URL . '/js/fancybox/jquery.fancybox.css',    false, '1.0' );
	wp_register_style( 'forms',        C7S_URL . '/css/forms.css',                      'gforms_css', '1.0' );
	wp_register_style( 'handheld',     C7S_URL . '/css/handheld.css',                   false, '1.0', 'handheld' );
	wp_register_style( 'uglyduckling', C7S_URL . '/css/ie.css',                         false, '1.0' );
	wp_register_style( 'print',        C7S_URL . '/css/print.css',                      false, '1.0', 'print' );
	wp_register_style( 'pushup',       C7S_URL . '/js/pushup/css/pushup.css',           false, '1.0' );
	
	// Enqueue
	wp_enqueue_style( 'fancybox' );
	wp_enqueue_style( 'forms' );
	wp_enqueue_style( 'handheld' );
	wp_enqueue_style( 'print' );
	wp_enqueue_style( 'pushup' );
	
	global $is_IE;
	if($is_IE) {
		wp_enqueue_style( 'uglyduckling' );
	}
}


/**
 * Load Required Theme Scripts
 *
 * @since Debut 1.0
 *
 */

add_action( 'init', 'c7s_theme_scripts' );

function c7s_theme_scripts() {
	if ( is_admin() ) return;

	
	// Register
	wp_register_script( 'cycle',       C7S_URL . '/js/jquery.cycle.all.min.js',           'jquery', '1.0', true );
	wp_register_script( 'easing',      C7S_URL . '/js/jquery.easing.js',                  'jquery', '1.0', true );
	wp_register_script( 'fancybox',    C7S_URL . '/js/fancybox/jquery.fancybox.js',       'jquery', '1.0', true );
	wp_register_script( 'modernizr',   C7S_URL . '/js/modernizr.js' );
	wp_register_script( 'pushup',      C7S_URL . '/js/pushup/pushup.js',                  'jquery', '1.0', true );
	wp_register_script( 'script',      C7S_URL . '/js/script.js',                         'jquery', '1.0', true );
	wp_register_script( 'superfish',   C7S_URL . '/js/superfish.js',                      'jquery', '1.0', true );

	// Header
	wp_enqueue_script( 'modernizr' );
	
	// Footer
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'superfish' );
		
	$permalink = get_permalink();
	if( $permalink = home_url() ) {
		wp_enqueue_script( 'easing' );
		wp_enqueue_script( 'cycle' );
	}
	
	wp_enqueue_script( 'fancybox' );
	wp_enqueue_script( 'script' );
	wp_enqueue_script( 'pushup' );
	
}




/**
 * Attach CSS3PIE behavior to elements
 *
 * @since Debut 2.0
 *
 */

add_action( 'wp_head', 'c7s_render_css3_pie', 8 );

function c7s_render_css3_pie() {
	echo '
	<!--[if IE]>
	<style type="text/css" media="screen">
	#primary-nav ul,#action-nav li,#action-nav a,#main,#hero .entry-media,#hero .entry-content,#author-avatar,#author-description,.pagenavi a,.pagenavi .current,#footbar,.search-form,#comments .avatar,.reply a,#cancel-comment-reply-link,#sidebar .entry-thumbnail,.flickr_badge_image img,.c7s-video,#tab-items,#submit,.page-links,#primary-nav ul ul,#primary-nav li:hover,#primary-nav li:hover li,input#s,#entry-container .page-header,.search #entry-container .more-link,.archive #entry-container .more-link,.date #entry-container .more-link,.page-template-template-post-page-php #entry-container .more-link,#nav-below,#comments,#top-search,h3#comments-title,#primary-nav,#primary-nav li:hover,#hero .slide-container,input#search-submit,input#search-submit,.says,#top-nav ul,#top-search,#featured,#featured .entry-thumbnail, #main .entry-thumbnail, .page-template-template-post-gallery-php #main .entry
	{
	   behavior: url(' . trailingslashit( get_template_directory_uri() ) . 'js/pie/PIE.php);
	}  
	</style>
	<![endif]-->
	';
}



/**
 * Custom Theme Styles
 *
 * @since Debut 2.0
 *
 */

add_filter( 'wp_head', 'c7s_custom_theme_styles', 9 );

function c7s_custom_theme_styles() {

	$of_enable_styles = c7s_get_option( 'enable_styles', 0 );
	
	if ( $of_enable_styles == 1  ) : ?>
	
		<!-- custom theme styles -->	
		<style type="text/css">
			/* Remove text shadows */
			#primary-nav,	#action-nav, .dark-on-light, .dark-on-none, #announcement, .pagenavi, #entry-container .page-header, #entry-container .more-link,	#comments, #respond, .wp-caption, .widget, .c7s_light_box, .c7s_medium_box,	#site-info, .light-on-dark, .light-on-none, #announcement .link, .pagenavi a:hover, #footer, .c7s_dark_box {
			  text-shadow: none;
			}
		 	
		 	<?php
		 	// Get theme options
			$of_body_background       = c7s_get_option( 'body_background' );
			$of_top_nav_text_color    = c7s_get_option( 'top_nav_text_color' );
			$of_action_nav_background = c7s_get_option( 'action_nav_background' );
			$of_action_nav_text_color = c7s_get_option( 'action_nav_text_color' );
			$of_main_link_color       = c7s_get_option( 'main_link_color' );
			?>
			
			body {
				<?php
				$of_body_background_style  = ( isset( $of_body_background['color'] ) ) ? 'background-color:' . $of_body_background['color'] . ' !important; ' : null;
				$of_body_background_style .= ( isset( $of_body_background['image'] ) && !empty( $of_body_background['image'] ) ) ? 'background-image: url(' . esc_url( $of_body_background['image'] ) . ') !important;' : 'background-image: none; ';
				$of_body_background_style .= ( isset( $of_body_background['repeat'] ) ) ? 'background-repeat:' . $of_body_background['repeat'] . ' !important; ' : null;
				$of_body_background_style .= ( isset( $of_body_background['position'] ) ) ? 'background-position:' . $of_body_background['position'] . ' !important; ' : null;
				$of_body_background_style .= ( isset( $of_body_background['attachment'] ) ) ? 'background-attachment:' . $of_body_background['attachment'] . ' !important; ' : null;
				
				print $of_body_background_style;
				?>
			}
			
			#top-nav a, #top-nav a:hover {
				<?php if ( isset( $of_top_nav_text_color ) ) { print 'color:' . $of_top_nav_text_color . ' !important;'; } ?>
			}
			
			#action-nav li, #action-nav li:hover {
				<?php
				$of_action_nav_background_style  = ( isset( $of_action_nav_background['color'] ) ) ? 'background-color:' . $of_action_nav_background['color'] . ' !important; ' : null;
				$of_action_nav_background_style .= ( isset( $of_action_nav_background['image'] ) && !empty( $of_action_nav_background['image'] ) ) ? 'background-image: url(' . esc_url( $of_action_nav_background['image'] ) . ') !important;' : 'background-image: none; ';
				$of_action_nav_background_style .= ( isset( $of_action_nav_background['repeat'] ) ) ? 'background-repeat:' . $of_action_nav_background['repeat'] . ' !important; ' : null;
				$of_action_nav_background_style .= ( isset( $of_action_nav_background['position'] ) ) ? 'background-position:' . $of_action_nav_background['position'] . ' !important; ' : null;
				$of_action_nav_background_style .= ( isset( $of_action_nav_background['attachment'] ) ) ? 'background-attachment:' . $of_action_nav_background['attachment'] . ' !important; ' : null;
				
				print $of_action_nav_background_style;
				?>
			}
			
			#action-nav li a, #action-nav li a:hover {
				<?php if ( isset( $of_action_nav_text_color ) ) { print 'color:' . $of_action_nav_text_color . ' !important;'; } ?>
			}
			
			#main a:link, #main h1 a, #main h2 a, #main h3 a, #main h4 a, #main h5 a, #main h6 a, #main a:hover, #main h1 a:hover, #main h2 a:hover, #main h3 a:hover, #main h4 a:hover, #main h5 a:hover, #main h6 a:hover, #main a:active, #main a:visited, #entry-container a, #entry-container a:hover {
				<?php if ( isset( $of_main_link_color ) ) { print 'color:' . $of_main_link_color . ' !important;'; } ?>
			}
		</style>
		
	<?php endif; // end custom theme styles
}




/**
 * Set Default Embedded Sizes
 *
 * @since Debut 2.0
 *
 */

add_filter( 'embed_defaults', 'c7s_embed_defaults' );

function c7s_embed_defaults( $embed_size ) {
    
	$embed_size['width'] = 550;
	$embed_size['height'] = 400;

	return absint( $embed_size );
}




/**
 * Gets the option value from the custom video metabox set in functions/theme-metabox.php
 *
 * @since Debut 2.0
 *
 */

add_action( 'get_media', 'c7s_get_media', 10, 4 );

function c7s_get_media( $post_id, $default_width = '', $default_height = '', $echo = true ) {
	
	$the_media = false;
	
	if ( empty( $default_width ) && ! empty( $default_height ) ) {
	  $default_width = $default_height;
	}
	elseif (empty( $default_height ) && ! empty( $default_width ) ) {
	  $default_height = $default_width;
	}
	
	global $media_embed_mb;
	
	if ( $media_embed_mb->the_meta( $post_id ) ) {
		$media_source     = $media_embed_mb->get_the_value( 'media_source' );
		$media_embed_code = $media_embed_mb->get_the_value( 'media_embed_code' );
		$custom_width     = $media_embed_mb->get_the_value( 'media_width' );
		$custom_height    = $media_embed_mb->get_the_value( 'media_height' );
	}
	
	if ( ! empty( $media_embed_code ) ) {
		$the_media = $media_embed_code;
	}
	elseif ( ! empty( $media_source ) ) {
	
		$media_width  = $default_width;
		$media_height = $default_height;
		
		if ( ! is_admin() ) {
			
			if ( !empty( $custom_width ) ) { // Custom Width
				$media_width = $custom_width;
			}
			
			if ( ! empty( $custom_height ) ) { // Custom Height
				$media_height = $custom_height;
			}
		}

		$wp_embed = new WP_Embed();
		$the_media = $wp_embed->run_shortcode( '[embed width=' . $media_width . ' height=' . $media_height . ']' . $media_source . '[/embed]' );
	} 

	if ( $echo ) :
	  echo $the_media;
	else :
	  return $the_media;
	endif;
}




/**
 * Fancybox
 *
 * @since Debut 2.6
 *
 */

add_action( 'reveal_modal', 'c7s_reveal_modal', 10, 3 );

function c7s_reveal_modal( $post_id, $echo = true ) {

	// Get media embed metabox options
	global $media_embed_mb;
	$media_embed_mb->the_meta(); 
	$media_source     = $media_embed_mb->get_the_value( 'media_source' );
	$media_embed_code = $media_embed_mb->get_the_value( 'media_embed_code' );
	
	// If media embed source or code is available, set to true
	$media_embed = ( $media_source || $media_embed_code ) ? true : false;
	
	if ( ! $media_embed ) :
		return;
	
	else :
		// Get theme options
		$instant_default_width  = c7s_get_option( 'instant_default_width', 640 );
		$instant_default_height = c7s_get_option( 'instant_default_height', 640 );
		
		$instant  = '<div class="instant"><div id="video-' . absint( $post_id ) . '" class="instant-view">';
		$instant .= apply_filters( 'get_media', absint( $post_id ), absint( $instant_default_width ), absint( $instant_default_height ), false );
		$instant .= '</div></div>';
				
		if ( $echo ) :
		  echo $instant;
		else :
		  return $instant;
		endif;
		
	endif; // end $media_embed check
}




/**
 * Localize Scripts. This allows to get theme option values and pass them into
 * a javascript file. In this case, we are passing different theme options into
 * the js/script.js file.
 *
 * @since Debut 2.0
 *
 */

add_action( 'wp_print_scripts', 'c7s_localize_script' );

function c7s_localize_script() {
	
	/* 
	 * Check if options framework is enabled.
	 *
	 * We'll use this to enable certain javascript
	 * calls in script.js
	 *
	 */
	 
	if ( function_exists( 'optionsframework_init' ) ) :
		$optionsframework_enabled = true; // Needed for checks in script.js
	else :
		$optionsframework_enabled = false;
	endif;
	
	// Hero Settings
	$hero_cycle_speed   = c7s_get_option( 'hero_cycle_speed', 2 );
	$hero_cycle_timeout = c7s_get_option( 'hero_cycle_timeout', 6 );
	$hero_cycle_fx      = c7s_get_option( 'hero_cycle_fx', 'scrollHorz' );
		
	// Set Script Options
	$script_options = array(
		'optionsframework_enabled'        => $optionsframework_enabled,
		'hero_cycle_speed' 		            => absint( $hero_cycle_speed ) * 1000,
		'hero_cycle_timeout'	            => absint( $hero_cycle_timeout ) * 1000,
		'hero_cycle_fx'				            => $hero_cycle_fx,
	);
	
	//print_r($script_options);
	
	wp_localize_script( 'script', 'script_options', $script_options );
}




/**
 * Removes inline styles printed when the gallery shortcode is used.
 *
 * @since Debut 2.0
 *
 */

add_filter( 'use_default_gallery_style', '__return_false' );




/**
 * Custom Login Logo. Set via Theme Options.
 *
 * @since Debut 1.0
 *
 */

add_action( 'login_head', 'c7s_login_head_logo' );

function c7s_login_head_logo() {
	$new_custom_login_logo = c7s_get_option( 'logo_login', false ); 

	if ( $new_custom_login_logo ) {
  	echo '<style type="text/css">h1 a { background-image: url(' . esc_url( $new_custom_login_logo ) . ') !important; }</style>';
	}
}




/**
 * Custom gravatar. Adds custom gravatar option. Set via Theme Options.
 *
 * @since Debut 1.0
 *
 */

add_filter( 'avatar_defaults', 'c7s_custom_gravatar' );

function c7s_custom_gravatar( $avatar_defaults ) {
	
	$default_gravatar = get_template_directory_uri() . '/images/gravatar.png';
	$new_gravatar = c7s_get_option( 'icon_gravatar', $default_gravatar );
	
	$avatar_defaults[$new_gravatar] = 'Custom Gravatar (Upload via Theme Options panel)';

	return $avatar_defaults;
}




/**
 * Title Attribute.
 *
 * @since Debut 2.4
 */

if ( ! function_exists( 'c7s_the_title_attribute' ) ) :
	function c7s_the_title_attribute() {
		printf( esc_attr__( 'Permalink to %s', 'framework' ), the_title_attribute( 'echo=0' ) );
	}
endif;




/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since Debut 2.0
 *
 */

if ( ! function_exists( 'c7s_posted_on' ) ) :
	function c7s_posted_on() {
		printf( __( 'Posted on %1$s by %2$s' ),
			sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
				esc_url( get_permalink() ),
				esc_attr( get_the_time() ),
				esc_html( get_the_date() )
			),
			sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'framework' ), get_the_author() ) ),
				esc_html( get_the_author() )
			)
		);
	}
endif;




/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * @since Debut 2.0
 *
 */

if ( ! function_exists( 'c7s_posted_in' ) ) :
	function c7s_posted_in() {
	
		$output = sprintf( __( 'Bookmark the %1$s', 'framework' ), '<a href="' . esc_url( get_permalink() ) . '" title="' . esc_attr( sprintf( __( 'Permalink to %1$s', 'framework' ), the_title( '', '', false ) ) ) . '" rel="bookmark">' . esc_html__( 'permalink', 'framework' ) . '</a>' );
	
		$tags = get_the_tag_list( '', ', ' );
		$cats = get_the_category_list( ', ' );
	
		if ( ! empty( $tags ) && ! empty( $cats ) ) {
			$output = sprintf( esc_html__( 'This entry was posted in %1$s and tagged %2$s. %3$s', 'framework' ), $cats, $tags, $output );
		}
		else if ( ! empty( $cats ) ) {
			$output = sprintf( esc_html__( 'This entry was posted in %1$s. %2$s', 'framework' ), $cats, $output );
		}
	
		print $output;
	}
endif;




/**
 * Register Sidebars
 *
 * @since Debut 2.0
 *
 */

add_action( 'widgets_init', 'c7s_register_sidebars' );

function c7s_register_sidebars() {

	register_sidebar( array(
		'id'            => 'sidebar-top',
		'name'          => __( 'All Pages - Top' ),
		'description'   => __( 'On all page sidebar above other widgets.' ),
		'before_widget' => '<li><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside></li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	));
	
	register_sidebar( array(
		'id'            => 'sidebar-bottom',
		'name'          => __( 'All Pages - Bottom' ),
		'description'   => __( 'On all page sidebars below other widgets.' ),
		'before_widget' => '<li><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside></li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	));
	
	register_sidebar( array(
		'id'            => 'sidebar-multiple',
		'name'          => __( 'Multiple Post Pages' ),
		'description'   => __( 'Shown on pages with multiple posts.' ),
		'before_widget' => '<li><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside></li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	));
	
	register_sidebar( array(
		'id'            => 'sidebar-single',
		'name'          => __( 'Single Post Pages' ),
		'description'   => __( 'Shown on single post pages.' ),
		'before_widget' => '<li><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside></li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	));
	
	register_sidebar( array(
		'id'            => 'sidebar-page',
		'name'          => __( 'Page Pages' ),
		'description'   => __( 'Shown on page type pages.' ),
		'before_widget' => '<li><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside></li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	));
	
	register_sidebar( array(
		'id'            => 'footbar-column-1',
		'name'          => __( 'Footer - Column 1' ),
		'description'   => __( 'Shown in first column of footer.' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</aside>',
		'before_title' 	=> '<h4 class="widget-title">',
		'after_title' 	=> '</h4>'
	));
	
	register_sidebar( array(
		'id'            => 'footbar-column-2',
		'name'          => __( 'Footer - Column 2' ),
		'description'   => __( 'Shown in second column of footer.' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</aside>',
		'before_title' 	=> '<h4 class="widget-title">',
		'after_title' 	=> '</h4>'
	));	
	
	register_sidebar( array(
		'id'            => 'footbar-column-3',
		'name'          => __( 'Footer - Column 3' ),
		'description'   => __( 'Shown in third column of footer.' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</aside>',
		'before_title' 	=> '<h4 class="widget-title">',
		'after_title' 	=> '</h4>'
	));
	
}


?>