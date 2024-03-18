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
                <p class="H3 color-white  italic"><?php echo get_label('Продукти та Послуги', 'Products & Services') ?></p>
            </div>
            <div class="slider-container bg-midnight-blue">
                <div class="slider-side-bar bg-midnight-blue">
                    <p class="Sub color-white "><?php echo get_label('НАШІ ПРОДУКТИ ТА ПОСЛУГИ', 'OUR PRODUCTS AND SERVICES') ?></p>
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
                                'career',
                            ])) {
                                continue;
                            }

                            $image = get_field('category_image', 'category_' . $category->cat_ID);
                    ?>
                            <div id="cat_slug_<?php echo $category->slug ?>" class="services-card light-blue" onclick="getProducts(this, 0)" data-cat_id="<?php echo $category->cat_ID ?>" data-cat_title="<?php echo $category->cat_name ?>" data-cat_slug="<?php echo $category->slug ?>">
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
<section data=":rj:" id="contact-us" class="width-wrapper">
    <div class="contact-us bg-white">
        <div class="contact-form-root">
            <div class="text-input" data-cursor="input-text">
                <p class="Sub2 color-black "><?php echo get_label('Ім\'я', 'First name') ?>*</p><input type="text" class="input" name="firstName" enterkeyhint="next" value="">
            </div>
            <div class="text-input" data-cursor="input-text">
                <p class="Sub2 color-black "><?php echo get_label('Прізвище', 'Last name') ?></p><input type="text" class="input" name="lastName" enterkeyhint="next" value="">
            </div>
            <div class="text-input" data-cursor="input-text">
                <p class="Sub2 color-black "><?php echo get_label('Номер телефону', 'Phone number') ?>*</p><input type="text" class="input" name="phone" enterkeyhint="next" value="">
            </div>
            <div class="text-input" data-cursor="input-text">
                <p class="Sub2 color-black ">E-mail*</p><input type="text" class="input" name="email" enterkeyhint="next" value="">
            </div>
            <div class="text-input" data-cursor="input-text">
                <p class="Sub2 color-black "><?php echo get_label('Повідомлення', 'Message') ?></p><textarea maxlength="2000" class="input multi" name="content" enterkeyhint="enter" style="height: 118px;"></textarea>
                <p class="Body color-just-grey letters-counter">0/2000</p>
            </div>
            <div class="checkbox-root" data-cursor="active"><label class="checkbox path"><input type="checkbox" value="false"><svg viewBox="0 0 21 21">
                        <path d="M5,10.75 L8.5,14.25 L19.4,2.3 C18.8333333,1.43333333 18.0333333,1 17,1 L4,1 C2.35,1 1,2.35 1,4 L1,17 C1,18.65 2.35,20 4,20 L17,20 C18.65,20 20,18.65 20,17 L20,7.99769186"></path>
                    </svg></label><a href="privacy-policy" target="_blank" rel="noopener noreferrer">
                    <p class="Body color-just-grey regular Link"><?php echo get_label('Я погоджуюся з Політикою конфіденційності', 'I agree with the Privacy Policy') ?></p>
                </a></div>
            <div class="submission frc">
                <div class="btn-box undefined">
                    <div class="btn-joint" style="transition: all 0.75s ease-out 0s;">
                        <div class="svg-btn send-btn"></div>
                    </div>
                </div>
                <div class="clutch pulse" to="https://clutch.co/profile/telesens#reviews"><a href="https://clutch.co/profile/telesens#reviews" target="_blank" rel="noopener noreferrer">
                        <div class="svg-btn clutch-btn"></div>
                    </a></div>
            </div>
        </div>
    </div>
</section>

<section id=":r1a:" class="width-wrapper">
    <div class="quotes bg-soft-blue swiper mySwiper">
        <div class="quotes-slider swiper-wrapper" data-cursor="slider">
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
                        <div class="quote-container swiper-slide"><?php the_content() ?></div>
            <?php
                    }
                    wp_reset_postdata();
                }
            }
            ?>
        </div>
    </div>
</section>
<script>
    var parentCatSlugs = false;
    var postId = false;
</script>


<?php

$parent_cat_slugs = [];
function get_parent_cat($cat_id, $parent_cat_slugs)
{
    $cat_slug = false;
    if ($category = get_term($cat_id, 'category')) {
        $cat_slug = $category->slug;
    }
    $parent_cat_slugs[] = $cat_slug;

    if ($category && $category->parent != 0) {
        $parent_cat_slugs = get_parent_cat($category->parent, $parent_cat_slugs);
    }

    return $parent_cat_slugs;
}

if (isset($_GET['post_slug']) && $_GET['post_slug']) {
    $post_slug = $_GET['post_slug'];

    if ($post = get_page_by_path($post_slug, OBJECT, 'post')) {

        if ($categories = get_the_category($post->ID)) {
            $parent_cat_slugs[] = $categories[0]->slug;
            $parent_cat_slugs = array_reverse(get_parent_cat($categories[0]->parent, $parent_cat_slugs));
?>
            <script>
                var parentCatSlugs = JSON.parse('<?php echo json_encode($parent_cat_slugs) ?>');
            </script>
    <?php
        }
    }
}
if (isset($_GET['cat_slug']) && $_GET['cat_slug']) {
    ?>
    <script>
        $(document).ready(function() {
            $('#cat_slug_<?php echo $_GET['cat_slug'] ?>').click();
        });
    </script>
<?php
}
get_footer();
