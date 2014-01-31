<?php

$latest = new WP_Query('posts_per_page=1');

$latest->the_post();

wp_redirect(get_permalink());
exit();
