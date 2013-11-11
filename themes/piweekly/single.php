<?php

get_header();

the_post();

?>

<article class="issue">
    <header>
        <h1>Issue #<?php the_field('issue_number'); ?> &mdash; <?php the_title(); ?></h1>
        <div class="date"><?php the_date('l j F Y'); ?></div>
    </header>

    <?php the_content(); ?>
    <hr class="thick" />

    <?php if (has_post_thumbnail()): ?>
        <h2>Picture of the week</h2>
        <a href="<?php the_field('picture_link'); ?>" target="_blank">
            <?php the_post_thumbnail('email'); ?>
        </a>

        <?php the_field('picture_description'); ?>
        <hr />
    <?php endif;

    if (get_field('news')): ?>
        <h2>News</h2>
        <ul>
        <?php while (has_sub_field('news')): ?>
            <li>
                <a href="<?php the_sub_field('url'); ?>" target="_blank"><?php the_sub_field('title'); ?></a> (<?php echo get_domain_from_url(get_sub_field('url')); ?>)<br />
                <?php the_sub_field('summary'); ?>
            </li>
        <?php endwhile; ?>
        </ul>
        <hr />
    <?php endif;

    if (get_field('projects')): ?>
        <h2>Projects</h2>
        <ul>
        <?php while (has_sub_field('projects')): ?>
            <li>
                <a href="<?php the_sub_field('url'); ?>" target="_blank"><?php the_sub_field('title'); ?></a> (<?php echo get_domain_from_url(get_sub_field('url')); ?>)<br />
                <?php the_sub_field('summary'); ?>
            </li>
        <?php endwhile; ?>
        </ul>
        <hr />
    <?php endif;

    if (get_field('articles')): ?>
        <h2>Articles &amp; more</h2>
        <ul>
        <?php while (has_sub_field('articles')): ?>
            <li>
                <a href="<?php the_sub_field('url'); ?>" target="_blank"><?php the_sub_field('title'); ?></a> (<?php echo get_domain_from_url(get_sub_field('url')); ?>)<br />
                <?php the_sub_field('summary'); ?>
            </li>
        <?php endwhile; ?>
        </ul>
    <?php endif;

    $interview = get_field('interview');

    if (is_array($interview)):
        $interview = array_pop($interview);
        if ($interview): ?>
            <hr />
            <h2>Interview: <?php echo get_the_title($interview); ?></h2>
            <a href="<?php echo get_permalink($interview); ?>" target="_blank">
                <?php echo get_the_post_thumbnail($interview, 'email'); ?>
            </a>
            <?php echo get_field('intro', $interview); ?>
            <a href="<?php echo get_permalink($interview); ?>" target="_blank">Read the full interview</a>
    <?php endif;
    endif;

    if (get_field('events')): ?>
        <hr />
        <h2>Upcoming Events</h2>
        <ul>
        <?php while (has_sub_field('events')): ?>
            <li>
                <a href="<?php the_sub_field('url'); ?>" target="_blank"><?php the_sub_field('title'); ?></a> (<?php echo pw_event_date(get_sub_field('start_date'), get_sub_field('end_date')); ?>)
            </li>
        <?php endwhile; ?>
        </ul>
    <?php endif;

    if (get_field('sponsor')): ?>
        <hr />
        <h2>Thanks to our sponsor</h2>
        <a href="<?php the_field('sponsor_url'); ?>" target="_blank">
            <img src="<?php $logo = get_field('sponsor_logo'); echo $logo['sizes']['email']; ?>" />
        </a>
        <?php the_field('sponsor_text');
    endif; ?>

    <hr />
    <h2>Contact &amp; Submissions</h2>
    <p>This newsletter is curated by <a href="http://twitter.com/ben_nuttall" target="_blank">@ben_nuttall</a> and <a href="http://twitter.com/ryanteck" target="_blank">@ryanteck</a>. Tweet links to <a href="http://twitter.com/pi_weekly" target="_blank">@pi_weekly</a> or email <a href="mailto:submissions@piweekly.net" target="_blank">submissions@piweekly.net</a></p>
    <span class="support">
        <a href="/sponsorship/">Sponsor Pi Weekly</a> or <a href="https://www.gittip.com/piweekly" target="_blank">support us on gittip</a>
    </span>
    <a href="https://www.gittip.com/piweekly" target="_blank" class="gittip-support">&gt;3</a>
    <div style="clear: both;"></div>

    <hr class="thick" />
    <div class="signup">
        <p>Like the look of this newsletter? Sign up to Pi Weekly now:</p>
        <form action="http://bennuttall.us7.list-manage2.com/subscribe/post?u=a3e42d3ea4355ad45198b39ba&amp;id=2141506785" method="post" name="mc-embedded-subscribe-form">
            <label for="mce-EMAIL">Email address:</label>
            <input id="mce-EMAIL" type="email" name="EMAIL" />
            <input type="submit" name="subscribe" value="Subscribe" />
        </form>
    </div>
    <hr class="thick" />

    <footer>
        <nav class="prev"><?php previous_post_link(); ?></nav>
        <nav class="next"><?php next_post_link(); ?></nav>
        <div style="clear:both;"></div>
    </footer>

</article>

<?php get_footer();
