<?php

get_header();

the_post();

?>

<h1><?php the_title(); ?></h1>

<?php

get_template_part('archive', 'loop');

get_footer();
