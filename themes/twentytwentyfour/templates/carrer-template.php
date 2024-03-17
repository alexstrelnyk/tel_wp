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
                <p class="Sub2 color-navy-green ">Перевірте кар'єрні можливості</p>
            </div>
            <div class="side f7 flex column">
                <p class="H3 color-navy-green spacer italic">Приєднуйся до команди Телесенс!</p>
                <p class="Body color-navy-green "></p>
                <p class="Body color-navy-green ">Телесенс — це різноманітна команда з ідеальним поєднанням зрілих спеціалістів із серйозним досвідом та молодих професіоналів, які захоплені справою. Нас формує досвід і живлять таланти. Таланти, які прагнуть вчитися, розвиватися та знаходити сміливі рішення. Не зволікайте, вибирайте свою можливість і подавайте заявку!</p>
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
                    <p class="Sub color-black  mb12">Департаменти</p>
                    <div class="flex-row">
                        <p class="Body color-black  mb12">Продукт (1)</p>
                    </div>
                </div>
                <div class="bar-filter">
                    <p class="Sub color-black  mb12">Розташування</p>
                    <div class="flex-row">
                        <p class="Body color-black  mb12">Повністю дістанційно (1)</p>
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

<section id=":r16:" class="root-values bg-white">
    <div class="sticky values-header center bg-white" style="top: 60px;">
        <div id="inner-blog-section" class="container inner-blog-preview">
            <div class="side f3 flex-column">
                <p class="Body color-black "></p>
            </div>
            <div class="side f7 flex column">
                <p class="H3 color-black  italic">Наші цінності</p>
                <p class="Body color-black "></p>
            </div>
        </div>
    </div>
    <div class="spacer"></div>
    <div class="container up-2 sticky" style="top: 190px;">
        <div class="single-card">
            <div class="card-spacer" style="height: 240px;"></div>
            <div class="sticky" style="top: 190px;">
                <div class="value-card bg-navy-green">
                    <div class="card-content">
                        <div class="value-circle" style="background-image: url(&quot;/wp-content/themes/twentytwentyfour/assets/images/72940c30-f145-4a15-8cc5-d8f530f5d5a8-Ellipse67.png&quot;);"></div>
                        <p class="Sub color-white value-title">Професіоналізм.</p>
                        <p class="Body2 color-white ">Ми використовуємо наш досвід і компетентність для досягнення амбітних цілей наших клієнтів.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-card">
            <div class="card-spacer" style="height: 0px;"></div>
            <div class="sticky" style="top: 190px;">
                <div class="value-card bg-navy-green">
                    <div class="card-content">
                        <div class="value-circle" style="background-image: url(&quot;/wp-content/themes/twentytwentyfour/assets/images/044d9dee-41d6-42aa-a7e8-503e3d6a7e19-Ellipse681.png&quot;);"></div>
                        <p class="Sub color-white value-title">Люди.</p>
                        <p class="Body2 color-white ">Успіх кожного покращує нас.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-card">
            <div class="card-spacer" style="height: 140px;"></div>
            <div class="sticky" style="top: 190px;">
                <div class="value-card bg-navy-green">
                    <div class="card-content">
                        <div class="value-circle" style="background-image: url(&quot;/wp-content/themes/twentytwentyfour/assets/images/943b676c-e89c-484a-8ec5-47d28461c643-Ellipse69.png&quot;);"></div>
                        <p class="Sub color-white value-title">Наполегливість.</p>
                        <p class="Body2 color-white ">Найкращі результати досягаються завдяки наполегливості та відданості справі.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-card">
            <div class="card-spacer" style="height: 300px;"></div>
            <div class="sticky" style="top: 190px;">
                <div class="value-card bg-navy-green">
                    <div class="card-content">
                        <div class="value-circle" style="background-image: url(&quot;/wp-content/themes/twentytwentyfour/assets/images/fb365d2a-5a82-4f91-b67e-3ea1aee7102a-Ellipse701.png&quot;);"></div>
                        <p class="Sub color-white value-title">Сприйняття.</p>
                        <p class="Body2 color-white ">Ми адаптуємося, щоб досягати виняткових результатів і задовольнити всі явні та неявні потреби.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
