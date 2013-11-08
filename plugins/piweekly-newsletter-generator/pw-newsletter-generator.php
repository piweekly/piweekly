<?php
/*
Plugin Name: Pi Weekly Newsletter Generator
Plugin URI: https://github.com/bennuttall/piweekly
Description: Generate HTML snippets for a mailchimp newsletter
Version: 1.6.2
Author: Ben Nuttall
Author URI: http://bennuttall.com/
*/

add_action('admin_menu', 'pw_admin_menu_setup');

// Add to left admin menu
function pw_admin_menu_setup() {
	add_menu_page('Newsletter Generator', 'Newsletter Generator', 'add_users', 'pw-newsletter', 'pw_generate_newsletter');
}

function pw_generate_newsletter() {
    include 'newsletter-generator.php';
}

// Functions used in template

function get_domain_from_url($url) {
    $parsed_url = parse_url($url);
    $domain = str_replace('www.', '', $parsed_url['host']);
    return $domain;
}

function strip_paragraphs($content) {
    return str_replace('<p>', '', str_replace('</p>', '', $content));
}

function pw_event_date($start, $end) {
    $start_date = new DateTime($start);
    $end_date = new DateTime($end);

    if (!$end) {
        return $start_date->format('j F');
    }
    else {
        if ($start_date->format('M') == $end_date->format('M')) {
            return "{$start_date->format('j')} - {$end_date->format('j F')}";
        }
        else {
            return "{$start_date->format('j F')} - {$end_date->format('j F')}";
        }
    }
}
