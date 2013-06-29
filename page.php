<?php

get_header();

the_post();

the_content();

if (is_front_page()) {
    get_template_part('latest', 'issue');
}

get_footer();
