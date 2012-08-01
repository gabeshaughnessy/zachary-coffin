<?php
//Zach Coffin Genesis Child Theme by Gabe Shaughnessy 

// ---- NOTES ---

// Page Templates - Home Page, Single Page, Single Work, Work Archive, Blog Page, Single Post
//--------------- Templates to get the header, the menus, and the content template.

//Full Page Background Slider
//--------------- Javascript turns the Post Loop into a full page slider with navigation and a pager. Swipe Sensitive

//Home Page Post Feed
// ------- Query All Content including works and pages, that has the meta value 'featured' and display the correct content template

//Content Templates for Single Works, Page and Post Formats: Quote, Post, Work Archives, Galleries, Blog Feed.
// -------- Template for Single Posts and Pages with feature box on the right, content on the left.
// -------- Template for Single Pages full width if there is no content for the feature box.
// -------- Template for Single Works, With Media Box, Tab Box and Gallery.
// -------- Template for Work Archives, shows all Works or a subsection of works in a gallery style format

//Tab Box for Work Templates and
// -------- Part of the Body of Work Plugin really, but a tab box way to display the content collected in the body of work.
// -------- used on single Work pages

//Thumbnail Gallery Function
// -------- gets all the post attachments and creates a sliderbox gallery with pager thumbnails.

//Presentation Mode
// -------- hides the header, main nave menu, artwork menu and just show the work and the background image.

// end of NOTES ---

// Start the engine
require_once(TEMPLATEPATH.'/lib/init.php');
		add_action('wp_head', 'add_my_scripts'); // For use on the Front end (ie. Theme)
	 //we're going to want jquery to build the sliders
	 function add_my_scripts() {
wp_enqueue_script('jquery');
	 ?>
	<!-- <script type="text/javascript" src="<?php echo get_bloginfo('url'); ?>/wp-includes/js/jquery/jquery.js"></script>-->
	 <script type="text/javascript" src="<?php echo get_bloginfo('stylesheet_directory'); ?>/scripts/jquery.cycle.all.js"></script>
	 	 <script type="text/javascript" src="<?php echo get_bloginfo('stylesheet_directory'); ?>/scripts/jquery-ui-1.8.16.custom.min.js"></script><!-- JQuery UI for the Accordion menus - you need to get the full version, no this custom UI package, to use other UI features like drag-n-drop -->
	 <script type="text/javascript">
	 jQuery(document).ready(function($){

	 //Do this once the doucment has loaded
//hide the password protected posts in the archives
$('.archive .post-password-required').hide();
	 $('.cycle #content').cycle({
	  fx: 'fade', 
    speed: 300, 
    timeout: <?php echo of_get_option('slider_pause', '5000'); ?>,
    containerResize: 0		 });
	 $('#present_on').click(function(){
		$('#present_on').animate({opacity: 0}, 'fast').hide();
		$('#present_off').animate({opacity: .5	}, 'fast').show();
	 $('#header').delay(300).slideUp('fast');
	 $('#nav').slideUp('fast');
	 
	 $('#subnav').animate({
    'marginLeft' : "-=200px"
		});
	 
	/*  $('#subnav li:nth-child(1)').hover(
		 
		 function(){//do this on hover mouse enter
			$('#subnav').animate({
			    'marginLeft' : "0px"
				});
				 },
		 function(){//do this on hover mouse exit
	
			$('#subnav').animate({
					    'marginLeft' : "+=200px"
			}); 
				 
				 }); */
			 
	return false;	
	 });
	 
	  $('#present_off').click(function(){
	  $('#present_off').animate({opacity: 0}, 'fast').hide();
	  $('#present_on').animate({opacity: .5}, 'fast').show();
	 $('#header').slideDown('fast');
	 $('#nav').delay(300).slideDown('fast');
	$('#subnav').animate({
	'marginLeft' : "+=200px"
		});
	 $('#subnav li:nth-child(1)').click(function(){
		 return true; //if we're not in presentation mode, we want the tab to link to the archive.
		 });
	 return false;
	 });
	
	//Accordion Menu, 
	 $('#subnav .nav>li>a').click(function(){
	  $(this).parent().find('.sub-menu').toggle('fast');//.find('.sub-menu').show('fast');//slide the sub menu into view on click
		 return false;//don't navigate anywhere if first level nav is clicked
	 });
	
	 
	 /* Window Scroll function to hide the presentation mode when you scroll down */
		var tempScrollTop, currentScrollTop = 0; //first set the scroll positions to 0
		
		$(window).scroll(function(){ //execute this function every time the window is scrolled
			currentScrollTop = $(window).scrollTop(); 
			//set the current scroll to the position of the wrap element
			
			if (currentScrollTop != 0) 
			//the current is greater then the marker, you are scrolling down
			$('#presentation_button').hide('fast');//do this when scrolling down
			
			else if (currentScrollTop == 0 ) //if the current is less than the marker, you are scrolling up
			$('#presentation_button').show('fast');//do this when scrolling up
			tempScrollTop = currentScrollTop; //set the marker to the current value
		});
      //Fade the Content in once it has loaded 
      $('#wrap').animate({opacity: 1},'slow');
	 
	 });//end of document ready function
	 </script>
	 
	 <?php //Enque script is not workign properly.
   //wp_enqueue_script('jquery');   //Don't forget about jQuery No Conflict Wrappers - you can't use the $( shorthand to reference jquery, you need to use jQuery(         
		}    
 
