<?php

include 'template-header.php';

include 'intro.php';
include 'border-thick.php';

include 'picture.php';
include 'border-thin.php';

$section_title = "News";
$section = "news";
include 'links-section.php';
include 'border-thin.php';

$section_title = "Projects";
$section = "projects";
include 'links-section.php';
include 'border-thin.php';

$section_title = "Articles & more";
$section = "articles";
include 'links-section.php';

if (get_field('sponsor')) {
    include 'border-thin.php';
    include 'sponsor.php';
}

include 'border-thick.php';
include 'contact-section.php';

include 'template-footer.php';
