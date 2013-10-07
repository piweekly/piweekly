<?php

get_header();

the_post();

?>

<article class="issue">
    <header>
        <h2>Issue #<?php the_field('issue_number'); ?> &mdash; <?php the_title(); ?></h2>
        <div class="date"><?php echo pw_date_format(get_field('date')); ?></div>
    </header>

    <?php the_content(); ?>
    <hr class="thick" />

    <?php if (has_post_thumbnail()): ?>
        <h3>Picture of the week</h3>
        <a href="<?php the_field('picture_link'); ?>" target="_blank">
            <?php the_post_thumbnail('email'); ?>
        </a>

        <?php the_field('picture_description'); ?>
        <hr />
    <?php endif; ?>

    <h3>News</h3>
    <ul>
    <?php while (has_sub_field('news')): ?>
        <li>
            <a href="<?php the_sub_field('url'); ?>" target="_blank"><?php the_sub_field('title'); ?></a> (<?php echo get_domain_from_url(get_sub_field('url')); ?>)<br />
            <?php the_sub_field('summary'); ?>
        </li>
    <?php endwhile; ?>
    </ul>
    <hr />

    <h3>Projects</h3>
    <ul>
    <?php while (has_sub_field('projects')): ?>
        <li>
            <a href="<?php the_sub_field('url'); ?>" target="_blank"><?php the_sub_field('title'); ?></a> (<?php echo get_domain_from_url(get_sub_field('url')); ?>)<br />
            <?php the_sub_field('summary'); ?>
        </li>
    <?php endwhile; ?>
    </ul>
    <hr />

    <h3>Articles &amp; more</h3>
    <ul>
    <?php while (has_sub_field('articles')): ?>
        <li>
            <a href="<?php the_sub_field('url'); ?>" target="_blank"><?php the_sub_field('title'); ?></a> (<?php echo get_domain_from_url(get_sub_field('url')); ?>)<br />
            <?php the_sub_field('summary'); ?>
        </li>
    <?php endwhile; ?>
    </ul>

    <?php if (get_field('interview')):
        $interview = array_pop(get_field('interview')); ?>
        <hr />
        <h3>Interview: <?php echo get_the_title($interview); ?></h3>
        <a href="<?php echo get_permalink($interview); ?>" target="_blank">
            <?php echo get_the_post_thumbnail($interview, 'email'); ?>
        </a>
        <?php echo get_field('intro', $interview); ?>
        <a href="<?php echo get_permalink($interview); ?>" target="_blank">Read the full interview</a>
    <?php endif;

    if (get_field('sponsor')): ?>
        <hr />
        <h3>Thanks to our sponsor</h3>
            <a href="<?php the_field('sponsor_url'); ?>" target="_blank">
                <img src="<?php $logo = get_field('sponsor_logo'); echo $logo['sizes']['email']; ?>" />
            </a>
        <?php the_field('sponsor_text');
    endif; ?>

    <hr class="thick" />
    <h3>Contact &amp; Submissions</h3>
    <p>This newsletter is curated by <a href="http://twitter.com/ben_nuttall" target="_blank">@ben_nuttall</a> and <a href="http://twitter.com/ryanteck" target="_blank">@ryanteck</a>. Tweet links to <a href="http://twitter.com/pi_weekly" target="_blank">@pi_weekly</a> or email <a href="mailto:submissions@piweekly.net" target="_blank">submissions@piweekly.net</a></p>
    <hr class="thick" />

    <footer>
        <nav class="prev"><?php previous_post_link(); ?></nav>
        <nav class="next"><?php next_post_link(); ?></nav>
        <div style="clear:both;"></div>
    </footer>

</article>

<?php get_footer();
