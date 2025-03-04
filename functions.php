<?php

function mindset_enqueues() {

    //load style.css on front-end
    wp_enqueue_style(
        'mindset-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version'),
        'all'
    );
    
    //load normalize.css on front-end
    wp_enqueue_style(
        'mindset-normalize',
        'https://unpkg.com/@csstools/normalize.css',
        array(),
        '12.1.0'
    );

    //load scroll-to-top.js on front-end
    wp_enqueue_script(
        'mindset-scroll-to-top',
        get_template_directory_uri( ).'/assets/js/scroll-to-top.js',
        array(),
        wp_get_theme()->get('Version'),
        array('strategy' => 'defer')
    );

    if(is_page(15)) {
        wp_enqueue_script(
            'mindset-contact-scroll-to-top',
            get_template_directory_uri( ).'/assets/js/contact-scroll-to-top.js',
            array('mindset-scroll-to-top'),
            wp_get_theme()->get('Version'),
            array('strategy' => 'defer')
        );
    }

}

add_action('wp_enqueue_scripts', 'mindset_enqueues');

function mindset_setup() {
    //add style.css to editor
    add_editor_style( get_stylesheet_uri() );

    //add custom image sizes
    add_image_size( '400x500', 400, 500, true );
    add_image_size( '200x250', 200, 250, true );
    add_image_size( '400x200', 400, 200, true );
    add_image_size( '800x400', 800, 400, true );
    
}
add_action('after_setup_theme', 'mindset_setup');


function mindset_add_custom_image_sizes( $size_names ) {
	$new_sizes = array(
		'400x500' => __( '400x500', 'mindset-theme' ),
		'200x250' => __( '200x250', 'mindset-theme' ),
        '400x200' => __( '400x200', 'mindset-theme' ),
        '800x400' => __( '800x400', 'mindset-theme' ),
	);
	return array_merge( $size_names, $new_sizes );
}
add_filter( 'image_size_names_choose', 'mindset_add_custom_image_sizes' );

