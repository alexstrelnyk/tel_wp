<?php

/**
 * Template Name: Clean post
 * Template Post Type: post
 */

get_header();

?>
<section data=":r3:" id="blog-section" class="blog-view frc bg-soft-blue">
    <div class="container" style="white-space: pre-line">
        <?php echo get_post_field('post_content', get_queried_object_id()); ?>
    </div>
</section>

<?php

get_footer();
