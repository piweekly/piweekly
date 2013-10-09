<?php

get_header();

the_post();
the_content();
get_template_part('latest', 'issue');

get_footer();
