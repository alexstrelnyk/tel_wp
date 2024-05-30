<section id=":r5:" class="width-wrapper">
    <div class="bg-grey-blue slider-container">
        <div class="slider-side-bar bg-midnight-blue">
            <p class="Sub color-white  bold"><?php echo get_label('ПРОДУКТИ І ПОСЛУГИ', 'PRODUCTS AND SERVICES') ?></p>
        </div>
        <div class="services-slider">
            <div class="swiper" id="products_swiper">
                <div class="swiper-wrapper">
                    <?php
                    $slugs = [
                        get_label('pm-ba-departament', 'pm-ba-office'),
                        get_label('telecom-solution', 'telecom-solutions-en'),
                        get_label('services', 'services-en'),
                        get_label('qa-services', 'qa-services-en'),
                    ];

                    $categories = get_terms([
                        'taxonomy' => 'category',
                        'slug' => $slugs,
                        'hide_empty' => false,
                    ]);

                    function sort_categories_by_slugs($categories, $slugs) {
                        $sorted_categories = [];
                        foreach ($slugs as $slug) {
                            foreach ($categories as $category) {
                                if ($category->slug === $slug) {
                                    $sorted_categories[] = $category;
                                    break;
                                }
                            }
                        }
                        return $sorted_categories;
                    }
                    
                    $sorted_categories = sort_categories_by_slugs($categories, $slugs);

                    if (!empty($sorted_categories)) {
                        foreach ($sorted_categories as $category) {
                            $image = get_field('category_image', 'category_' . $category->term_id);
                    ?>
                            <div class="swiper-slide">

                                <div class="product-card">
                                    <div class="product-desc">
                                        <div class="product-image" style="transform: rotate(0.584795deg);" data-cursor="slider-img" onclick="goto('<?php echo get_url('products-services') ?>?cat_slug=<?php echo $category->slug ?>')">
                                            <img loading="lazy" src="<?php echo $image['url'] ?>" alt="<?php echo $category->name ?>">
                                        </div>
                                        <a class="Body animated-link" style="white-space:nowrap;" data-cursor="active" href="<?php echo get_url('products-services') ?>?cat_slug=<?php echo $category->slug ?>">
                                            <span class="title" style="white-space:nowrap;">
                                                <span style="white-space:nowrap;" data-text="<?php echo get_label('Читати більше', 'Show more') ?>" class="color-after-bright-green color-before-white">
                                                    <?php echo get_label('Читати більше', 'Show more') ?>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="pager" data-cursor="slider-white"></div>
                                    <div class="product-title" style="width:60%; text-wrap:wrap;" data-cursor="slider-white">
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