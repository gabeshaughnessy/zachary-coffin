<?php

add_action( 'after_setup_theme', 'wpse3882_after_setup_theme' );
function wpse3882_after_setup_theme()
{
    add_editor_style();
}

add_filter( 'mce_buttons_2', 'wpse3882_mce_buttons_2' );
function wpse3882_mce_buttons_2($buttons)
{
    array_unshift($buttons, 'styleselect');
    return $buttons;
}

add_filter( 'tiny_mce_before_init', 'wpse3882_tiny_mce_before_init' );
function wpse3882_tiny_mce_before_init( $settings )
{
    $settings['theme_advanced_blockformats'] = 'p,h1,h2,h3,h4';

    // From http://tinymce.moxiecode.com/examples/example_24.php
    $style_formats = array(
        array( 'title' => 'Callout Light'	, 'block' => 'div', 'classes' => 'callout-light' ),
        array( 'title' => 'Callout Medium', 'block' => 'div', 'classes' => 'callout-medium' ),
        array( 'title' => 'Callout Dark'	, 'block' => 'div', 'classes' => 'callout-dark' ),
        
        array( 'title' => 'Layouts Columns'),
        array( 'title' => '&frac12;'			, 'block' => 'div', 'classes' => 'one-half' ),
        array( 'title' => '&frac12; Last'	, 'block' => 'div', 'classes' => 'one-half last' ),
        array( 'title' => '&frac13;'			, 'block' => 'div', 'classes' => 'one-third' ),
        array( 'title' => '&frac13; Last'	, 'block' => 'div', 'classes' => 'one-third last' ),
        array( 'title' => '&frac14;'			, 'block' => 'div', 'classes' => 'one-fourth' ),
        array( 'title' => '&frac14; Last'	, 'block' => 'div', 'classes' => 'one-fourth last' ),
        array( 'title' => '&frac23;'			, 'block' => 'div', 'classes' => 'two-third' ),
        array( 'title' => '&frac23; Last'	, 'block' => 'div', 'classes' => 'two-third last' ),
        array( 'title' => '&frac34;'			, 'block' => 'div', 'classes' => 'three-fourth' ),
        array( 'title' => '&frac34; Last'	, 'block' => 'div', 'classes' => 'three-fourth last' ),
    );
    
    // Before 3.1 you needed a special trick to send this array to the configuration.
    // See this post history for previous versions.
    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;
}

?>