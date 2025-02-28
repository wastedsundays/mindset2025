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

}

add_action('wp_enqueue_scripts', 'mindset_enqueues');

function mindset_setup() {
    add_editor_style( get_stylesheet_uri() );
}
add_action('after_setup_theme', 'mindset_setup');
