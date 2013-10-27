<p class="latest-issues">Check out our latest newsletters:</p>
<ul>
<?php

$issues = new WP_Query('posts_per_page=3');

while ($issues->have_posts()):
    $issues->the_post();

?>
    <li class="archive-issue">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
        <a href="<?php the_permalink(); ?>">Issue #<?php the_field('issue_number'); ?> &mdash; <?php the_title(); ?></a>
        <div class="archive-issue-date"><?php the_date(); ?></div>
    </li>
<?php endwhile; ?>
</ul>
<div style="clear:both;"></div>

<p class="home-final">Or view the full <a href="/archive/">archive</a></p>
