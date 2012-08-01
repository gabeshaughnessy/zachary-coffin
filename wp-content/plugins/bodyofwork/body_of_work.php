<?php 
/*
Plugin Name: Body of Work
Plugin URI: http://gabesimagination.com
Description: Adds Custom Post Type work Artwork, for Artists wishing to keep their work separate from their blogs, and creating Portfolio sites.
Version: 0.1 
Author: Gabe's Imagination
Author URI: http://gabesimagination.com
License: GPL2
*/

/*
Resources -- 
Writing a Plugin Codex guide: http://codex.wordpress.org/Writing_a_Plugin
WP_PLUGIN_DIR - constant for plugin directory because some users configure their sites to have plugins in different locations
plugins_url() - function that returns the plugin directory url http://codex.wordpress.org/Function_Reference/plugins_url

 */
 
 add_action('init', 'register_works'); //custom function to register the post type 'Works'
 
 function register_works(){
 
	register_post_type( 'work',
		array(
			'labels' => array(
				'name' => __( 'Works' ),
				'singular_name' => __( 'Work' ),
				'add_new' => __('Add New Work'),
				'add_new_item' => __('Add New Work')
			),
			'public' => true,
			'has_archive' => true,
			'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
		)
	);
	bow_create_taxonomies();
 }// end of register_works()
 
 /* Taxonomies */
 
 function bow_create_taxonomies() {
	register_taxonomy( 
		'material', //taxonomy slug
		'work', //post type
		array( 
			'hierarchical' => false, 
			'labels' => array(
				'name' => 'Materials',
				'singlular_name' => 'Material',
				'add_new_item' => __('Add New Material')
			),
			'priority' => 10,
			'query_var' => true, 
			'rewrite' => true 
		) 
	);
	register_taxonomy( 
		'series', //taxonomy slug
		'work', //post type
		array( 
			'hierarchical' => false, 
			'labels' => array(
				'name' => 'Series',
				'singlular_name' => 'Series',
				'add_new_item' => __('Add New Series')
			),
			'query_var' => true, 
			'rewrite' => true 
		) 
	);
	register_taxonomy( 
		'medium', //taxonomy slug
		'work', //post type
		array( 
			'hierarchical' => false, 
			'labels' => array(
				'name' => 'Media',
				'singlular_name' => 'Medium',
				'add_new_item' => __('Add New Medium')
			),
			'query_var' => true, 
			'rewrite' => true 
		) 
	);
	register_taxonomy( 
		'motive', //taxonomy slug
		'work', //post type
		array( 
			'hierarchical' => false, 
			'labels' => array(
				'name' => 'Motives',
				'singlular_name' => 'Motive',
				'add_new_item' => __('Add New Motive')
			),
			'query_var' => true, 
			'rewrite' => true 
		) 
	);
	register_taxonomy( 
		'location', //taxonomy slug
		'work', //post type
		array( 
			'hierarchical' => false, 
			'labels' => array(
				'name' => 'Locations',
				'singlular_name' => 'Location',
				'add_new_item' => __('Add New Location')
			),
			'query_var' => true, 
			'rewrite' => true 
		) 
	);
	register_taxonomy( 
		'scale', //taxonomy slug
		'work', //post type
		array( 
			'hierarchical' => false, 
			'labels' => array(
				'name' => 'Scales',
				'singlular_name' => 'Scale',
				'add_new_item' => __('Add New Scale')
			),
			'query_var' => true, 
			'rewrite' => true 
		) 
	);
	register_taxonomy( 
		'status', //taxonomy slug
		'work', //post type
		array( 
			'hierarchical' => false, 
			'labels' => array(
				'name' => 'Status',
				'singlular_name' => 'Status',
				'add_new_item' => __('Add New Status')
			),
			'query_var' => true, 
			'rewrite' => true 
		) 
	);
	register_taxonomy( 
		'theme', //taxonomy slug
		'work', //post type
		array( 
			'hierarchical' => false, 
			'labels' => array(
				'name' => 'Themes',
				'singlular_name' => 'Theme',
				'add_new_item' => __('Add New Theme')
			),
			'query_var' => true, 
			'rewrite' => true 
		) 
	);
	register_taxonomy( 
		'era', //taxonomy slug
		'work', //post type
		array( 
			'hierarchical' => false, 
			'labels' => array(
				'name' => 'Eras',
				'singlular_name' => 'Era',
				'add_new_item' => __('Add New Era')
			),
			'query_var' => true, 
			'rewrite' => true 
		) 
	);
	register_taxonomy( 
		'year', //taxonomy slug
		'work', //post type
		array( 
			'hierarchical' => false, 
			'labels' => array(
				'name' => 'Years',
				'singlular_name' => 'Year',
				'add_new_item' => __('Add New Year')
			),
			'query_var' => true, 
			'rewrite' => true 
		) 
	);
}

 
 add_action('init', 'bow_meta_boxes');
 
 function bow_meta_boxes(){
 // include css to help style our custom meta boxes
 function meta_styles(){
  ?>
<link rel="stylesheet" href="<?php echo plugins_url() . '/bodyofwork/metabox/style.css'; ?>" />
<!--
this function was breaking things in the options framework, I think the guilty part was the jquery combo box scripts
<script type='text/javascript' src='<?php //echo plugins_url() . '/bodyofwork/metabox/jquery.cmbScripts.js'; ?>'></script>-->
<?php
}

add_action('admin_head', 'meta_styles');
 
 
// Include & setup custom metabox and fields
$prefix = 'bow_';
$meta_boxes = array();

$meta_boxes[] = array(
    'id' => 'work_details',
    'title' => 'Work Details',
    'pages' => array('work'), // post type
	'context' => 'normal',
	'priority' => 'high',
	'show_names' => true, // Show field names on the left
    'fields' => array(
       array(
            'name' => 'Materials',
            'desc' => 'List the specific materials used in this work',
            'id' => $prefix . 'materials',
            'type' => 'text'
        ),
         array(
            'name' => 'Dimensions',
            'desc' => 'Length X Width X Height',
            'id' => $prefix . 'dimensions',
            'type' => 'text'
        ),

      
       /* array(
            'name' => 'Test Text',
            'desc' => 'field description (optional)',
            'id' => $prefix . 'test_text',
            'type' => 'text'
        ),
		array(
            'name' => 'Test Text Small',
            'desc' => 'field description (optional)',
            'id' => $prefix . 'test_textsmall',
            'type' => 'text_small'
        ),
		array(
            'name' => 'Test Text Medium',
            'desc' => 'field description (optional)',
            'id' => $prefix . 'test_textmedium',
            'type' => 'text_medium'
        ),
		array(
	        'name' => 'Test Date Picker',
	        'desc' => 'field description (optional)',
	        'id' => $prefix . 'test_textdate',
	        'type' => 'text_date'
	    ),
		array(
	        'name' => 'Test Money',
	        'desc' => 'field description (optional)',
	        'id' => $prefix . 'test_textmoney',
	        'type' => 'text_money'
	    ),
	    array(
	        'name' => 'Test Text Area',
	        'desc' => 'field description (optional)',
	        'id' => $prefix . 'test_textarea',
	        'type' => 'textarea'
	    ),
		array(
	        'name' => 'Test Text Area Small',
	        'desc' => 'field description (optional)',
	        'id' => $prefix . 'test_textareasmall',
	        'type' => 'textarea_small'
	    ),
		array(
	        'name' => 'Test Title Weeeee',
	        'desc' => 'This is a title description',
	        'type' => 'title'
	    ),
		array(
		       'name' => 'Test Select',
		       'desc' => 'field description (optional)',
		       'id' => $prefix . 'test_select',
		       'type' => 'select',
				'options' => array(
					array('name' => 'Option One', 'value' => 'standard'),
					array('name' => 'Option Two', 'value' => 'custom'),
					array('name' => 'Option Three', 'value' => 'none')				
				)
		),
		array(
	        'name' => 'Test Radio inline',
	        'desc' => 'field description (optional)',
	        'id' => $prefix . 'test_radio',
	        'type' => 'radio_inline',
			'options' => array(
				array('name' => 'Option One', 'value' => 'standard'),
				array('name' => 'Option Two', 'value' => 'custom'),
				array('name' => 'Option Three', 'value' => 'none')				
			)
	    ),
		array(
	        'name' => 'Test Radio',
	        'desc' => 'field description (optional)',
	        'id' => $prefix . 'test_radio',
	        'type' => 'radio',
			'options' => array(
				array('name' => 'Option One', 'value' => 'standard'),
				array('name' => 'Option Two', 'value' => 'custom'),
				array('name' => 'Option Three', 'value' => 'none')				
			)
	    ),
		array(
	        'name' => 'Test Checkbox',
	        'desc' => 'field description (optional)',
	        'id' => $prefix . 'test_checkbox',
	        'type' => 'checkbox'
	    ),
		array(
	        'name' => 'Test Multi Checkbox',
	        'desc' => 'field description (optional)',
	        'id' => $prefix . 'test_multicheckbox',
	        'type' => 'multicheck',
			'options' => array(
				'check1' => 'Check One',
				'check2' => 'Check Two',
				'check3' => 'Check Three',
			)
	    ),
		array(
	        'name' => 'Test wysiwyg',
	        'desc' => 'field description (optional)',
	        'id' => $prefix . 'test_wysiwyg',
	        'type' => 'wysiwyg'
	    ),
		array(
	        'name' => 'Test Image',
	        'desc' => 'Upload an image or enter an URL.',
	        'id' => $prefix . 'test_image',
	        'type' => 'file'
	    ), */
	    
    )
);
require_once('metabox/init.php');
 };
 ?>