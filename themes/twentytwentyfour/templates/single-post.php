<?php

/**
 * Template Name: Single post
 * Template Post Type: post
 */

get_header();

?>
<section data=":r3:" id="blog-section" class="blog-view frc bg-soft-blue">
    <div class="container">
        <div class="blog-side-bar">
            <p class="Sub2 color-black  mb12">
                <?php echo get_field('description'); ?>
            </p>
            <p class="Body2 color-light-grey  mb12">
                <?php
                $post_date = get_the_date('j M Y');
                $post_date = str_replace(
                    array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'),
                    array('січ', 'лют', 'берез', 'квіт', 'трав', 'черв', 'лип', 'серп', 'вер', 'жовт', 'лист', 'груд'),
                    $post_date
                );

                echo $post_date;
                ?>
            </p>
        </div>
        <div class="flex-col blog-content">
            <?php echo get_post_field('post_content', get_queried_object_id());?>
            <div class="block-spacer" style="height: 0px;"></div>
        </div>
    </div>
</section>

<?php

get_footer();
