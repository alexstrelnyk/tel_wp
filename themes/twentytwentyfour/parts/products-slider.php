<section id=":r5:" class="width-wrapper">
    <div class="bg-grey-blue slider-container">
        <div class="slider-side-bar bg-midnight-blue">
            <p class="Sub color-white  bold"><?php echo get_label('ПРОДУКТИ І ПОСЛУГИ', 'PRODUCTS AND SERVICES') ?></p>
        </div>
        <div class="services-slider">
            <div class="swiper" id="products_swiper">
                <div class="swiper-wrapper">
                    <?php

                    $categories = get_categories(['parent' => 0]);
                    $product_page = get_page_by_path('products-services');

                    if (!empty($categories)) {
                        foreach ($categories as $category) {
                            if (in_array($category->slug, [
                                'blog',
                                'blog-en',
                                'news',
                                'news-en',
                                'client_feedback',
                                'client_feedback-en',
                                'career',
                                'career-en',
                                'uncategorized-uk',
                                'uncategorized-en',
                            ]) || $category->cat_ID == 1) {
                                continue;
                            }

                            $image = get_field('category_image', 'category_' . $category->cat_ID);
                    ?>
                            <div class="swiper-slide">

                                <div class="product-card">
                                    <div class="product-desc">
                                        <div class="product-image" style="transform: rotate(0.584795deg);" data-cursor="slider-img" onclick="goto('<?php echo get_permalink($product_page->ID) ?>?cat_slug=<?php echo $category->slug ?>')">
                                            <img loading="lazy" src="<?php echo $image['url'] ?>" alt="<?php echo $category->name ?>">
                                        </div>
                                        <a class="Body animated-link" data-cursor="active" href="<?php echo get_permalink($product_page->ID) ?>?cat_id=<?php echo $category->cat_ID ?>">
                                            <span class="title">
                                                <span data-text="<?php echo get_label('Читати більше', 'Show more') ?>" class="color-after-bright-green color-before-white">
                                                    <?php echo get_label('Читати більше', 'Show more') ?>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="pager" data-cursor="slider-white"></div>
                                    <div class="product-title" data-cursor="slider-white">
                                        <p class="H2 color-white "><?php echo $category->name ?></p>
                                    </div>
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