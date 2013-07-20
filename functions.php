<?php

// Menus
register_nav_menu('nav_bar', 'Nav Bar');

// Hack to disable WP adding 28px margin-top to the body for the admin bar
add_action('get_header', 'my_filter_head');

function my_filter_head() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}

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
