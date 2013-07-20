<?php

$args = array(
    'post_type' => 'post',
);

$issues = new WP_Query($args);

?>

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
