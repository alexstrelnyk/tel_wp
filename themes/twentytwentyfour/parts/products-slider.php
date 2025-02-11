<?php
$header_text = get_label('ПРОДУКТИ І ПОСЛУГИ', 'PRODUCTS AND SERVICES');
?>
<section id=":r5:" class="width-wrapper">
    <div class="bg-grey-blue slider-container">
        <div class="slider-side-bar">
            <p class="Body color-white "><?php echo $header_text ?></p>
        </div>
        <div class="services-title">
            <p class="Body color-white "><?php echo $header_text ?></p>
        </div>
        <div class="services-slider">
            <div id="products_swiper">
                <?php

                $page_slugs = [
                    get_label('telecom-solutions', 'telecom-solutions-en'),
                    get_label('services', 'services-en'),
                ];
                foreach ($page_slugs as $page_slug) {
                    if (!$page = get_page_by_path($page_slug)) {
                        break;
                    }

                    $page_url = esc_url(get_permalink($page->ID));
                    $page_image = get_field('page_image', $page->ID);
                ?>

                    <div class="product-card">
                        <div class="product-desc">
                            <div class="product-image" onclick="goto('<?php echo $page_url ?>')">
                                <img loading="lazy" src="<?php echo $page_image['url'] ?>" alt="<?php echo $page->post_title ?>">
                            </div>
                        </div>
                        <div class="product-title">
                            <p class="H2 color-white "><a class="mob-link color-white mob_title" href="<?php echo $page_url ?>"><?php echo $page->post_title ?></a></p>
                        </div>
                    </div>

                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>