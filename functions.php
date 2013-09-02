<?php

// Menus
register_nav_menu('nav_bar', 'Nav Bar');

// Hack to disable WP adding 28px margin-top to the body for the admin bar
add_action('get_header', 'my_filter_head');

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

function timestamped_stylesheet($stylesheet='style.css') {
    $stylesheet_url = get_bloginfo('template_url') . '/' . $stylesheet;
    $stylesheet_path = get_stylesheet_directory() . '/' . $stylesheet;
    echo $stylesheet_url . "?" . filemtime($stylesheet_path);
}

function get_latest_issue() {
    $args = array(
        'post_type' => 'post',
    );

    $issues = new WP_Query($args);

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
