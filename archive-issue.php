<?php

$date = DateTime::createFromFormat('Ymd', get_field('date'));
$date = $date->format('j F Y');

?>

<li>
    <a href="<?php the_field('mailchimp_url'); ?>" target="_blank">Issue #<?php the_field('issue_number'); ?> &mdash; <?php the_title(); ?></a> (<?php echo $date; ?>)
</li>
