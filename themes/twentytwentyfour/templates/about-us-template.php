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
?>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
</script>
<?php
get_footer();
