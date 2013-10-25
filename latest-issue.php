<p class="latest-issues">Check out our latest newsletters:</p>
<ul>
    <?php $latest_issues = pw_get_latest_issues();

    foreach ($latest_issues as $latest_issue): ?>
        <li class="archive-issue">
            <a href="<?php echo get_permalink($latest_issue); ?>"><?php echo get_the_post_thumbnail($latest_issue, 'thumbnail'); ?></a>
            <a href="<?php echo get_permalink($latest_issue); ?>">Issue #<?php echo get_field('issue_number', $latest_issue); ?> &mdash; <?php echo get_the_title($latest_issue); ?></a>
            <div class="archive-issue-date"><?php echo pw_date_format(get_field('date', $latest_issue)); ?></div>
        </li>
    <?php endforeach; ?>
</ul>
<div style="clear:both;"></div>

<p class="home-final">Or view the full <a href="/archive/">archive</a></p>
