<?php
/*
Template Name: Homepage
*/
get_header();

?>

<?php

echo get_post_field('post_content', get_queried_object_id());
?>

<section id=":r5:" class="width-wrapper">
    <div class="bg-grey-blue slider-container">
        <div class="slider-side-bar bg-midnight-blue">
            <p class="Sub color-white  bold">ПРОДУКТИ І ПОСЛУГИ</p>
        </div>
        <div class="services-slider" style="transform: translateX(0px);">
            <?php

            $categories = get_categories(['parent' => 0]);
            $product_page = get_page_by_path('products-services');

            if (!empty($categories)) {
                foreach ($categories as $category) {
                    if (in_array($category->cat_name, [
                        'blog',
                        'news',
                        'client_feedback',
                        'career',
                    ])) {
                        continue;
                    }

                    $image = get_field('category_image', 'category_' . $category->cat_ID);


            ?>
                    <div class="product-card">
                        <div class="product-desc">
                            <div class="product-image" style="transform: rotate(0.584795deg);" data-cursor="slider-img" onclick="goto('<?php echo get_permalink($product_page->ID) ?>?cat_slug=<?php echo $category->slug ?>')"><img loading="lazy" src="<?php echo $image['url'] ?>" alt="<?php echo $category->name ?>"></div><a class="Body animated-link" data-cursor="active" href="<?php echo get_permalink($product_page->ID) ?>?cat_id=<?php echo $category->cat_ID ?>"><span class="title"><span data-text="Читати більше" class="color-after-bright-green color-before-white">Читати більше</span></span></a>
                        </div>
                        <div class="pager" data-cursor="slider-white"></div>
                        <div class="product-title">
                            <p class="H2 color-white "><?php echo $category->name ?></p>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</section>

<section id=":r6:" class="width-wrapper">
    <div class="blog-preview frc bg-white">
        <div class="container">
            <div class="side f3 flex column">
                <p class="Sub2 color-black ">Співпраця</p>
            </div>
            <div class="side f7 flex column">
                <p class="H3 color-black spacer italic">Партнери та клієнти</p>
                <p class="Body color-black "></p>
                <p class="Body color-black ">Компанії, з якими ми маємо честь працювати</p>
            </div>
            <div class="f2"></div>
        </div>
    </div>
</section>

<section id=":r7:" class="width-wrapper">
    <div class="bg-white partners-section">
        <div class="partners"><svg class="motion-path" width="1920" height="1046" viewBox="0 0 1920 1046" fill="none">
                <g clip-path="url(#clip0_64_845)">
                    <path d="M1210.95 523.437C1210.95 555.668 1183.05 585.001 1137.59 606.305C1092.17 627.592 1029.38 640.771 960 640.771C890.621 640.771 827.835 627.592 782.412 606.305C736.949 585.001 709.052 555.668 709.052 523.437C709.052 491.207 736.949 461.874 782.412 440.569C827.835 419.283 890.621 406.104 960 406.104C1029.38 406.104 1092.17 419.283 1137.59 440.569C1183.05 461.874 1210.95 491.207 1210.95 523.437Z" stroke="#03a65a" id="motion-path-0"></path>
                    <path d="M1336.15 523.438C1336.15 571.937 1294.24 616 1226.12 647.966C1158.04 679.914 1063.95 699.688 960 699.688C856.049 699.688 761.963 679.914 693.884 647.966C625.765 616 583.854 571.937 583.854 523.438C583.854 474.938 625.765 430.875 693.884 398.909C761.963 366.961 856.049 347.188 960 347.188C1063.95 347.188 1158.04 366.961 1226.12 398.909C1294.24 430.875 1336.15 474.938 1336.15 523.438Z" stroke="#03a65a" id="motion-path-1" opacity="0.6"></path>
                    <path d="M1466.6 524.49C1466.6 589.549 1410.33 648.603 1318.98 691.422C1227.67 734.222 1101.5 760.708 962.104 760.708C822.709 760.708 696.534 734.222 605.227 691.422C513.881 648.603 457.604 589.549 457.604 524.49C457.604 459.43 513.881 400.376 605.227 357.557C696.534 314.757 822.709 288.271 962.104 288.271C1101.5 288.271 1227.67 314.757 1318.98 357.557C1410.33 400.376 1466.6 459.43 1466.6 524.49Z" stroke="#03a65a" id="motion-path-2" opacity="0.5"></path>
                    <path d="M1592.85 523.438C1592.85 605.057 1522.21 679.103 1407.64 732.774C1293.1 786.427 1134.84 819.625 960 819.625C785.161 819.625 626.898 786.427 512.363 732.774C397.789 679.103 327.146 605.057 327.146 523.438C327.146 441.818 397.789 367.772 512.363 314.101C626.898 260.448 785.161 227.25 960 227.25C1134.84 227.25 1293.1 260.448 1407.64 314.101C1522.21 367.772 1592.85 441.818 1592.85 523.438Z" stroke="#03a65a" id="motion-path-3" opacity="0.4"></path>
                    <path d="M1718.05 523.438C1718.05 621.326 1633.4 710.102 1496.17 774.435C1358.97 838.749 1169.41 878.542 960 878.542C750.588 878.542 561.026 838.749 423.835 774.435C286.604 710.102 201.948 621.326 201.948 523.438C201.948 425.549 286.604 336.773 423.835 272.44C561.026 208.126 750.588 168.333 960 168.333C1169.41 168.333 1358.97 208.126 1496.17 272.44C1633.4 336.773 1718.05 425.549 1718.05 523.438Z" stroke="#03a65a" id="motion-path-4" opacity="0.3"></path>
                    <path d="M1844.3 523.438C1844.3 637.596 1745.51 741.101 1585.44 816.095C1425.4 891.071 1204.27 937.458 960 937.458C715.725 937.458 494.6 891.071 334.563 816.095C174.485 741.101 75.6979 637.596 75.6979 523.438C75.6979 409.279 174.485 305.774 334.563 230.78C494.6 155.804 715.725 109.417 960 109.417C1204.27 109.417 1425.4 155.804 1585.44 230.78C1745.51 305.774 1844.3 409.279 1844.3 523.438Z" stroke="#03a65a" id="motion-path-5" opacity="0.2"></path>
                    <path d="M1969.5 523.438C1969.5 653.865 1856.7 772.099 1673.97 857.756C1491.27 943.393 1238.85 996.375 960 996.375C681.153 996.375 428.728 943.393 246.034 857.756C63.3006 772.099 -49.5 653.865 -49.5 523.438C-49.5 393.01 63.3006 274.776 246.034 189.119C428.728 103.482 681.153 50.5 960 50.5C1238.85 50.5 1491.27 103.482 1673.97 189.119C1856.7 274.776 1969.5 393.01 1969.5 523.438Z" stroke="#03a65a" id="motion-path-6" opacity="0.1"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1008.77 465.876C1042.69 465.066 1072.34 467.902 1089.8 472.964C1072.95 463.649 1049.79 456.561 1022.78 452.511C1008.16 458.384 1002.27 463.851 1008.77 465.876Z" fill="#03a65a"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M807.905 535.945C807.5 535.337 807.297 534.932 806.892 534.325C807.095 534.932 807.5 535.337 807.905 535.945Z" fill="#03a65a"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1100.77 480.054C1085.54 472.561 1046.75 468.713 1003.08 471.346C948.652 474.586 906.611 486.737 909.658 498.28C912.704 509.418 956.167 516.101 1007.75 513.671C1005.52 513.873 1003.29 514.076 1001.05 514.076C939.31 517.721 886.301 510.228 882.849 497.065C879.396 484.104 926.515 470.333 987.85 466.688C991.506 462.435 1003.49 456.36 1018.92 452.107C1000.04 449.475 979.523 448.462 957.792 449.272C870.663 452.31 800.797 483.699 802.016 519.543C802.219 524.201 803.64 528.859 806.078 533.112C817.654 545.87 862.742 554.173 917.172 552.755C981.554 550.932 1035.17 536.149 1036.8 519.543C1038.22 503.748 991.1 492.002 930.171 492.609C932.811 492.407 935.451 492.407 938.091 492.407C1010.8 490.382 1068.89 504.153 1067.06 522.784C1065.43 539.187 1019.33 553.97 959.214 558.83C955.152 564.703 943.778 571.994 928.546 578.474C939.513 579.081 950.683 579.081 962.26 578.879C1049.59 575.841 1119.46 544.452 1118.24 508.608C1118.24 498.077 1111.94 488.357 1100.77 480.054Z" fill="#03a65a"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M930.784 560.25C880.416 561.465 837.156 555.187 816.44 545.062C835.937 562.073 873.916 574.223 919.817 577.868C933.424 569.97 938.095 563.085 930.784 560.25Z" fill="#03a65a"></path>
                </g>
            </svg>
            <div class="partner-list">
                <div class="partner dynamic pos-0 line-0 offset-0" data-cursor="active"><a href="https://ucell.uz/" target="_blank" rel="noopener noreferrer"><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/1676384661951-l1.png" alt=""></a></div>
                <div class="partner dynamic pos-1 line-1 offset-1" data-cursor="active"><a href="https://kyivstar.ua/" target="_blank" rel="noopener noreferrer"><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/57231fa9-fb4d-4b86-9c8a-c8b3bdaf091aimage 72.png" alt=""></a></div>
                <div class="partner dynamic pos-2 line-2 offset-2" data-cursor="active"><a href="https://vega.ua/" target="_blank" rel="noopener noreferrer"><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/2f0189f7-33a6-4557-8330-58a1f664813dimage 74.png" alt=""></a></div>
                <div class="partner dynamic pos-3 line-3 offset-3" data-cursor="active"><a href="https://ukrtelecom.ua/" target="_blank" rel="noopener noreferrer"><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/5124694f-6725-45da-9767-e7e7dbea0e11image 77.png" alt=""></a></div>
                <div class="partner dynamic pos-4 line-4 offset-4" data-cursor="active"><a href="https://www.kcell.kz/" target="_blank" rel="noopener noreferrer"><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/9fece58a-8056-471e-bb7f-20861e07ae94image 78.png" alt=""></a></div>
                <div class="partner dynamic pos-5 line-5 offset-5" data-cursor="active"><a href="https://beeline.uz/" target="_blank" rel="noopener noreferrer"><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/1676030146193-an.png" alt=""></a></div>
                <div class="partner dynamic pos-6 line-6 offset-6" data-cursor="active"><a href="https://career.vodafone.ua/it-smartflex" target="_blank" rel="noopener noreferrer"><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/7eb376cf-ee3b-460e-8c62-4b2d1e3df4c1image 81.png" alt=""></a></div>
                <div class="partner dynamic pos-7 line-0 offset-7" data-cursor="active"><a href="https://www.vodafone.ua/" target="_blank" rel="noopener noreferrer"><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/a850870d-ec7c-43ce-97cc-f6cfbfd171c3image 83.png" alt=""></a></div>
                <div class="partner dynamic pos-8 line-1 offset-8" data-cursor="active"><a href="https://telecom.kz/" target="_blank" rel="noopener noreferrer"><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/c8ba895e-0c1d-4f92-930e-8545b6881855image 84.png" alt=""></a></div>
                <div class="partner dynamic pos-9 line-2 offset-9" data-cursor="active"><a href="https://www.jusanmobile.kz/" target="_blank" rel="noopener noreferrer"><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/1676276950561-go.png" alt=""></a></div>
                <div class="partner dynamic pos-10 line-3 offset-0" data-cursor="active"><a href="https://www.nokia.com/" target="_blank" rel="noopener noreferrer"><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/1676629856247-ns.png" alt=""></a></div>
                <div class="partner dynamic pos-11 line-4 offset-1" data-cursor="active"><a href="https://tele2.kz/" target="_blank" rel="noopener noreferrer"><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/adcbf938-e6ef-4a57-82d1-7f98dc2faeceimage 79.png" alt=""></a></div>
                <div class="partner dynamic pos-12 line-5 offset-2" data-cursor="active"><a href="https://www.velton.ua/" target="_blank" rel="noopener noreferrer"><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/1676557818689-go.png" alt=""></a></div>
                <div class="partner dynamic pos-13 line-6 offset-3"><a href="https://www.velton.ua/" target="_blank" rel="noopener noreferrer"><img loading="lazy" src="https://telesens.ua/admin/files/upload/1676557818689-go.png" alt=""></a></div>

                <div class="partner dynamic pos-14 line-0 offset-4"><a href="https://www.ericsson.com/" target="_blank" rel="noopener noreferrer"><img loading="lazy" src="https://telesens.ua/admin/files/upload/1707407943790-go.png" alt=""></a></div>
            </div>
        </div>
    </div>
</section>

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

<section id=":r9:" class="width-wrapper">
    <div class="quotes bg-soft-blue">
        <div class="quotes bg-soft-blue swiper mySwiper">
            <div class="quotes-slider swiper-wrapper" data-cursor="slider">
                <?php
                $category = get_category_by_slug(pll_current_language() == 'uk' ? 'client_feedback' : 'client_feedback-en');

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
                            <div class="quote-container swiper-slide"><?php the_content() ?></div>
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



<section id=":r24:" class="width-wrapper">
    <div class="bg-light-grey industries">
        <div class="industries-title">
            <p class="Body color-soft-blue  italic">Industries expertise</p>
        </div>
        <div class="industries-slider" style="width: 2848px; transform: translate(806px, 145px);">
            <div class="interaction-box"></div>
            <div class="shadow-slider" style="left: -2848px;">
                <div class="industry-card spread">
                    <p class="Body color-soft-blue ">Телеком</p><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/1657202566628-mM.jpg" alt="Телеком">
                </div>
                <div class="industry-card spread">
                    <p class="Body color-soft-blue ">Безпека</p><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/1657202574248-yM.jpg" alt="Безпека">
                </div>
                <div class="industry-card spread">
                    <p class="Body color-grey ">Фінанси</p><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/1657202580458-eM.jpg" alt="Фінанси">
                </div>
                <div class="industry-card spread">
                    <p class="Body color-soft-blue ">Охорона здоров'я</p><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/1657202590719-eM.jpg" alt="Охорона здоров'я">
                </div>
                <div class="industry-card spread">
                    <p class="Body color-soft-blue ">ЖКГ</p><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/1657202599113-yM.jpg" alt="ЖКГ">
                </div>
                <div class="industry-card spread">
                    <p class="Body color-soft-blue ">Ігрова індустрія</p><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/1657202605141-gM.jpg" alt="Ігрова індустрія">
                </div>
                <div class="industry-card spread">
                    <p class="Body color-grey ">Фітнес</p><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/1657202609306-sM.jpg" alt="Фітнес">
                </div>
                <div class="industry-card spread">
                    <p class="Body color-soft-blue ">FinTech</p><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/1657202613975-hM.jpg" alt="FinTech">
                </div>
            </div>
            <div id="industry-card" class="industry-card" style="z-index: 8; transform: translate(0px, 0px) rotate(5deg);">
                <p class="Body color-soft-blue ">Телеком</p><img loading="lazy" src="https://telesens.ua/admin/files/upload/1657202444886-mL.jpg" alt="Телеком">
            </div>
            <div id="industry-card" class="industry-card" style="z-index: 7; transform: translate(-356px, 0px) rotate(10deg);">
                <p class="Body color-soft-blue ">Безпека</p><img loading="lazy" src="https://telesens.ua/admin/files/upload/1657202456313-yL.jpg" alt="Безпека">
            </div>
            <div id="industry-card" class="industry-card" style="z-index: 6; transform: translate(-712px, 0px) rotate(15deg);">
                <p class="Body color-grey ">Фінанси</p><img loading="lazy" src="https://telesens.ua/admin/files/upload/1657202464929-eL.jpg" alt="Фінанси">
            </div>
            <div id="industry-card" class="industry-card" style="z-index: 5; transform: translate(-1068px, 0px) rotate(20deg);">
                <p class="Body color-soft-blue ">Охорона здоров'я</p><img loading="lazy" src="https://telesens.ua/admin/files/upload/1657202471835-eL.jpg" alt="Охорона здоров'я">
            </div>
            <div id="industry-card" class="industry-card" style="z-index: 4; transform: translate(-1424px, 0px) rotate(25deg);">
                <p class="Body color-soft-blue ">ЖКГ</p><img loading="lazy" src="https://telesens.ua/admin/files/upload/1657202477758-yL.jpg" alt="ЖКГ">
            </div>
            <div id="industry-card" class="industry-card" style="z-index: 3; transform: translate(-1780px, 0px) rotate(30deg);">
                <p class="Body color-soft-blue ">Ігрова індустрія</p><img loading="lazy" src="https://telesens.ua/admin/files/upload/1657202484393-gL.jpg" alt="Ігрова індустрія">
            </div>
            <div id="industry-card" class="industry-card" style="z-index: 2; transform: translate(-2136px, 0px) rotate(35deg);">
                <p class="Body color-grey ">Фітнес</p><img loading="lazy" src="https://telesens.ua/admin/files/upload/1657202493553-sL.jpg" alt="Фітнес">
            </div>
            <div id="industry-card" class="industry-card" style="z-index: 1; transform: translate(-2492px, 0px) rotate(40deg);">
                <p class="Body color-soft-blue ">FinTech</p><img loading="lazy" src="https://telesens.ua/admin/files/upload/1657202500010-hL.jpg" alt="FinTech">
            </div>
            <div class="shadow-slider" style="right: -2848px;">
                <div class="industry-card spread">
                    <p class="Body color-soft-blue ">Телеком</p><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/1657202566628-mM.jpg" alt="Телеком">
                </div>
                <div class="industry-card spread">
                    <p class="Body color-soft-blue ">Безпека</p><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/1657202574248-yM.jpg" alt="Безпека">
                </div>
                <div class="industry-card spread">
                    <p class="Body color-grey ">Фінанси</p><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/1657202580458-eM.jpg" alt="Фінанси">
                </div>
                <div class="industry-card spread">
                    <p class="Body color-soft-blue ">Охорона здоров'я</p><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/1657202590719-eM.jpg" alt="Охорона здоров'я">
                </div>
                <div class="industry-card spread">
                    <p class="Body color-soft-blue ">ЖКГ</p><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/1657202599113-yM.jpg" alt="ЖКГ">
                </div>
                <div class="industry-card spread">
                    <p class="Body color-soft-blue ">Ігрова індустрія</p><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/1657202605141-gM.jpg" alt="Ігрова індустрія">
                </div>
                <div class="industry-card spread">
                    <p class="Body color-grey ">Фітнес</p><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/1657202609306-sM.jpg" alt="Фітнес">
                </div>
                <div class="industry-card spread">
                    <p class="Body color-soft-blue ">FinTech</p><img loading="lazy" src="/wp-content/themes/twentytwentyfour/assets/images/1657202613975-hM.jpg" alt="FinTech">
                </div>
            </div>
        </div>
    </div>
</section>

<?php

get_footer();
