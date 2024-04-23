<?php
/*
Template Name: charity
*/
get_header();

?>

<section data=":r1s:" id="blog-section" class="blog-view frc bg-soft-blue">
    <div class="container">
        <div class="blog-side-bar">
            <div class="charity-tabs">
                <p class="Sub color-black  mv12"><?php echo get_label('Закладки', 'Bookmarks')?></p>

                <?php
                $args = array(
                    'post_type'      => 'post',
                    'category_name'  => get_label('charity', 'charity-en'),
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                    'posts_per_page' => -1,
                );

                $posts = get_posts($args);

                foreach ($posts as $post) {
                    setup_postdata($post);
                ?>
                    <a class="flex-row align-center gap8 mb12 one-tab" href="#<?php the_title(); ?>" data-cursor="active">
                        <svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.33203 0H1.66536C0.932031 0 0.338698 0.6 0.338698 1.33333L0.332031 12L4.9987 10L9.66537 12V1.33333C9.66537 0.6 9.06536 0 8.33203 0Z" fill="#004D35"></path>
                        </svg>
                        <p class="Body color-grey "><?php the_title(); ?></p>
                    </a>
                <?php
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
        <div class="flex-col blog-content">
            <?php
            echo get_post_field('post_content', get_queried_object_id());

            $args = array(
                'post_type'      => 'post',
                'category_name'  => get_label('charity', 'charity-en'),
                'orderby'        => 'date',
                'order'          => 'DESC',
                'posts_per_page' => -1,
            );

            $posts = get_posts($args);

            foreach ($posts as $post) {
                setup_postdata($post);
            ?>

                <div class="module-container type-head">
                    <p class="Sub color- anchor-name" id="<?php the_title(); ?>"><?php the_title(); ?></p>
                </div>
                <div class="module-container type-image">
                    <img loading="lazy" src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo basename(get_the_post_thumbnail_url()) ?>">
                </div>
                <div class="module-container type-paragraph">
                    <?php the_content() ?>
                </div>
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