// Setup the child theme
add_action('after_setup_theme','child_theme_setup');
function child_theme_setup() { //All this happens after the main theme is set up.
	
// ** Backend **
	//Add support for post formats
	add_theme_support( 'post-formats', array('quote') );
	// Remove Unused Backend Pages
	//add_action('admin_menu', 'gi_remove_menus');
	
	// Remove Unused Page Layouts
	//genesis_unregister_layout( 'full-width-content' );
	//genesis_unregister_layout( 'content-sidebar' );	
	genesis_unregister_layout( 'sidebar-content' );
	genesis_unregister_layout( 'content-sidebar-sidebar' );
	genesis_unregister_layout( 'sidebar-sidebar-content' );
	genesis_unregister_layout( 'sidebar-content-sidebar' );
	
	// Setup Sidebars
	//unregister_sidebar('sidebar-alt');
	//genesis_register_sidebar(array('name' => 'Blog Sidebar', 'id' => 'blog-sidebar'));
	
	// Add Thumbnails to the post columns in the admin screens
	add_filter('manage_posts_columns', 'posts_columns', 5);
	add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
		
	
	
	
	
	// ** Frontend **	
	
	// Image Sizes
	// Use regenerate thumbnails to re-create the images if you change these values!
		add_image_size('big-background', 1200, 800, true ); //the huge background images at their largest
		add_image_size('small-thumb', 50, 50, true );	//add image size for the smallest, square thumbnails.
		add_image_size('post-image', 310, 500, false );	//add image size for the smallest, square thumbnails.		
		add_image_size('archive-thumb', 300, 300, true );	//add image size for the smallest, square thumbnails.		
		
	
	// Remove Edit link
	add_filter( 'edit_post_link', 'gi_edit_post_link' );

	// Remove Breadcrumbs
	remove_action('genesis_before_loop', 'genesis_do_breadcrumbs');

// Custom Content Templates -- For Single Posts, The Home Page, and Pages
add_action( 'genesis_before_loop', 'gi_custom_content' ); //before the post get the custom content function, found in the frontend functions section

add_action( 'genesis_before_loop', 'child_maybe_do_grid_loop' ); //Before the loop, check to see if we want a custom grid loop on the page

// Add Classes to the Body (like custom class to override default styles)
			
		add_filter('body_class','my_body_classes');// filter to add classes to the body

}//End of Child Theme Setup

// ** Backend Functions ** //

//These functions add thumbnails to the post columns

	function posts_columns($defaults){
		    $defaults['post_thumbs'] = __('Thumbs');
		    return $defaults;
		}
	function posts_custom_columns($column_name, $id){
			if($column_name === 'post_thumbs'){
		        echo the_post_thumbnail( 'small-thumb' );
		    }
		}
