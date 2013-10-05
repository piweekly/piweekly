<?php $latest_issue = pw_get_latest_issue(); ?>

<p class="latest-issue">
    Check out our latest newsletter: <a href="<?php echo $latest_issue['mailchimp_url']; ?>" target="_blank">Issue #<?php echo $latest_issue['issue_number']; ?> &mdash; <?php echo $latest_issue['title']; ?></a>
</p>
