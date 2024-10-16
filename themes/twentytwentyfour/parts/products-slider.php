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
            <div class="swiper" id="products_swiper">
                <div class="swiper-wrapper">
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
                            <div class="swiper-slide">

                                <div class="product-card">
                                    <div class="product-desc">
                                        <div class="product-image" data-cursor="slider-img" onclick="goto('<?php echo get_url('products-services') ?>?cat_slug=<?php echo $category->slug ?>')">
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
                                        <p class="H2 color-white "><a class="mob-link color-white mob_title" href="<?php echo get_url('products-services') ?>?cat_slug=<?php echo $category->slug ?>"><?php echo $category->name ?></a></p>
                                    </div>
                                    <div class="mob-card-arrow">
                                        <a href="<?php echo get_url('products-services') ?>?cat_slug=<?php echo $category->slug ?>">
                                            <svg class="arrow-svg" width="66" height="66" viewBox="0 0 66 66" fill="white" xmlns="http://www.w3.org/2000/svg">
                                                <path class="point" d="M48.6681 33.67C49.2539 33.0842 49.2539 32.1345 48.6681 31.5487L39.1221 22.0028C38.5364 21.417 37.5866 21.417 37.0008 22.0028C36.415 22.5886 36.415 23.5383 37.0008 24.1241L45.4861 32.6094L37.0008 41.0947C36.415 41.6804 36.415 42.6302 37.0008 43.216C37.5866 43.8018 38.5364 43.8018 39.1221 43.216L48.6681 33.67ZM17.6074 34.1094H47.6074V31.1094H17.6074V34.1094Z" fill="none"></path>
                                                <path class="swipe" d="M53.7071 33.7071C54.0976 33.3166 54.0976 32.6834 53.7071 32.2929L47.3431 25.9289C46.9526 25.5384 46.3195 25.5384 45.9289 25.9289C45.5384 26.3195 45.5384 26.9526 45.9289 27.3431L51.5858 33L45.9289 38.6569C45.5384 39.0474 45.5384 39.6805 45.9289 40.0711C46.3195 40.4616 46.9526 40.4616 47.3431 40.0711L53.7071 33.7071ZM38 34L53 34L53 32L38 32L38 34Z" fill="none"></path>
                                                <path class="swipe" d="M12.2929 32.2929C11.9024 32.6834 11.9024 33.3166 12.2929 33.7071L18.6569 40.0711C19.0474 40.4616 19.6805 40.4616 20.0711 40.0711C20.4616 39.6805 20.4616 39.0474 20.0711 38.6569L14.4142 33L20.0711 27.3431C20.4616 26.9526 20.4616 26.3195 20.0711 25.9289C19.6805 25.5384 19.0474 25.5384 18.6569 25.9289L12.2929 32.2929ZM28 32L13 32L13 34L28 34L28 32Z" fill="none"></path>
                                                <path class="text" d="M4.414 1.103h1.103v29.793h-1.103v-29.793z   M0 0h4.414v1.103h-4.414v-1.103z   M5.517 0h4.414v1.103h-4.414v-1.103z   M0 30.897h4.414v1.103h-4.414v-1.103z   M5.517 30.897h4.414v1.103h-4.414v-1.103z" fill="none"></path>
                                                <path class="zoom" d="M37 21L40.0667 24.0667L36.2133 27.8933L38.1067   29.7867L41.9333 25.9333L45 29V21H37ZM21 29L24.0667   25.9333L27.8933 29.7867L29.7867 27.8933L25.9333   24.0667L29 21H21V29ZM29 45L25.9333 41.9333L29.7867   38.1067L27.8933 36.2133L24.0667 40.0667L21   37V45H29ZM45 37L41.9333 40.0667L38.1067   36.2133L36.2133 38.1067L40.0667 41.9333L37   45H45V37Z" fill="none"></path>
                                            </svg>
                                        </a>
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