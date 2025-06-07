<?php
function traveltools_enqueue_styles() {
    error_log('Enqueue function ran!');

    wp_enqueue_style(
        'traveltools-style',
        get_template_directory_uri() . '/dist/style.css',
        array(),
        filemtime(get_template_directory() . '/dist/style.css')
    );
}
add_action('wp_enqueue_scripts', 'traveltools_enqueue_styles');

function traveltools_register_menus() {
  register_nav_menus([
      'primary' => __('Primary Menu', 'traveltools'),
      'footer' => __('Footer Menu', 'traveltools'),
  ]);
}
add_action('after_setup_theme', 'traveltools_register_menus');

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Theme Options',
        'menu_title'    => 'Theme Options',
        'menu_slug'     => 'theme-options',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}
