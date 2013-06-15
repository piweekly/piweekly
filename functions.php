<?php

// Menus
register_nav_menu('nav_bar', 'Nav Bar');

// Hack to disable WP adding 28px margin-top to the body for the admin bar
add_action('get_header', 'my_filter_head');

function my_filter_head() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}

function timestamped_stylesheet() {
    $stylesheet = get_bloginfo('stylesheet_url');
    $stylesheet_path = get_stylesheet_directory() . '/style.css';
    echo $stylesheet . "?" . filemtime($stylesheet_path);
}