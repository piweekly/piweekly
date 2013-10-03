<?php

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

$selected_issue = $_POST['issue'];
$query = $selected_issue ? "p={$selected_issue}" : "posts_per_page=1";

?>

<form method="post">
<br />
<select name="issue">
<?php

$issues = new WP_Query('posts_per_page=1000');
while ($issues->have_posts()):
    $issues->the_post();
    $selected = $selected_issue == get_the_ID() ? ' selected' : '';
    echo "<option value='" . get_the_ID() . "'{$selected}>#" . get_field('issue_number') . " - " . get_the_title() . "</option>";
endwhile;

?>
</select><input type="submit" value="Go" style="width:60px;" /><br /><br />
<textarea rows="20" cols="100">
<?php

$issue = new WP_Query($query);
$issue->the_post();
include 'email-template.php';

?>
</textarea/><br />
</form>
