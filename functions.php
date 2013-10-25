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

// Useful functions

function timestamped_stylesheet($stylesheet='style.css') {
    $stylesheet_url = get_bloginfo('template_url') . '/' . $stylesheet;
    $stylesheet_path = get_stylesheet_directory() . '/' . $stylesheet;
    echo $stylesheet_url . "?" . filemtime($stylesheet_path);
}

// Pi Weekly specific functions

function pw_get_latest_issues() {
    $issues = new WP_Query('posts_per_page=3');

    $issue_ids = array();

    while ($issues->have_posts()) {
        $issues->the_post();
        $issue_ids[] = get_the_ID();
    }

    return $issue_ids;
}

function pw_title() {
    bloginfo('title');
    if (is_front_page()) {
        echo " - free email newsletter for Raspberry Pi News &amp; Projects";
    }
    elseif (is_singular('post')) {
        echo " Issue #" . get_field('issue_number') . " - " . get_the_title();
    }
    elseif (is_singular('interview')) {
        echo " | Interview - " . get_the_title();
    }
    else {
        wp_title(' |', true, 'left');
    }
}

function pw_header() {
    echo str_replace(' ', '', strtolower(get_bloginfo('title')));
}

// Shortcode [userbio]
function pw_user_bio($opts) {
    $id = $opts['id'];
    return get_field('bio', "user_{$id}");
}
add_shortcode('userbio', 'pw_user_bio');

function pw_date_format($date) {
    $datetime = new DateTime($date);
    return $datetime->format('j F Y');
}

function pw_prevnext($prev_or_next) {
    $next = $prev_or_next == 'next';
    $link_post = $next ? get_next_post() : get_previous_post();
    $id = $link_post->ID;

    $wording = "Issue #" . get_field('issue_number', $id) . " &mdash; " . get_the_title($id);
    $link = get_permalink($id);

    $html = "<a href='{$link}'>{$wording}</a>";

    return $next ? "{$html} &raquo;" : "&laquo; {$html}";
}

add_filter('next_post_link', 'pw_next_issue_link', 10, 0);
function pw_next_issue_link() {
    if (get_next_post()) {
        return pw_prevnext('next');
    }
    return '&nbsp;';
}

add_filter('previous_post_link', 'pw_previous_issue_link', 10, 0);
function pw_previous_issue_link() {
    if (get_previous_post()) {
        return pw_prevnext('previous');
    }
    return '&nbsp;';
}

function pw_header_tag($open=true) {
    $tag = is_front_page() ? 'h1' : 'strong';
    echo $open ? "<{$tag}>" : "</{$tag}>";
}

function pw_centred_pages() {
    if (is_front_page() ||
    is_page('archive') ||
    is_page('submissions') ||
    is_page('sponsorship') ||
    is_page('thanks') ||
    is_page('confirmation')) {
        echo "centred";
    }
}
