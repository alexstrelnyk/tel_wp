<?php
/*
Template Name: contact-us
*/
get_header();

echo get_post_field('post_content', get_queried_object_id());
?>

<section id=":r2:" class="width-wrapper">
    <div class="blog-preview frc bg-gu-light-green">
        <div class="container">
            <div class="side flex column" style="flex: 2.33333 1;">
                <p class="Sub2 color-black hide-mob"> </p>
            </div>
            <div class="side f7 flex column">
                <p class="H3 color-black spacer italic"><?php echo get_label('Зв\'яжіться з нами!', 'Get in touch!') ?></p>
                <p class="Body color-black "><?php echo get_label('Давайте працювати разом! Розкажіть більше про свій проєкт', 'Let’s work together! Tell us more about your project') ?></p>
            </div>
        </div>
    </div>
</section>

<?php
get_template_part('parts/form');

get_footer();
