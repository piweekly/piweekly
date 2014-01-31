<?php

if (!is_user_logged_in()) {
    wp_redirect(home_url());
    exit;
}

$args = array(
    'posts_per_page' => 1,
    'post_status' => 'future',
);

$next = new WP_Query($args);

if ($next->have_posts()) {
    $next->the_post();
    wp_redirect(get_permalink());
}
else {
    wp_redirect(get_bloginfo('home') . '/wp-admin/post-new.php');
}
exit();
