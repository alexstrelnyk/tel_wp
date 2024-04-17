<script>
    var postId = '<?php echo $post->post_name ?>';
</script>
<div class="sub_parent sub_parent_<?php echo $level ?>" data-post_id="<?php echo $post->ID ?>">
    <section data=":r7:" id="blog-section" class="blog-view frc bg-soft-blue">
        <div class="container">
            <?php
            if (strstr($content, 'class="container"') !== false) {
                echo $content;
            } else {
            ?>
                <div class="blog-side-bar"></div>
                <div class="flex-col blog-content">
                    <?php echo $content ?>
                </div>
            <?php
            }
            ?>
        </div>
    </section>
</div>