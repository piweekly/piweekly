<?php
/*
Plugin Name: Pi Weekly Newsletter Generator
Plugin URI: https://github.com/bennuttall/piweekly-newsletter-generator
Description: Generate HTML snippets for a mailchimp newsletter
Version: 1.5
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

function get_domain_from_url($url) {
    $parsed_url = parse_url($url);
    $domain = str_replace('www.', '', $parsed_url['host']);
    return $domain;
}

function get_date($date) {
    $datetime = new DateTime($date);
    return $datetime->format('l j F Y');
}

function strip_paragraphs($content) {
    return str_replace('<p>', '', str_replace('</p>', '', $content));
}
