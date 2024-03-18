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
                                    <div>
                                        <?php the_content() ?>
                                        <div class="tablet-separator-16"></div>
                                        <div class="apply-btn">
                                            <p class="Sub2 color-navy-green  italic"><?php echo get_label('Подайте заявку', 'Apply') ?>!</p>
                                            <p></p>
                                        </div>
                                        <div class="vacancies-separator"></div>
                                        <div class="vacancy-application">
                                            <div class="contact-form-root f1">
                                                <div class="text-input" data-cursor="input-text">
                                                    <p class="Sub2 color-just-grey "><?php echo get_label('Імё\'я', 'First name') ?>*</p><input type="text" class="input" name="firstName" enterkeyhint="next" value="">
                                                </div>
                                                <div class="text-input" data-cursor="input-text">
                                                    <p class="Sub2 color-just-grey "><?php echo get_label('Прізвище', 'Last name') ?></p><input type="text" class="input" name="lastName" enterkeyhint="next" value="">
                                                </div>
                                                <div class="text-input" data-cursor="input-text">
                                                    <p class="Sub2 color-just-grey "><?php echo get_label('Номер телефону', 'Phone number') ?>*</p><input type="text" class="input" name="phone" enterkeyhint="next" value="">
                                                </div>
                                                <div class="text-input" data-cursor="input-text">
                                                    <p class="Sub2 color-just-grey ">E-mail*</p><input type="text" class="input" name="email" enterkeyhint="next" value="">
                                                </div>
                                                <div class="text-input" data-cursor="input-text">
                                                    <p class="Sub2 color-just-grey "><?php echo get_label('Коментарі', 'Comments') ?></p><textarea maxlength="2000" class="input multi" name="content" enterkeyhint="enter" style="height: 20px;"></textarea>
                                                    <p class="Body color-just-grey letters-counter">0/2000</p>
                                                </div>
                                                <div class="text-input">
                                                    <p class="Sub2 color-just-grey  mb8"><?php echo get_label('Додайте своє резюме', 'Add your CV') ?></p>
                                                    <div class="dropzone" role="presentation" tabindex="0" style="z-index: 2; flex: 1 1 0%; display: flex; flex-direction: column; align-items: center; padding: 25px 16px; border-width: 1px; border-radius: 2px; border-color: rgb(175, 188, 186); border-style: dashed; background-color: rgb(234, 245, 249); outline: none;"><input accept="application/pdf,.pdf,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,.xlsx,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.docx,image/jpeg,.jpeg,image/png,.png" multiple="" type="file" tabindex="-1" style="display: none;">
                                                        <div class="flex-row gap12 align-center"><svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M8 0.5H2C1.175 0.5 0.5075 1.175 0.5075 2L0.5 14C0.5 14.825 1.1675 15.5 1.9925 15.5H11C11.825 15.5 12.5 14.825 12.5 14V5L8 0.5ZM11 14H2V2H7.25V5.75H11V14ZM3.5 10.2575L4.5575 11.315L5.75 10.13V13.25H7.25V10.13L8.4425 11.3225L9.5 10.2575L6.5075 7.25L3.5 10.2575Z" fill="#004D35"></path>
                                                            </svg>
                                                            <p class="Body color-navy-green semi-bold download-button"><?php echo get_label('Оберіть файл для завантаження', 'Select a file to upload') ?></p>
                                                        </div>
                                                        <p class="Cap color-navy-green  mb16"><?php echo get_label('або перетягніть його сюди', 'or drag and drop it here') ?></p>
                                                        <div class="flex-row gap12 dropzone-description">
                                                            <p class="Small-11 color-grey "><?php echo get_label('Формати', 'Format') ?>: .docx .xlsx .pdf .png .jpg</p>
                                                            <p class="Small-11 color-grey "><?php echo get_label('Файли: 3 макс', 'Files: 3 max') ?>.</p>
                                                            <p class="Small-11 color-grey "><?php echo get_label('Розмір: до 5 МБ', 'Size: up to 5mb each') ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="flex column gap16"></div>
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
