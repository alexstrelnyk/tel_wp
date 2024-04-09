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

<?php
get_template_part('parts/our-values');

get_template_part('parts/products-slider');

get_template_part('parts/planets');

get_template_part('parts/feedback-slider');

get_template_part('parts/regions-slider');

get_template_part('parts/form');

get_footer();
