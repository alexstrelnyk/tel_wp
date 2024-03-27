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

<section id=":rp:" class="width-wrapper">
    <div class="banner bg-white">
        <div class="banner-container" style="animation-duration: 30s;">
            <div class="ticker frc">
                <p class="H1 color-black  italic">Ready to start your project?</p>
                <div class="bg-dark-blend-a separator flex-col"><span>Professionalism.</span><span>People.</span><span>Persistance.</span><span>Perception.</span></div>
            </div>
            <div class="ticker frc reverse">
                <p class="H1 color-black  italic">Ready to start your project?</p>
                <div class="bg-dark-blend-a separator flex-col"><span>Professionalism.</span><span>People.</span><span>Persistance.</span><span>Perception.</span></div>
            </div>
            <div class="ticker frc">
                <p class="H1 color-black  italic">Ready to start your project?</p>
                <div class="bg-dark-blend-a separator flex-col"><span>Professionalism.</span><span>People.</span><span>Persistance.</span><span>Perception.</span></div>
            </div>
            <div class="ticker frc reverse">
                <p class="H1 color-black  italic">Ready to start your project?</p>
                <div class="bg-dark-blend-a separator flex-col"><span>Professionalism.</span><span>People.</span><span>Persistance.</span><span>Perception.</span></div>
            </div>
        </div>
    </div>
</section>

<section data=":rq:" id="contact-us" class="width-wrapper">
    <div class="contact-us bg-white">
        <div class="contact-form-root">
            <div class="text-input" data-cursor="input-text">
                <p class="Sub2 color-black "><?php echo get_label('Ім\'я', 'First name') ?>*</p><input type="text" class="input" name="firstName" enterkeyhint="next" value="">
            </div>
            <div class="text-input" data-cursor="input-text">
                <p class="Sub2 color-black "><?php echo get_label('Прізвище', 'Last name') ?></p><input type="text" class="input" name="lastName" enterkeyhint="next" value="">
            </div>
            <div class="text-input" data-cursor="input-text">
                <p class="Sub2 color-black "><?php echo get_label('Номер телефону', 'Phone number') ?>*</p><input type="text" class="input" name="phone" enterkeyhint="next" value="">
            </div>
            <div class="text-input" data-cursor="input-text">
                <p class="Sub2 color-black ">E-mail*</p><input type="text" class="input" name="email" enterkeyhint="next" value="">
            </div>
            <div class="text-input" data-cursor="input-text">
                <p class="Sub2 color-black "><?php echo get_label('Повідомлення', 'Message') ?></p><textarea maxlength="2000" class="input multi" name="content" enterkeyhint="enter" style="height: 118px;"></textarea>
                <p class="Body color-just-grey letters-counter">0/2000</p>
            </div>
            <div class="checkbox-root" data-cursor="active"><label class="checkbox path"><input type="checkbox" value="false"><svg viewBox="0 0 21 21">
                        <path d="M5,10.75 L8.5,14.25 L19.4,2.3 C18.8333333,1.43333333 18.0333333,1 17,1 L4,1 C2.35,1 1,2.35 1,4 L1,17 C1,18.65 2.35,20 4,20 L17,20 C18.65,20 20,18.65 20,17 L20,7.99769186"></path>
                    </svg></label><a href="privacy-policy" target="_blank" rel="noopener noreferrer">
                    <p class="Body color-just-grey regular Link"><?php echo get_label('Я погоджуюся з Політикою конфіденційності', 'I agree with the Privacy Policy') ?></p>
                </a></div>
            <div class="submission frc">
                <div class="btn-box undefined">
                    <div class="btn-joint" style="transition: all 0.75s ease-out 0s;" data-cursor="active">
                        <div class="svg-btn send-btn"></div>
                    </div>
                </div>
                <div class="clutch pulse" data-cursor="active" to="https://clutch.co/profile/telesens#reviews"><a href="https://clutch.co/profile/telesens#reviews" target="_blank" rel="noopener noreferrer">
                        <div class="svg-btn clutch-btn"></div>
                    </a></div>
            </div>
        </div>
    </div>
</section>

<?php

get_footer();
