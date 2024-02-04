<?php
/*
Template Name: Homepage
*/
get_header();

?>

<?php

echo get_post_field('post_content', get_queried_object_id());

get_footer();
