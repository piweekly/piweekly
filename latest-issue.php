<?php $latest_issue = pw_get_latest_issue(); ?>

<p class="latest-issue">
    Check out our latest newsletter: <a href="<?php echo get_permalink($latest_issue); ?>">Issue #<?php echo get_field('issue_number', $latest_issue); ?> &mdash; <?php echo get_the_title($latest_issue); ?></a>
</p>
