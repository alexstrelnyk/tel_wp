<?php
/*
Template Name: Homepage
*/
get_header();

?>

<?php

echo get_post_field('post_content', get_queried_object_id());
?>



<div id="slider_cont" style="display: none">
    <div class="services-slider" style="transform: translateX(0px);">
        <?php

        $categories = get_categories(['parent' => 0]);
        $product_page = get_page_by_path('products-services');

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
                <div class="product-card">
                    <div class="product-desc">
                        <div class="product-image" style="transform: rotate(0.584795deg);" data-cursor="slider-img" onclick="goto('<?php echo get_permalink($product_page->ID) ?>?cat_id=<?php echo $category->cat_ID ?>')"><img loading="lazy" src="<?php echo $image['url'] ?>" alt="<?php echo $category->name ?>"></div><a class="Body animated-link" data-cursor="active" href="<?php echo get_permalink($product_page->ID) ?>?cat_id=<?php echo $category->cat_ID ?>"><span class="title"><span data-text="Читати більше" class="color-after-bright-green color-before-white">Читати більше</span></span></a>
                    </div>
                    <div class="pager" data-cursor="slider-white"></div>
                    <div class="product-title">
                        <p class="H2 color-white "><?php echo $category->name ?></p>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>
<div id="feedback_container" style="display: none;">
    <div class="quotes-slider" style="transform: translateX(0px);" data-cursor="slider">
        <?php
        $category = get_category_by_slug(pll_current_language() == 'uk' ? 'client_feedback' : 'client_feedback-en');

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
                    <div class="quote-container"><?php the_content() ?></div>
        <?php
                }
                wp_reset_postdata();
            }
        }
        ?>
    </div>
</div>
<script>
    $('#slider_container_set').after($('#slider_cont').html()).remove();
    $('#feedback_container_set').after($('#feedback_container').html()).remove();
</script>
<?php

get_footer();
