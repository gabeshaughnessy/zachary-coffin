<?php
/**
 * This template file determines the content of the page title
 * by checking for page type. Used in multiple files.
 *
 * @package WordPress
 * @subpackage Debut
 * @since Debut 2.0
 *
 */

$title_action = '';
$title_type = '';

if ( is_category() ) :
	$title_action	= __( 'Browsing Category', 'framework' );
	$title_type		= single_cat_title( '', false );
elseif( is_tag() ) :
	$title_action	= __( 'Browsing Tags', 'framework' );
	$title_type		= single_tag_title( '', false );
elseif( is_day() ) :
	$title_action	= __( 'Browsing', 'framework' );
	$title_type		= get_the_time( 'F jS, Y' );
elseif( is_month() ) :
	$title_action	= __( 'Browsing', 'framework' );
	$title_type 	= get_the_time( 'F, Y' );
elseif( is_year() ) :
	$title_action	= __( 'Browsing', 'framework' );
	$title_type 	= get_the_time( 'Y' );
elseif( is_author() ) :
	$title_action	= __( 'Browsing', 'framework' );
	$title_type 	= __( 'Author Archives', 'framework' );
elseif( isset( $_GET['paged'] ) && !empty( $_GET['paged'] ) ) :
	$title_action = __( 'Browsing', 'framework' );
	$title_type 	= __( 'Blog Archives', 'framework' );
elseif( is_404() ) :
	$title_action = __( 'Whoopsy Daisy!', 'framework' );
	$title_type 	= __( 'Sorry, nothing here!', 'framework' );
elseif( is_search() ) :
	$title_action = __( 'Search for', 'framework' );
	$title_type 	= get_search_query();
else :
	$title_action = false;
	$title_type 	= false;
endif; 
?>

<?php 
global $is_page;

if( $is_page !== 'template-post-page' ) : ?>
	
	<header class="entry page-header">
		
		<?php	
		/**
		 * Page Title
		 *
		 */
		 
		// Check for page title type
		if ( $title_type ) : ?>
		
			<h1 class="page-title">
	  		
				<span><?php echo esc_html( $title_action ); ?></span> <?php echo esc_html( $title_type ); ?>
	  	
			</h1><!-- page-title -->
	  	
			<div class="category-description">
	  	
				<?php
				/**
				 * Category Description
				 *
				 */
				echo category_description(); // Display category description if available ?>
				
			</div><!-- category-description -->
		
		<?php	endif; // End page title type check ?>
		
		
		<?php
		/**
		 * Pagination
		 *
		 */
		if ( $wp_query->max_num_pages > 1 ) : // Check for pages ?>
		
			<div id="nav-above" class="pagenavi">
				
				<?php if ( function_exists( 'wp_pagenavi' ) ) : ?>
					
					<?php wp_pagenavi(); ?>
					
				<?php else : ?>
				
					<div class="nav-previous"><?php next_posts_link( '<span class="meta-nav">&larr;</span>' . __( ' Older posts', 'framework' ) ); ?></div>
				  
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts ', 'framework' ) . '<span class="meta-nav">&rarr;</span>' ); ?></div>
				
				<?php endif; // End WP Page Navi plugin check ?>
			
			</div><!-- #nav-below -->
		
		<?php endif; // end page check ?>
		
	</header><!-- .page-header -->
	
<?php endif; // end custom template post page check ?>
