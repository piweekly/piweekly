<?php

$latest_issue = get_latest_issue();

?>

<p class="latest-issue">
    Check out our latest issue: <a href="<?php echo $latest_issue['mailchimp_url']; ?>" target="_blank">#<?php echo $latest_issue['issue_number']; ?> &mdash; <?php echo $latest_issue['title']; ?></a>
</p>
