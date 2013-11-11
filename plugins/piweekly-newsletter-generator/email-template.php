<?php

include 'template-header.php';

include 'intro.php';
include 'border-thick.php';

if (has_post_thumbnail()) {
    include 'picture.php';
    include 'border-thin.php';
}

if (get_field('news')) {
    $section_title = "News";
    $section = "news";
    include 'links-section.php';
    include 'border-thin.php';
}

if (get_field('projects')) {
    $section_title = "Projects";
    $section = "projects";
    include 'links-section.php';
    include 'border-thin.php';
}

if (get_field('articles')) {
    $section_title = "Articles & more";
    $section = "articles";
    include 'links-section.php';
}

$interview = get_field('interview');

if (is_array($interview)) {
    $interview = array_pop($interview);
    if ($interview) {
        include 'border-thin.php';
        include 'interview.php';
    }
}

if (get_field('events')) {
    include 'border-thin.php';
    include 'events.php';
}

if (get_field('sponsor')) {
    include 'border-thin.php';
    include 'sponsor.php';
}

include 'border-thick.php';
include 'contact-section.php';

include 'template-footer.php';
