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
                <?php 
                $category = get_category_by_slug(pll_current_language() == 'uk' ? 'career' : 'career-en');
                if($category){
                    $categories = get_categories(array( 'parent' => $category->term_id));
                }?>
                <?php foreach($categories as $cat) : ?>
                    <div class="bar-filter">
                        <p class="Sub color-black  mb12"><?php echo $cat->name ?></p>
                            <?php  $sub_categories = get_categories(array('parent' => $cat->term_id));
                            if($sub_categories){ ?>
                                    <div class="accordion" onClick="accordionClick(this)">
                                        <?php foreach($sub_categories as $sub) :  ?>
                                        <div class="flex-row">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin: 3px 4px;">
                                                <path d="M8.00065 11.5133L12.1207 13.9999L11.0273 9.31325L14.6673 6.15992L9.87399 5.75325L8.00065 1.33325L6.12732 5.75325L1.33398 6.15992L4.97398 9.31325L3.88065 13.9999L8.00065 11.5133Z" fill="#004D35">
                                                </path>
                                            </svg>
                                            <p class="Body color-black  mb12" slug="<?php echo $sub->slug ?>"><?php echo $sub->name ?></p>
                                        </div>
                                        <?php endforeach; ?>
                                        <div class="toggle"></div>
                                    </div>
                                <div class="overflow-hidden">
                                <div>
                                    <div class="filter-item selected">
                                        <p class="Body color-navy-green " slug="<?php echo $cat->slug ?>"><?php echo get_label('Всі', 'All') ?> </p>
                                        <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="9.09375" cy="9" r="7" fill="#004D35"></circle>
                                            <path d="M5.85938 9L7.85938 11L11.8594 7" stroke="white" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                        </svg> 
                                    </div>
                                <?php foreach($sub_categories as $sub) :  ?>
                                    <div class="filter-item ">
                                        <p class="Body color-black " slug="<?php echo $sub->slug ?>"><?php echo $sub->name ?></p>
                                        <div class="tick-empty"></div>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="vacancies-list">
            <?php  
                if ($category) {
                    $args = array(
                        'category__in' => array($category->term_id),
                        'posts_per_page' => -1,
                    );
                    $posts_query = new WP_Query($args);

                    if ($posts_query->have_posts()) {
                        while ($posts_query->have_posts()) {
                            $posts_query->the_post();
                            $form_name = 'career_form_' . $posts_query->post->ID;
                            $form_names[] = $form_name;

                ?>
                <?php get_template_part('parts/single-vacancy', null, array('form_name' => $form_name)) ?>
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
