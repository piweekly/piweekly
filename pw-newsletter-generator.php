<?php
/*
Plugin Name: Pi Weekly Newsletter Generator
Plugin URI: https://github.com/bennuttall/piweekly-newsletter-generator
Description: Generate HTML snippets for a mailchimp newsletter
Version: 1.3
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