//Remove the links menu, or other menus, from the admin panels.
function gi_remove_menus () {
	global $menu;
	$restricted = array(__('Links'));
	// Example:
	//$restricted = array(__('Dashboard'), __('Posts'), __('Media'), __('Links'), __('Pages'), __('Appearance'), __('Tools'), __('Users'), __('Settings'), __('Comments'), __('Plugins'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}

// ** Frontend Functions ** //

//Add Classes to the Body
function my_body_classes($classes) {
		
		//function to add new classes to the filter
		$classes[] ="custom"; // applied to everything so u can customize.
		if (is_home()) //conditional class so u can has custom everything
		$classes[] = "home";
		if (is_category())
		$classes[] = "category";
		if (is_page('upcoming-shows') || is_page('store') || is_single())
		$classes[] = "no-slider";
		if (is_page(1729))
		$classes[] = "splash-page";
		return $classes;
		}


//Custom Content Templates via get_template_part() -- this controls what content is displayed using conditional tags
function gi_do_work_content() {
	get_template_part('content','work'); //Get the file content-work.php and display the contents.
	}
function gi_do_quote_content() {
	get_template_part('content','quote'); //Get the file content-work.php and display the contents.
	}
function gi_do_extra_box()	{
get_template_part('extra_box');
}
function bg_image(){ //function to get the background image for the post
		get_template_part('background_image');
		}
function archive_bg_image(){ //function to get the background image for the post
		get_template_part('background_image', 'archive');
		}
function blog_bg_image(){ //function to get the background image for the post
		get_template_part('background_image', 'blog');
		}
function work_bg_image(){ //function to get the background image for the post
		get_template_part('background_image', 'work');
		}
function do_presentation_button() {
get_template_part('presentation_button');
}

function gi_custom_content() {

if(is_home()){//if its the blog page, remove press category from the loop
query_posts('cat=-56');
}
if (is_front_page()){//Front Page has special loop
		add_action('genesis_before_post' , 'custom_home_content'); //get custom content for the different post formats and types
		remove_action( 'genesis_before_post_content', 'genesis_post_info' );
		remove_action( 'genesis_after_post_content', 'genesis_post_meta' );
		remove_action('genesis_loop', 'genesis_do_loop'); //don't do the normal genesis loop (in this case getting the home page content
		add_action('genesis_loop', 'home_loop'); //instead do the special loop that we set up

		add_action('genesis_after_post_content', 'bg_image'); //add the big background image after the post content
		
		
function home_loop() { //set up the arguements for the custom loop
		 global $paged;
		    $args = array(
		    'post_type' => array('post', 'work', 'page'),//which content should be included in the loop?
		    'meta_value' => '1',//only show posts where the featured checkbox is selected
		    'meta_key' => 'featured',//the meta value key to filter by
		    'orderby' => 'ASC'
		    );
		 
		    genesis_custom_loop( $args ); //special genesis function to replace the main loop with a new one
		 
		}
	
	
function custom_home_content(){
		if('work' == get_post_type()){ //Work Post Type Content
		query_posts('order=ASC');
		remove_action('genesis_post_content', 'genesis_do_post_content' );
		//remove_action('genesis_post_title', 'genesis_do_post_title' );
		add_action('genesis_post_content', 'gi_do_work_content');
		add_action( 'genesis_after_post_content', 'gi_do_extra_box' );
			}//end of work custom post type
	    
	    else if(has_post_format('quote')) {
	    remove_action('genesis_post_content', 'genesis_do_post_content' );
		remove_action('genesis_post_content', 'gi_do_work_content');
		add_action('genesis_post_content', 'gi_do_quote_content');
		remove_action( 'genesis_after_post_content', 'gi_do_extra_box' );
	    //use css to hide the quote titles!
	    }//end of quote post format
	    
	    }//end of custom home content
	    
	}
	//End of front page content
	
	
	//Now All the conditions for other page content
	else if('work' == get_post_type() && is_single()){ //Work Post Type Content
	
	remove_action('genesis_post_content', 'genesis_do_post_content' );
	//remove_action('genesis_post_title', 'genesis_do_post_title' );
	remove_action( 'genesis_before_post_content', 'genesis_post_info' );
	remove_action( 'genesis_after_post_content', 'genesis_post_meta' );
	
	add_action('genesis_post_content', 'gi_do_work_content'); 
	add_action( 'genesis_after_post_content', 'gi_do_extra_box' );
	add_action('genesis_after_post_content', 'bg_image'); //add the big background image after the post content
	add_action('genesis_after', 'do_presentation_button'); //add presentation mode toggle 
	}//end of Work Post Type Content
	
	else if(is_single()){ //Single Post Content
	//remove_action('genesis_post_content', 'genesis_do_post_content' );
	remove_action( 'genesis_before_post_content', 'genesis_post_info' );
	remove_action( 'genesis_after_post_content', 'genesis_post_meta' );
	add_action('genesis_post_content', 'gi_extra_single_content');
	
	function gi_extra_single_content() {
	get_template_part('content','single'); 
	}//Get the file content-single.php and display the contents.
	add_action('genesis_after_post_content', 'bg_image'); //add the big background image after the post content
	}//end of Single Post Content
	
	else if (is_post_type_archive('work')){ //remove the extras from archive pages
	remove_action( 'genesis_before_post_content', 'genesis_post_info' );
	remove_action( 'genesis_after_post_content', 'genesis_post_meta' );
	add_action('genesis_after_post_content', 'work_bg_image'); //add the archive background image after the post content
	}
else if (is_home()){//Not actually the home page, this is the page that is set to display the time-based blog posts, or the news feed because the home is static
remove_action( 'genesis_before_post_content', 'genesis_post_info' );
remove_action( 'genesis_after_post_content', 'genesis_post_meta' );
add_action('genesis_after_post_content', 'blog_bg_image'); //add the archive background image after the post content
}
	
	else if (is_archive()){ //remove the extras from archive pages
	remove_action( 'genesis_before_post_content', 'genesis_post_info' );
	remove_action( 'genesis_after_post_content', 'genesis_post_meta' );
	add_action('genesis_after_post_content', 'archive_bg_image'); //add the archive background image after the post content
	}
	else if (is_404()){
	
	}
	else if(is_page()){ //Single Page Content
	//remove_action('genesis_post_title', 'genesis_do_post_title' );
	//remove_action('genesis_post_content', 'genesis_do_post_content' );
	add_action('genesis_post_content', 'gi_extra_page_content');
	function gi_extra_page_content() {
	get_template_part('content','page'); //Get the file content-page.php and display the contents.
	}
	add_action('genesis_after_post_content', 'bg_image'); //add the big background image after the post content
	}//end of Single Page Content
	else {
	remove_action( 'genesis_before_post_content', 'genesis_post_info' );
	remove_action( 'genesis_after_post_content', 'genesis_post_meta' );
	add_action('genesis_after_post_content', 'bg_image'); //add the big background image after the post content
	}	
	if(has_post_format('quote') && is_single()){ //remove the title from single Quote Posts
	remove_action('genesis_post_title', 'genesis_do_post_title' ); //remove the title
	remove_action('genesis_after_post', 'genesis_get_comments_template');//remove the comments
	}
//end of custom content function
}

/* ---- CUSTOM GRID LOOP FUNCTIONS ----- */
function child_maybe_do_grid_loop() {
 
    // Amend this conditional to pick where this grid looping occurs
if ( ! is_single() && ! is_page() && ! is_front_page() && ! is_home() && ! is_404()) {
        // Remove the standard loop
        remove_action( 'genesis_loop', 'genesis_do_loop' );
 
        // Use the prepared grid loop
        add_action( 'genesis_loop', 'child_do_grid_loop' );
 
        // Add some extra post classes to the grid loop so we can style the columns
        add_filter( 'genesis_grid_loop_post_class', 'child_grid_loop_post_class' );
        
        //switch up our content
        add_action('genesis_before_post', 'child_switch_content');
      
    }
 }
 
/**
 * Prepare the grid loop.
 *
 * Takes care of existing query arguments for the page e.g. if it's a category
 * archive page, then the "cat" argument is carried into the grid loop, unless
 * it's overwritten in the $grid_args.
 *
 * @author Gary Jones
 * @link http://dev.studiopress.com/genesis-grid-loop-advanced.htm
 * @uses genesis_grid_loop() Requires Genesis 1.5
 */
function child_do_grid_loop() {

    global $query_string, $paged;
    // Ensure the arguments for the normal query for the page are carried forwards
    // If you're using a Page to query the posts (e.g. with the Blog template), comment out the next line.
    wp_parse_str( $query_string, $query_args );
      // Create an array of arguments for the loop - can be grid-specific, or
    // normal query_posts() arguments to alter the loop
    $grid_args = array(
        'features' => 0,
        'feature_image_size' => 0,
        'feature_image_class' => 'alignleft post-image',
        'feature_content_limit' => 0,
        'grid_image_size' => 'small-thumb',
        'grid_image_class' => 'alignleft post-image',
        'grid_content_limit' => 0,
        'more' => __( 'Continue reading &#x2192;', 'genesis' ),
        'posts_per_page' => 44
    );
 
    // Make sure the first page has a balanced grid
    if ( 0 == $paged )
        // If first page, add number of features to grid posts, so balance is maintained
        $grid_args['posts_per_page'] += $grid_args['features'];
    else
        // Keep the offset maintained from our page 1 adjustment
        $grid_args['offset'] = ( $paged - 1 ) * $grid_args['posts_per_page'] + $grid_args['features'];
 
    // Merge the standard query for this page, and our preferred loop arguments
    genesis_grid_loop( array_merge( (array) $query_args, $grid_args ) );
 
} 
/**
 * Add some extra body classes to grid posts.
 *
 * Change the $columns value to alter how many columns wide the grid uses.
 *
 * @author Gary Jones
 * @link http://dev.studiopress.com/genesis-grid-loop-advanced.htm
 *
 * @global array $_genesis_loop_args
 * @global integer $loop_counter
 * @param array $classes
 */
function child_grid_loop_post_class( $grid_classes ) {
    global $_genesis_loop_args, $loop_counter;
 
    // Alter this number to change the number of columns - used to add class names
    $columns = 3;
 
    // Only want extra classes on grid posts, not feature posts
    if ( $loop_counter >= $_genesis_loop_args['features'] ) {
 
        // Add genesis-grid-column-? class to know how many columns across we are
        $grid_classes[] = sprintf( 'genesis-grid-column-%s', ( ( $loop_counter - $_genesis_loop_args['features'] ) % $columns ) + 1 );
 
        // Add size1of? class to make it correct width
        $grid_classes[] = sprintf( 'size1of%s', $columns );
    }
    return $grid_classes;
}

//We want to customize the content of the grid loops, so here's where we do it
function child_grid_loop_content() {
    global $_genesis_loop_args;
    global $post;
    $post_id = $post->ID;
 
    //here you can customize the content of the genesis grid loop based on post formats/types
    if (! is_single() && ! is_page() && ! is_front_page() && ! is_404()){//we don't want to swap out the content for single, post or pages. 
    
    if (has_post_format('quote', $post_id)){  
     get_template_part('grid','quote');
    }//end of quote format
    
    else if ('work' == get_post_type()){
    get_template_part('grid','work');
    }
    
    else {//if its just a single post, nothing fancy, totally normal, do this 
     get_template_part('grid');
    }




    }//end of single or page test
    } //end of child grid loop content
    // Customize Grid Loop Content



function child_switch_content() {
    remove_action('genesis_post_content', 'genesis_grid_loop_content'); 
    add_action('genesis_post_content', 'child_grid_loop_content');
}

    

/* END OF THE CUSTOM GRID LOOP FUNCTIONS */
/* Options Frame work helper */
/*
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * This code allows the theme to work without errors if the Options Framework plugin has been disabled.
 */
 
if ( !function_exists( 'of_get_option' ) ) {
function of_get_option($name, $default = false) {
 
    $optionsframework_settings = get_option('optionsframework');
 
    // Gets the unique option id
    $option_name = $optionsframework_settings['id'];
 
    if ( get_option($option_name) ) {
        $options = get_option($option_name);
    }
 
    if ( isset($options[$name]) ) {
        return $options[$name];
    } else {
        return $default;
    }
}
}

function gi_edit_post_link($link) {
	return '';
}


// ** Unhooked Functions ** //