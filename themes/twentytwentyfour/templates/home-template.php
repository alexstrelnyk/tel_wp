<?php
/*
Template Name: Homepage
*/
get_header();

echo get_post_field('post_content', get_queried_object_id());

get_template_part('parts/products-slider');

get_template_part('parts/planets');
?>

<section id=":r8:" class="width-wrappers">
    <div class="bg-midnight-blue techno-container">
        <div class="slider-side-bar bg-midnight-blue">
            <p class="Sub color-white technologies-title bold"><?php echo get_label('ТЕХНОЛОГІЇ', 'TECHNOLOGIES') ?></p>
        </div>
        <div class="techno-root">
            <div class="techno-spacer"></div>
            <div class="techno-card">
                <div class="techno-card-title bg-midnight-blue">
                    <p class="H5 color-white  bold">Interconnect <?php echo get_label('рішення', 'solutions') ?></p>
                    <div class="techno-arrow"></div>
                </div>
                <div class="techno-content">
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/c007a175-7c7f-4cfa-9d48-9c97fbedb2eaGroup-2.png" alt="Java" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/941d49e9-e12d-40f1-bd23-96d6584fab62Vector-21.png" alt="Oracle" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/0955a78e-8af6-4ff9-b416-c2a2ec288c32Delphi_Language_Logo.png" alt="Delphi" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/9aa289b6-d934-4c7d-a974-9704bf32055bJasper Reports 2.png" alt="Jasper Reports" class="techno-image"></div>
                    </div>
                </div>
            </div>
            <div class="techno-card">
                <div class="techno-card-title bg-midnight-blue">
                    <p class="H5 color-white  bold">OSS/BSS/VAS <?php echo get_label('рішення', 'solutions') ?></p>
                    <div class="techno-arrow"></div>
                </div>
                <div class="techno-content">
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/b24316d1-c661-44b9-b216-841a750dfa6emysql.png" alt="MySQL" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/d7cb97a7-d1ac-4039-ad7f-9d5cd9fdac49postresql.png" alt="PostgreSQL" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/941d49e9-e12d-40f1-bd23-96d6584fab62Vector-21.png" alt="Oracle" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/c007a175-7c7f-4cfa-9d48-9c97fbedb2eaGroup-2.png" alt="Java" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/68e010d1-0824-4ce1-b685-b02b5405ea26vaadin.png" alt="VAADIN" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/1b2df85c-3976-419b-b107-00e54c203df3spring.png" alt="Spring" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/f2397086-921f-467a-8c13-bdc6eeb5483ajooq.png" alt="Jooq" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/5f09c14d-9d66-4a0b-98ae-ab25866f7eacdocker.png" alt="Docker" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/6286aee5-4a01-45cb-a685-bf4b1123d793zabbix.png" alt="ZABBIX" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/7eaf8553-8d8a-4728-bb21-5053a072f5f1Quartz.png" alt="Quartz" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/9aa289b6-d934-4c7d-a974-9704bf32055bJasper Reports 2.png" alt="Jasper Reports" class="techno-image"></div>
                    </div>
                </div>
            </div>
            <div class="techno-card">
                <div class="techno-card-title bg-midnight-blue">
                    <p class="H5 color-white  bold"><?php echo get_label('Мобільна та веб-розробка', 'Mobile&Web Development') ?></p>
                    <div class="techno-arrow"></div>
                </div>
                <div class="techno-content">
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/c007a175-7c7f-4cfa-9d48-9c97fbedb2eaGroup-2.png" alt="Java" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/ad63c290-7919-4630-9cad-48fdd7e2a71akotlin.png" alt="Kotlin" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/a09f9fb9-b206-4c0e-9a82-4bbcdb3f416dreact-native.png" alt="React Native" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/5b63c830-44bb-4fb0-ba0d-4f094c6221aaReact_logo_wordmark.png" alt="React" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/803b31b8-ad5d-41dc-aa2d-a71dab19089bnode.js.png" alt="JavaNode.js" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/177227eb-aaee-4bba-a3d0-87a610a26a4fLaravel_logo_wordmark_logotype.png" alt="Laravel" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/394a7d66-481b-4699-94d1-441b90ee136cWordPress-Logo.png" alt="WP" class="techno-image"></div>
                    </div>
                </div>
            </div>
            <div class="techno-card">
                <div class="techno-card-title bg-midnight-blue">
                    <p class="H5 color-white  bold"><?php echo get_label('Веб-, мобільне та API тестування', 'Web, Mobile & API Testing') ?></p>
                    <div class="techno-arrow"></div>
                </div>
                <div class="techno-content">
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/bb81c82e-68b5-4696-910d-8cae3e8361edandroid-logo-0.png" alt="Android" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/95dc2e3a-1fde-4ae1-9fe4-f853cbace855ios-mac.png" alt="iOS" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/94ae13fd-face-4c01-b67c-ee87543d8940rest.png" alt="REST" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/9533570a-6119-4e04-ac0c-1e378d1004c1soap.jpg" alt="SOAP" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/6e5a7d18-9225-4335-9cf5-039071a39a3dpostman.png" alt="Postman" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/28d6f652-9dea-40f9-899c-2284137ef65bjira.png" alt="Jira" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/b247489b-4b17-4365-9fea-2d84b7888fc0soap ui.png" alt="SOAP UI" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/aded183a-c76b-407f-8ad7-2f206a51c26fespresso.png" alt="Espresso" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/0bdefc62-214f-45ff-8f65-93959247d8e5selendroid.png" alt="Selendroid" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/fe4b19dd-9b1a-4272-a38e-d5159c3c8d96robotium.png" alt="Robotium" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/7dd3f7f6-3517-44ee-95ea-8f83d12b1340appium.png" alt="Appium" class="techno-image"></div>
                    </div>
                </div>
            </div>
            <div class="techno-card">
                <div class="techno-card-title bg-midnight-blue">
                    <p class="H5 color-white  bold"><?php echo get_label('Тестування продуктивності та функціональності', 'Performance & Functional Testing') ?></p>
                    <div class="techno-arrow"></div>
                </div>
                <div class="techno-content">
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/eda60bd8-1044-425b-9bf1-2398c4e0961cjmeter.png" alt="JMeter" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/1658833846794-st.png" alt="Locust" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/32fe2aac-f526-44e9-a182-0fabb0143845blazemeter.png" alt="BlazeMeter" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/72946a25-213b-4ab2-a636-3e3c266292b8Selenium.png" alt="Selenium" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/6e5a7d18-9225-4335-9cf5-039071a39a3dpostman.png" alt="Postman" class="techno-image"></div>
                    </div>
                    <div class="variant">
                        <div><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/b247489b-4b17-4365-9fea-2d84b7888fc0soap ui.png" alt="SOAP UI" class="techno-image"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('parts/feedback-slider') ?>

