<?php
/*
Template Name: single-page
*/
get_header();

?>
<div class="services-tree bg-white" style="margin-bottom: 60px;">
    <div class="flex-col sub_parent_0">
        <div class="prod_container">
            <?php
            echo get_post_field('post_content', get_queried_object_id());
            ?>
        </div>
    </div>
</div>
<?php
get_footer();