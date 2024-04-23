<?php
/*
Template Name: Helping
*/
get_header();

?>
<section data=":r3:" id="blog-section" class="blog-view frc bg-soft-blue">
    <div class="container">
        <div class="blog-side-bar">
            <p class="Sub2 color-black  mb12"><?php echo get_label('Команда Телесенс', 'Telesens Team') ?></p>
            <p class="Body2 color-light-grey  mb12"><?php echo get_label('15 серп 2023', '15 sept 2023') ?></p>
        </div>
        <div class="flex-col blog-content">
            <p class="H3 color-black  italic mb32"><?php echo get_label('Допомога військовим', 'Helping Defenders') ?></p>

            <?php

            $args = array(
                'post_type'      => 'post',
                'category_name'  => get_label('helping', 'helping-en'),
                'orderby'        => 'date',
                'order'          => 'DESC',
                'posts_per_page' => -1,
            );

            $posts = get_posts($args);

            foreach ($posts as $post) {
                setup_postdata($post);
            ?>
                <div class="module-container type-paragraph">
                    <p class="Body color-  text-left">
                        <span class="inh  italic">
                            <span class="inh  H5">
                                <span class="inh  color-navy-green"><?php the_title(); ?></span>
                            </span>
                        </span>
                    </p>
                </div>
                <?php the_content(); ?>
                <?php if (get_the_post_thumbnail_url()) { ?>
                    <div class="module-container type-image"><img loading="lazy" src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php echo basename(get_the_post_thumbnail_url()) ?>"></div>
                <?php } ?>
            <?php
            }
            wp_reset_postdata();
            ?>
            <div class="block-spacer" style="height: 0px;"></div>
        </div>
    </div>
</section>

<?php


get_footer();
