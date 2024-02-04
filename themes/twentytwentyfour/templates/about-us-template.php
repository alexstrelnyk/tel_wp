<?php
/*
Template Name: about-us
*/
get_header();

?>



<?php
echo get_post_field('post_content', get_queried_object_id());

get_footer();
