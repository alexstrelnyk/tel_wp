<?php
/*
Template Name: Products
*/

get_header();
?>

<section id=":r17:" class="width-wrapper">
    <div class="services-tree">
        <div class="flex-col sub_parent_0">
            <div id="cards-tree" class="shelf-content bg-midnight-blue">
                <p class="H3 color-white  italic">Продукти та Послуги</p>
            </div>
            <div class="slider-container bg-midnight-blue">
                <div class="slider-side-bar bg-midnight-blue">
                    <p class="Sub color-white ">НАШІ ПРОДУКТИ ТА ПОСЛУГИ</p>
                </div>
                <div class="services-slider" style="transform: translateX(0px);">

                    <?php

                    $categories = get_categories(['parent' => 0]);

                    if (!empty($categories)) {
                        foreach ($categories as $category) {
                            if (in_array($category->cat_name, [
                                'blog',
                                'news',
                                'client_feedback',
                            ])) {
                                continue;
                            }

                            $image = get_field('category_image', 'category_' . $category->cat_ID);
                    ?>
                            <div id="cat_id_<?php echo $category->cat_ID ?>" class="services-card light-blue" onclick="getProducts(this, 0)" data-cat_id="<?php echo $category->cat_ID ?>" data-cat_title="<?php echo $category->cat_name ?>">
                                <?php if ($image) { ?>
                                    <div class="image"><img loading="lazy" src="<?php echo $image['url'] ?>" alt="<?php echo $image['name'] ?>"></div>
                                <?php } ?>
                                <div class="desc">
                                    <p class="H5 color-white  bold"><?php echo $category->name ?></p>
                                    <p class="H6 color-white medium"></p>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>

<section id=":r18:" class="width-wrapper">
    <div class="banner bg-white">
        <div class="banner-container" style="animation-duration: 30s;">
            <div class="ticker frc">
                <p class="H1 color-black  italic">Ready to start your project?</p>
                <div class="bg-dark-blend-a separator flex-col"><span>Professionalism.</span><span>People.</span><span>Persistance.</span><span>Perception.</span></div>
            </div>
            <div class="ticker frc reverse">
                <p class="H1 color-black  italic">Ready to start your project?</p>
                <div class="bg-dark-blend-a separator flex-col"><span>Professionalism.</span><span>People.</span><span>Persistance.</span><span>Perception.</span></div>
            </div>
        </div>
    </div>
</section>

<section id=":r1a:" class="width-wrapper">
    <div class="quotes bg-soft-blue swiper mySwiper">
        <div class="quotes-slider swiper-wrapper" data-cursor="slider">
            <?php
            $category = get_category_by_slug('client_feedback');

            if ($category) {
                $args = array(
                    'category__in' => array($category->term_id),
                    'posts_per_page' => -1,
                );
                $posts_query = new WP_Query($args);

                if ($posts_query->have_posts()) {
                    while ($posts_query->have_posts()) {
                        $posts_query->the_post();

            ?>
                        <div class="swiper-slide"><?php the_content() ?></div>
            <?php
                    }
                    wp_reset_postdata();
                }
            }
            ?>
        </div>
    </div>
</section>

<?php

if (isset($_GET['cat_id']) && $_GET['cat_id']) {
?>
    <script>
        $(document).ready(function() {
            $('#cat_id_<?php echo $_GET['cat_id'] ?>').click();
        });
    </script>
<?php
}
get_footer();
