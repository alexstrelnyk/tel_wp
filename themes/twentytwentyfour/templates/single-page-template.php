<?php
/*
Template Name: single-page
*/
get_header();

?>
<div class="services-tree bg-white">
    <div class="flex-col sub_parent_0">
        <div class="prod_container">
            <?php
            echo get_post_field('post_content', get_queried_object_id());
            ?>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>
<?php
get_footer();
