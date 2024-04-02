<?php if (!is_contact_page()) { ?>
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
    <div class="contact-us bg-<?php echo is_contact_page() ? 'gu-light-green' : 'white' ?>">
        <?php
        $form = get_label('[contact-form-7 id="53f5d6f" title="Contact form uk"]', '[contact-form-7 id="8039dfd" title="Contact form en"]');
        echo do_shortcode($form);
        ?>
    </div>
</section>

<?php if (is_contact_page()) { ?>
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