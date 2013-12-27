<?php

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

<form action="<?php bloginfo('url'); ?>/wp-admin/post.php" style="float:left;">
    <input type="hidden" name="post" value="<?php the_ID(); ?>" />
    <input type="hidden" name="action" value="edit" />
    <input type="submit" value="Edit this Issue" />
</form>

<form action="<?php the_permalink(); ?>" target="_new" style="float:left;">
    <input type="submit" value="View this Issue" />
</form>

<form action="http://mailchimp.com/" target="_new" style="float:left;">
    <input type="submit" value="Go to Mailchimp" />
</form>
