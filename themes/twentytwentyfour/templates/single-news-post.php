<?php

/**
 * Template Name: Single News post
 * Template Post Type: post
 */

get_header();

?>
<section data=":r3:" id="blog-section" class="blog-view frc bg-soft-blue">
    <div class="container">
        <div class="blog-side-bar">
            <?php if (has_post_thumbnail()) { ?>
                <img loading="lazy" src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo basename(get_the_post_thumbnail_url()) ?>" class="mb12">
            <?php } ?>
        </div>
        <div class="flex-col blog-content">
            <?php echo get_post_field('post_content', get_queried_object_id()); ?>
            <div class="block-spacer" style="height: 0px;"></div>
        </div>
    </div>
</section>

<?php

get_footer();
