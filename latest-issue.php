<?php

$args = array(
    'post_type' => 'issue',
    'posts_per_page' => 1,
);

$latest_issue = new WP_Query($args);

$latest_issue->the_post();

?>

<p class="latest-issue">
    Check out our latest issue: <a href="<?php the_field('issue_url'); ?>" target="_blank">#<?php the_field('issue_number'); ?> &mdash; <?php the_title(); ?></a>
</p>
