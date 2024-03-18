<?php
/*
Template Name: carrer
*/
get_header();
?>
<section id=":r14:" class="width-wrapper">
    <div class="blog-preview frc bg-white">
        <div class="container">
            <div class="side f3 flex column">
                <p class="Sub2 color-navy-green "><?php echo get_label('Перевірте кар\'єрні можливості', 'Check career opportunities') ?></p>
            </div>
            <div class="side f7 flex column">
                <p class="H3 color-navy-green spacer italic"><?php echo get_label('Приєднуйся до команди Телесенс!', 'Join the Telesens team!') ?></p>
                <p class="Body color-navy-green "></p>
                <p class="Body color-navy-green "><?php echo get_label('Телесенс — це різноманітна команда з ідеальним поєднанням зрілих спеціалістів із серйозним досвідом та молодих професіоналів, які захоплені справою. Нас формує досвід і живлять таланти. Таланти, які прагнуть вчитися, розвиватися та знаходити сміливі рішення. Не зволікайте, вибирайте свою можливість і подавайте заявку!', 'Telesens is a diverse team with the perfect mix of mature specialists with solid experience and passionate young professionals. We are shaped by experience and powered by talents. Talents who are hungry to learn, develop and find bold solutions. Don’t hesitate to choose your opportunity and apply!') ?></p>
            </div>
            <div class="f2"></div>
        </div>
    </div>
</section>


<section id=":rh:" class="width-wrapper">
    <div class="vacancies-root bg-white">
        <div class="container">
            <div class="vacancies-bar">
                <div class="bar-filter">
                    <p class="Sub color-black  mb12"><?php echo get_label('Департаменти', 'Department') ?></p>
                    <div class="flex-row">
                        <p class="Body color-black  mb12"><?php echo get_label('Продукт', 'Product') ?> (1)</p>
                    </div>
                </div>
                <div class="bar-filter">
                    <p class="Sub color-black  mb12"><?php echo get_label('Розташування', 'Location') ?></p>
                    <div class="flex-row">
                        <p class="Body color-black  mb12"><?php echo get_label('Повністю дістанційно', 'Full Remote') ?> (1)</p>
                    </div>
                </div>
            </div>
            <div class="vacancies-list">
                <?php
                $category = get_category_by_slug(pll_current_language() == 'uk' ? 'career' : 'career-en');

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
                            <div class="single-vacancy">
                                <div class="accordion">
                                    <p class="H5 color-navy-green  italic"><?php the_title() ?></p>
                                    <div class="toggle"></div>
                                </div>
                                <div class="single-desc" style="height: 0px; overflow-y: hidden;">
                                    <?php the_content() ?>
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
</section>


<?php

echo get_post_field('post_content', get_queried_object_id());

get_footer();
