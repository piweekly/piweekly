<li class="archive-issue">
    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
    <a href="<?php the_permalink(); ?>">Issue #<?php the_field('issue_number'); ?> &mdash; <?php the_title(); ?></a>
    <div class="archive-issue-date"><?php echo pw_date_format(get_field('date')); ?></div>
</li>
