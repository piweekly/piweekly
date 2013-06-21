<?php

get_header();

the_post();

if (is_page('archive')) {
    get_template_part('archive', 'loop');
}
else {
    the_content();
    get_template_part('latest', 'issue');
}

get_footer();
