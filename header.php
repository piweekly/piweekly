<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width" />
    <title><?php pw_title(); ?></title>
    <link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/images/piweekly-64x64.png" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->
    <link href="<?php timestamped_stylesheet(); ?>" rel="stylesheet" />
    <link href="<?php timestamped_stylesheet('mobile.css'); ?>" rel="stylesheet" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="container">
<header id="header">
    <h1><a href="/"><?php pw_header(); ?></a></h1>
    &mdash; <?php bloginfo('description'); ?> &mdash;
</header>
<?php get_template_part('nav'); ?>
<div id="main">
