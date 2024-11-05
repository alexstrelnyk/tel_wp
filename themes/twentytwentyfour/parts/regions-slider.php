<section id=":r3:" class="width-wrapper">
    <div class="bg-grey-blue slider-container">
        <div class="slider-side-bar bg-midnight-blue">
            <p class="Sub color-white  bold"><?php echo get_label('Глобальна присутність', 'Worldwide presence') ?></p>
        </div>
        <div class="wide-gallery-root">
            <p class="H2 color-white gallery-heading italic"><?php echo get_label('Досліджуйте наші регіони', 'Explore our regions') ?></p>
            <div class="wide-gallery-slider">
                <div class="swiper" id="regions_swiper">
                    <div class="swiper-wrapper slider-mob" data-cursor="slider-white">
                        <?php
                        $category = get_category_by_slug(get_label('regions', 'regions-en'));

                        if ($category) {
                            $args = array(
                                'category__in' => array($category->term_id),
                                'posts_per_page' => -1,
                            );
                            $posts_query = new WP_Query($args);

                            if ($posts_query->have_posts()) {
                                while ($posts_query->have_posts()) {
                                    $posts_query->the_post();
                                    $post = $posts_query->post;
                        ?>
                                    <div class="swiper-slide">
                                        <div class="wide-gallery-card">
                                            <?php if (has_post_thumbnail()) { ?>
                                                <img loading="lazy" src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php echo $post->post_title ?>" class="wide-gallery-image cover">
                                            <?php } ?>
                                            <p class="Sub2 color-white  mb12"><?php echo $post->post_title ?></p>
                                            <p class="Body color-white ">
                                                <?php echo $post->post_content ?>
                                            </p>
                                        </div>
                                    </div>
                        <?php
                                }
                                wp_reset_postdata();
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
</section>