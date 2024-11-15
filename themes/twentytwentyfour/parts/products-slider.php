<?php
$header_text = get_label('ПРОДУКТИ І ПОСЛУГИ', 'PRODUCTS AND SERVICES');
?>
<section id=":r5:" class="width-wrapper">
    <div class="bg-grey-blue slider-container">
        <div class="slider-side-bar bg-midnight-blue">
            <p class="Sub color-white  bold"><?php echo $header_text ?></p>
        </div>
        <div class="services-title">
            <p class="Body color-white "><?php echo $header_text ?></p>
        </div>
        <div class="services-slider">
            <div id="products_swiper">
                <?php
                global $category_order;

                $categories = get_terms([
                    'taxonomy' => 'category',
                    'slug' => $category_order,
                    'hide_empty' => false,
                ]);

                $sorted_categories = sort_categories_by_slugs($categories, $category_order);

                if (!empty($sorted_categories)) {
                    foreach ($sorted_categories as $category) {
                        $image = get_field('category_image', 'category_' . $category->term_id);
                ?>

                        <div class="product-card">
                            <div class="product-desc">
                                <div class="product-image" onclick="goto('<?php echo get_url('products-services') ?>?cat_slug=<?php echo $category->slug ?>')">
                                    <img loading="lazy" src="<?php echo $image['url'] ?>" alt="<?php echo $category->name ?>">
                                </div>
                                <a class="Body animated-link" style="white-space:nowrap;" data-cursor="active" href="<?php echo get_url('products-services') ?>?cat_slug=<?php echo $category->slug ?>">
                                    <span class="title" style="white-space:nowrap;">
                                    </span>
                                </a>
                            </div>
                            <div class="product-title">
                                <p class="H2 color-white "><a class="mob-link color-white mob_title" href="<?php echo get_url('products-services') ?>?cat_slug=<?php echo $category->slug ?>"><?php echo $category->name ?></a></p>
                            </div>
                        </div>

                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>