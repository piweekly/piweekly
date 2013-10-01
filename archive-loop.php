<?php $issues = new WP_Query('posts_per_page=1000'); ?>

<ul>

<?php

while ($issues->have_posts()) {
    $issues->the_post();
    if (get_field('mailchimp_url')) {
        get_template_part('archive', 'issue');
    }
}

?>

</ul>
