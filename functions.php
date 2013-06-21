<?php

// Menus
register_nav_menu('nav_bar', 'Nav Bar');

// Hack to disable WP adding 28px margin-top to the body for the admin bar
add_action('get_header', 'my_filter_head');

function my_filter_head() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}

// Custom post types

add_action('init', 'create_issue_post_type');

function create_issue_post_type() {
    register_post_type('issue',
        array(
            'labels' => array(
                'name' => 'Issue',
                'singular_name' => 'Issue',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Issue',
                'edit_item' => 'Edit Issue',
                'new_item' => 'New Issue',
                'all_items' => 'All Issues',
                'view_item' => 'View Issue',
                'search_items' => 'Search Issues',
                'not_found' =>  'No Issues Found',
                'not_found_in_trash' => 'No Issues found in Trash', 
                'menu_name' => 'Issues',
            ),
            'public' => true,
            'has_archive' => false,
            'supports' => array('title'),
        )
    );

    flush_rewrite_rules(false);
}

function timestamped_stylesheet($stylesheet='style.css') {
    $stylesheet_url = get_bloginfo('template_url') . '/' . $stylesheet;
    $stylesheet_path = get_stylesheet_directory() . '/' . $stylesheet;
    echo $stylesheet_url . "?" . filemtime($stylesheet_path);
}
