<?php

// Menus
register_nav_menu('nav_bar', 'Nav Bar');

// Hack to disable WP adding 28px margin-top to the body for the admin bar
add_action('get_header', 'my_filter_head');

// Add Featured Images
add_theme_support('post-thumbnails');

// Image Sizes
add_image_size('email', 564, 564, false);

function my_filter_head() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}

// Change Post to Issue
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Issues';
    $submenu['edit.php'][5][0] = 'Issues';
    $submenu['edit.php'][10][0] = 'New Issue';
    $submenu['edit.php'][16][0] = 'Issue Tags';
}

function change_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Issues';
    $labels->singular_name = 'Issue';
    $labels->add_new = 'New Issue';
    $labels->add_new_item = 'New Issue';
    $labels->edit_item = 'Edit Issue';
    $labels->new_item = 'New Issue';
    $labels->view_item = 'View Issue';
    $labels->search_items = 'Search Issues';
    $labels->not_found = 'Not found';
    $labels->not_found_in_trash = 'Not found in Trash';
 }
 add_action('init', 'change_post_object_label');
 add_action('admin_menu', 'change_post_menu_label');

function create_interview_post_type() {
    $labels = array(
        'name'               => 'Interviews',
        'singular_name'      => 'Interview',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Interview',
        'edit_item'          => 'Edit Interview',
        'new_item'           => 'New Interview',
        'all_items'          => 'All Interviews',
        'view_item'          => 'View Interview',
        'search_items'       => 'Search Interviews',
        'not_found'          => 'No Interviews found',
        'not_found_in_trash' => 'No Interviews found in Trash',
        'parent_item_colon'  => '',
        'menu_name'          => 'Interviews',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'interview'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'excerpt', 'thumbnail'),
    );

    register_post_type('interview', $args);
}
add_action('init', 'create_interview_post_type');

function timestamped_stylesheet($stylesheet='style.css') {
    $stylesheet_url = get_bloginfo('template_url') . '/' . $stylesheet;
    $stylesheet_path = get_stylesheet_directory() . '/' . $stylesheet;
    echo $stylesheet_url . "?" . filemtime($stylesheet_path);
}

function get_latest_issue() {
    $issues = new WP_Query('posts_per_page=1000');

    while ($issues->have_posts()) {
        $issues->the_post();

        if (get_field('mailchimp_url')) {
            break;
        }
    }

    return array(
        'issue_number' => get_field('issue_number'),
        'mailchimp_url' => get_field('mailchimp_url'),
        'title' => get_the_title(),
    );
}

function pw_title() {
    if (is_front_page()) {
        bloginfo('title');
        echo " - free email newsletter for Raspberry Pi News &amp; Projects";
    }
    else {
        bloginfo('title');
        wp_title(' |', true, 'left');
    }
}

function pw_header() {
    echo str_replace(' ', '', strtolower(get_bloginfo('title')));
}
