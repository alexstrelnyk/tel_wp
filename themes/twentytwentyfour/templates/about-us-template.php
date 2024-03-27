<?php
/*
Template Name: about-us
*/
get_header();

echo get_post_field('post_content', get_queried_object_id());

get_template_part('parts/products-slider');

get_template_part('parts/planets');

get_template_part('parts/feedback-slider');
?>

<section id=":r9:" class="width-wrapper">
    <div class="bg-grey-blue slider-container">
        <div class="slider-side-bar bg-midnight-blue">
            <p class="Sub color-white  bold"><?php echo get_label('Глобальна присутність', 'Worldwide presence') ?></p>
        </div>
        <div class="wide-gallery-root">
            <p class="H2 color-white gallery-heading italic"><?php echo get_label('Досліджуйте наші регіони', 'Explore our regions') ?></p>
            <div class="wide-gallery-slider" style="transform: translateX(0px);">
                <div class="wide-gallery-card"><img loading="lazy" src="https://telesens.ua/admin/files/upload/dd5e4b72-7921-415c-b23e-997ed38f6618Placeholder-1.png" alt="Україна" class="wide-gallery-image cover">
                    <p class="Sub2 color-white  mb12"><?php echo get_label('Україна', 'Ukraine') ?></p>
                    <p class="Body color-white ">Центр розробки розташований у Харкові, Україна. Однак члени нашої команди також працюють віддалено. Нас об'єднують основні цінності та шляхи досягнення спільних цілей. Місцезнаходження: Україна, 61001, Харків, вул. Молочна, 38. </p>
                </div>
                <div class="wide-gallery-card"><img loading="lazy" src="https://telesens.ua/admin/files/upload/de4ea34f-d9af-4f82-8099-0714b2884a23Placeholder.png" alt="США" class="wide-gallery-image cover">
                    <p class="Sub2 color-white  mb12"><?php echo get_label('США', 'USA') ?></p>
                    <p class="Body color-white ">Ми пропонуємо рішення світового рівня та цінуємо можливість поділитися нашим досвідом з іншими та втілити ваші ідеї в життя. Проста програма чи високонавантажене корпоративне рішення не має значення. Ми забезпечимо найкращі результати. Щоб дізнатися більше, зверніться до нашого представника в США! Місцезнаходження представництва: 319 Kingston Avenue, Suite 333 Brooklyn, NY, 11213.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('parts/form') ?>

<?php

get_footer();
