<section id=":r9:" class="width-wrapper">
    <div class="quotes bg-soft-blue">
        <div class="quotes bg-soft-blue swiper" id="feedback_swiper">
            <div class="quotes-slider swiper-wrapper slider-mob" >
                <?php
                $category = get_category_by_slug(get_label('client_feedback', 'client_feedback-en'));

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
            <div class="hint"><?php echo get_label('Ви можете гортати цей розділ','You can swipe this section')?></div>
        </div>
    </div>
</section>