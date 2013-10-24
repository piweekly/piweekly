<?php $issues = new WP_Query('posts_per_page=1000'); ?>

<ul class="archive">

<?php

while ($issues->have_posts()) {
    $issues->the_post();
    if (get_field('live')) {
        get_template_part('archive', 'issue');
    }
}

?>

</ul>
<div style="clear:both;"></div>
