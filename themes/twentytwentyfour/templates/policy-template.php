<?php
/*
Template Name: policy
*/
get_header();

echo get_post_field('post_content', get_queried_object_id());

get_footer();
