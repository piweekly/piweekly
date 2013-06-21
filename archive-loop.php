<?php

$args = array(
    'post_type' => 'issue',
);

$issues = new WP_Query($args);

?>

<ul>

<?php

while ($issues->have_posts()) {
    $issues->the_post();
    get_template_part('archive', 'issue');
}

?>

</ul>