<?php get_template_part('parts/form') ?>

<?php
$industries = [
    [
        'name' => 'Телеком',
        'img' => '1657202444886-mL.jpg',
    ], [
        'name' => 'Безпека',
        'img' => '1657202456313-yL.jpg',
    ], [
        'name' => 'Фінанси',
        'img' => '1657202464929-eL.jpg',
    ], [
        'name' => 'Охорона здоров\'я',
        'img' => '1657202471835-eL.jpg',
    ], [
        'name' => 'ЖКГ',
        'img' => '1657202477758-yL.jpg',
    ], [
        'name' => 'Ігрова індустрія',
        'img' => '1657202484393-gL.jpg',
    ], [
        'name' => 'Фітнес',
        'img' => '1657202493553-sL.jpg',
    ], [
        'name' => 'FinTech',
        'img' => '1657202500010-hL.jpg',
    ],
];

$industries_mob = [
    [
        'name' => 'Телеком',
        'img' => '1657202566628-mM.jpg',
    ], [
        'name' => 'Безпека',
        'img' => '1657202574248-yM.jpg',
    ], [
        'name' => 'Фінанси',
        'img' => '1657202580458-eM.jpg',
    ], [
        'name' => 'Охорона здоров\'я',
        'img' => '1657202590719-eM.jpg',
    ], [
        'name' => 'ЖКГ',
        'img' => '1657202599113-yM.jpg',
    ], [
        'name' => 'Ігрова індустрія',
        'img' => '1657202605141-gM.jpg',
    ], [
        'name' => 'Фітнес',
        'img' => '1657202609306-sM.jpg',
    ], [
        'name' => 'FinTech',
        'img' => '1657202613975-hM.jpg',
    ],
];
?>


<section id="ind-wrap-mob" class="width-wrapper">
    <div class="bg-light-grey industries-mob">
        <div class="industries-title">
            <p class="H-mob color-soft-blue ">Industries expertise</p>
        </div>
        <div class="industries-slider hsh">
            <div class="flex-row">
                <?php
                foreach ($industries_mob as $arr) {
                    $cls = in_array($arr['img'], [
                        '1657202580458-eM.jpg',
                        '1657202609306-sM.jpg',
                    ]) ? 'color-grey' : 'color-soft-blue';
                    echo '
                        <div class="industry-card">
                            <div>
                                <p class="Body ' . $cls . '">' . $arr['name'] . '</p>
                                <img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/' . $arr['img'] . '" alt="' . $arr['name'] . '">
                            </div>
                        </div>
                    ';
                }
                ?>
            </div>
        </div>
    </div>
</section>
<section id="ind-wrap-large" class="width-wrapper">
    <div class="bg-light-grey industries">
        <div class="industries-title">
            <p class="Body color-soft-blue  italic">Industries expertise</p>
        </div>
        <div class="industries-slider" style="width: 2848px; transform: translate(806px, 145px);">
            <div class="interaction-box"></div>
            <div class="shadow-slider" style="left: -2848px;">
                <?php
                foreach ($industries as $arr) {
                    echo '
                        <div class="industry-card spread">
                            <p class="Body color-soft-blue ">' . $arr['name'] . '</p><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/' . $arr['img'] . '" alt="' . $arr['name'] . '">
                        </div>
                    ';
                }
                ?>
            </div>

            <?php
            foreach ($industries as $key => $arr) {
                echo '
                    <div id="industry-card" class="industry-card" style="z-index: ' . (count($industries) - $key) . '; transform: translate(-' . (356 * $key) . 'px, 0px) rotate(' . (5 + ($key * 5)) . 'deg);">
                        <p class="Body color-soft-blue ">' . $arr['name'] . '</p><img loading="lazy" src="https://telesens.ua/admin/files/upload/' . $arr['img'] . '" alt="' . $arr['name'] . '">
                    </div>
                ';
            }
            ?>
            <div class="shadow-slider" style="right: -2848px;">

                <?php
                foreach ($industries as $arr) {
                    echo '
                        <div class="industry-card spread">
                            <p class="Body color-soft-blue ">' . $arr['name'] . '</p><img loading="lazy" src="https://telesens.ua/admin/files/upload/' . $arr['img'] . '" alt="' . $arr['name'] . '">
                        </div>
                    ';
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php

get_footer();
