<?php

function get_domain_from_url($url) {
    $parsed_url = parse_url($url);
    return $parsed_url['host'];
}

function get_date($date) {
    $datetime = DateTime::createFromFormat('Ymd', $date);
    return $datetime->format('l j F Y');
}

$args = array(
    'posts_per_page' => 1,
);

$issue = new WP_Query($args);

$issue->the_post();

?>

<form>
<textarea rows="20" cols="100">
<?php include 'email-template.php'; ?>
</textarea/><br />

<?php

while (has_sub_field('news_items')) {
    $title = get_sub_field('title');
    $url = get_sub_field('url');
    $summary = get_sub_field('summary');
}

?>

</form>
