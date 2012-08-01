<?php
/**
 * The Header for the theme.
 *
 * @package WordPress
 * @subpackage Debut
 * @since Debut 1.0
 */
?><!doctype html>  

<!--[if lt IE 7 ]> <html lang="<?php language_attributes(); ?>" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="<?php language_attributes(); ?>" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="<?php language_attributes(); ?>" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="<?php language_attributes(); ?>" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1,<?php bloginfo( 'html_type' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title><?php wp_title(); ?></title>
	
	<?php if ( is_single() || is_page() ) : if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<meta name="description" content="<?php the_excerpt_rss(); ?>" />
	<?php endwhile; endif; elseif( is_home() ) : ?>
		<meta name="description" content="<?php bloginfo( 'description' ); ?>" />
	<?php endif; ?>
	
	<link rel="author" href="<?php echo get_template_directory_uri(); ?>/functions/humans.txt" />
 	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<?php 
	$of_favicon_link_default = get_template_directory_uri() . '/images/favicon.ico'; 
	$of_favicon_link = c7s_get_option( 'icon_favicon', $of_favicon_link_default ); 
	?>
	<link rel="shortcut icon" href="<?php echo esc_url( $of_favicon_link ); ?>" type="image/x-icon" />
	
	<?php 
	$of_appleicon_link_default = get_template_directory_uri() . '/images/apple-touch-icon.png';
	$of_appleicon_link = c7s_get_option( 'icon_apple_touch', $of_appleicon_link_default ); 
	?>
	<link rel="apple-touch-icon" href="<?php echo esc_url( $of_appleicon_link ); ?>">
  
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	
	<?php wp_head(); ?>
	
</head>

<body id="top" <?php body_class(); ?> >

<div id="header-container">

	<header id="header" class="hfeed">
  	
		<div id="site-info" role="banner">
  	
			<?php 
			/**
			 * Site Info. Tag changes depending upon page.
			 *
			 */
			$heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
			
			<<?php echo $heading_tag; ?> class="site-title">
  		
				<?php
				/**
				 * Logo
				 *
				 */
				
				// Get theme options. (multicheck)
				$of_logo_options = c7s_get_option( 'logo_options', 0 );
				
				if ( $of_logo_options['logo_text'] == 1 ) : ?>
				
					<a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a>
				
				<?php else : // Not a text based logo ?>
      	
					<a class="fade" href="<?php echo esc_url( home_url() ); ?>" title="Home" >
						<?php
						$logo_default = get_template_directory_uri() . '/images/logo.png'; // Set default logo 
						$logo = c7s_get_option( 'logo_image', $logo_default ); // Get image based logo set in theme options or set as default
						?>
						<img src="<?php echo $logo ?>" alt="<?php bloginfo( 'name' ); ?>" />
					</a>
				
				<?php endif; // end text logo check ?>
			
			</<?php echo $heading_tag; ?>><!-- #site-title -->
			
			
			<?php
			/**
			 * Site Description
			 *
			 * Check if site description is enabled in theme options.
			 * If not enabled, apply a "hidden" class.
			 *
			 */
			 
			if ( $of_logo_options['site_description'] == 1 ) {
				$hide_site_description = false;
			} 
			else {
				$hide_site_description = 'class="hidden"';
			};			
			?>
			<p <?php echo $hide_site_description; ?>><?php bloginfo( 'description' ); ?></p>
  	
		</div><!-- .site-info -->
  	
  	
		<?php
		/**
		 * Site Description
		 *
		 * Check if site description is enabled in theme options.
		 * If not enabled, apply a "hidden" class.
		 *
		 */
		 
		// Get theme options.
		$of_top_search_form = c7s_get_option( 'top_search_form', 0 );
  	
		if ( $of_top_search_form == 1 ) :	?>
		
			<section id="top-search" role="search">
				<?php get_search_form(); ?>
			</section><!-- #top-search -->
		
		<?php endif; // end search form check ?>
		
		
		<nav id="top-nav" role="navigation">
			<ul>
				<?php 
				/**
				 * Top Nav
				 *
				 */
				if ( has_nav_menu( 'top-nav' ) ) : // Check if top menu has been set in WP menu options
					wp_nav_menu( array(
						'theme_location' 	=> 'top-nav',
						'container' 			=> '',
						'items_wrap' 			=> '%3$s',
						'depth' 					=> '1',
						'sort_column'			=> 'menu_order' 
					)); 
				else :
					wp_list_pages( array (
					  'title_li'	=> '',
					  'depth' 		=> '1' 
					));
				endif;
				?>
			</ul>
		</nav><!-- #top-nav -->
		
		
		<nav id="primary-nav" role="navigation">
			<ul class="sf-menu">
				<?php 
				/**
				 * Primary Nav
				 *
				 */
				if ( has_nav_menu( 'primary-nav' ) ) : // Check if primary menu has been set in WP menu options
					wp_nav_menu( array(
						'theme_location' 	=> 'primary-nav',
						'container' 			=> '',
						'items_wrap' 			=> '%3$s',
						'sort_column'			=> 'menu_order' 
					));
				else :
					wp_list_categories( array( 
						'title_li'	=>	'' 
					));
				endif;
				?>
			</ul>
		</nav><!-- #primary-nav -->
		
		
		<?php 
		/**
		 * Action Nav
		 *
		 */
		if ( has_nav_menu( 'action-nav' ) ) : // Check if action menu has been set in WP menu options ?>
		
			<nav id="action-nav" role="navigation">
				<?php
				wp_nav_menu( array(
					'theme_location' 	=> 'action-nav',
					'container' 			=> '',
					'menu_class' 			=> 'sf-menu', 
					'sort_column' 		=> 'menu_order'
				));
				?>
			</nav><!-- #action-nav -->
		
		<?php endif; // end action nav check ?>
		
	</header><!-- #header -->
  
</div><!-- #header-container -->

<div id="main-container" role="main">
