<?php
/*
Template Name: about-us
*/
get_header();

echo get_post_field('post_content', get_queried_object_id());

get_template_part('parts/gallery-slider');
?>


<section id="sec_r3" class="width-wrapper">
    <div class="counter full-width row flex center bg-soft-blue">
        <div class="container">
            <div class="f1 single-counter center">
                <div>
                    <p class="H1 color-grey  text-center italic"><span class="regular" data-count="11">0</span></p>
                    <p class="H6 color-grey  text-center">авторських продуктів</p>
                </div>
            </div>
            <div class="f1 single-counter center">
                <div>
                    <p class="H1 color-grey  text-center italic"><span class="regular" data-count="700">0</span></p>
                    <p class="H6 color-grey  text-center">завершених проєктів</p>
                </div>
            </div>
            <div class="f1 single-counter center">
                <div>
                    <p class="H1 color-grey  text-center italic"><span class="regular" data-count="25">0</span></p>
                    <p class="H6 color-grey  text-center">років досвіду</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id=":r5:" class="root-values bg-white">
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
get_template_part('parts/products-slider');

get_template_part('parts/planets');

get_template_part('parts/feedback-slider');

get_template_part('parts/regions-slider');

get_template_part('parts/form');

get_footer();
