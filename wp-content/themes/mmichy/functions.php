<?php

function mmichy_register_styles() {
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('mmichy-style', get_template_directory_uri() . "/assets/css/main.css", array(), $version, 'all');
    wp_enqueue_style('mmichy-style', get_template_directory_uri() . "/assets/css/responsive.css", array(), $version, 'all');
}
function mmichy_register_scripts() {
    $version = wp_get_theme()->get('Version');
    wp_enqueue_script('mmichy-script', get_template_directory_uri() . "/assets/js/main.js", array(), $version, true);
}
register_nav_menus(
    array(
        'primary' => 'Menu principal',
        'primary-mobile' => 'Menu principal sur mobile',
    )
);


function mmichy_setup() {
    add_theme_support('title-tag');
    add_theme_support('menus');
}

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

add_action('after_setup_theme', 'mmichy_setup');
add_action('wp_enqueue_scripts', 'mmichy_register_styles');
add_action('wp_enqueue_scripts', 'mmichy_register_scripts');


?>