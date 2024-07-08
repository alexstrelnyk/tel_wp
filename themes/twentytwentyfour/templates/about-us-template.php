<?php
/*
Template Name: about-us
*/
get_header();

echo get_post_field('post_content', get_queried_object_id());

get_template_part('parts/gallery-slider');

get_template_part('parts/counters');

get_template_part('parts/our-values');

get_template_part('parts/products-slider');

get_template_part('parts/planets');

get_template_part('parts/feedback-slider');

get_template_part('parts/regions-slider');

get_template_part('parts/form');

get_footer();
?>

<script>
    $(document).ready(function() {
        initSliderSlick('.slider_slick');
    });
</script>