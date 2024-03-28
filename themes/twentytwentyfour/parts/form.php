<?php if (get_post()->post_name !== 'contact-us') { ?>

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

<?php } ?>

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