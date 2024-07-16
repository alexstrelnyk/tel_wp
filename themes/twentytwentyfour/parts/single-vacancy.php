<div class="single-vacancy">
    <div class="accordion" data-cursor="active">
        <p class="H5 color-navy-green  italic"><?php the_title() ?></p>
        <div class="toggle"></div>
    </div>
    <div class="single-desc" style="height: 0px; overflow-y: hidden;">
        <div>
            <?php the_content() ?>
            <div class="tablet-separator-16"></div>
            <div class="apply-btn">
                <p class="Sub2 color-navy-green  italic"><?php echo get_label('Подайте заявку', 'Apply') ?>!</p>
                <p></p>
        </div>
        <div class="vacancies-separator"></div>
        <div class="vacancy-application" id="<?php echo $args['form_name'] ?>" data-career_title="<?php the_title() ?>">
            <?php
                $form = get_label('[contact-form-7 id="3007c12" title="Career uk"]', '[contact-form-7 id="b1d8cb0" title="Career en"]');
                echo do_shortcode($form);
            ?>
            </div>
        </div>
    </div>
</div>