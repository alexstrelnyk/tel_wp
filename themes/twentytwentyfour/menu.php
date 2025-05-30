<section id=":r1:" class="main-menu">
    <div class="up">
        <div class="main-links">
            <?php

            $green_bg = !in_array(get_post_field('post_name', get_queried_object_id()), [
                'home',
                'home-english',
                'products-services',
                'products-services-en',
            ]);

            $menu_bg_label = 'color-black';
            $menu_bg_class = 'bg-white';
            $small_text_color = 'color-before-black';
            $header_bg = 'bg-transparent';
            $header_bg1 = 'bg-transparent bw1 border-color-white';
            $header_bg2 = 'hover-border-color-white';
            $loc_color = 'white';
            $loc_text = 'navy-green';
            $menu_border = 'bordered-white';
            $menu_bottom_color = 'color-before-navy-black';
            if ($green_bg) {
                $menu_bg_label = 'color-soft-blue';
                $menu_bg_class = 'bg-navy-green';
                $small_text_color = 'color-before-soft-blue';
                $header_bg = 'bg-soft-blue';
                $header_bg1 = 'bg-transparent bw1 border-color-navy-green';
                $header_bg2 = 'hover-border-color-navy-green';
                $loc_color = 'navy-green';
                $loc_text = 'white';
                $menu_border = 'bordered-navy-green';
                $menu_bottom_color = 'color-before-soft-blue';
            }

            // Custom page switcher
            switch (get_post_field('post_name', get_queried_object_id())) {
                case 'products-services':
                    $header_bg = 'bg-navy-green';
                    break;
                case 'products-services-en':
                    $header_bg = 'bg-navy-green';
                    break;
                case 'contact-us':
                    $header_bg = 'bg-light-green';
                    break;
                case 'contact-us-en':
                    $header_bg = 'bg-light-green';
                    break;
                case 'career':
                    $header_bg = 'bg-white';
                    break;
                case 'career-en':
                    $header_bg = 'bg-white';
                    break;
            }


            $menu_object = wp_get_nav_menu_object(pll_current_language() == 'uk' ? 'menu1' : 'menu2');
            $posts = wp_get_nav_menu_items($menu_object->term_id);
            foreach ($posts as $key => $value) {
                if (get_post_meta($value->ID, '_menu_item_type', true) == 'custom') {
                    $url = get_post_meta($value->ID, '_menu_item_url', true);
                    $title = $value->post_title;
                    $image = get_field('image', $value->ID);
                } else {
                    $post_id =  get_post_meta($value->ID, '_menu_item_object_id', true);
                    $url = get_permalink($post_id);
                    $title = $value->post_title ? $value->post_title : get_the_title($post_id);
                    $image = get_field('image', $value->ID);
                }
            ?>
                <div class="link">
                    <a class="" href="<?php echo $url ? $url : 'empty' ?>">
                        <span class="label <?php echo $menu_bg_label ?>" data-cursor="active"><?php echo $title ? $title : 'empty' ?></span>
                        <?php if ($image) { ?>
                            <img loading="lazy" src="<?php echo $image ?>" alt="<?php echo $title ?>" class="main-menu-picture">
                        <?php } ?>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="footer-links">
            <div class="page-links"><a class="Sub2 animated-link " data-cursor="active" href="<?php echo get_url('about-us') ?>"><span class="title"><span data-text="<?php echo get_label('Про нас', 'About us') ?>" class="color-after-bright-green <?php echo $menu_bottom_color ?>"><?php echo get_label('Про нас', 'About us') ?></span></span></a><a class="Sub2 animated-link " data-cursor="active" href="<?php echo get_url('blog') ?>"><span class="title"><span data-text="<?php echo get_label('Блог', 'Blog') ?>" class="color-after-bright-green <?php echo $menu_bottom_color ?>"><?php echo get_label('Блог', 'Blog') ?></span></span></a><a class="Sub2 animated-link " data-cursor="active" href="<?php echo get_url('contact-us') ?>"><span class="title"><span data-text="<?php echo get_label('Контакти', 'Contact Us') ?>" class="color-after-bright-green <?php echo $menu_bottom_color ?>"><?php echo get_label('Контакти', 'Contact Us') ?></span></span></a><a class="Sub2 animated-link " data-cursor="active" href="<?php echo get_url('career') ?>"><span class="title"><span data-text="<?php echo get_label('Вакансії', 'Career') ?>" class="color-after-bright-green <?php echo $menu_bottom_color ?>"><?php echo get_label('Вакансії', 'Career') ?></span></span></a><a class="Sub2 animated-link " data-cursor="active" href="<?php echo get_url('charity') ?>"><span class="title"><span data-text="<?php echo get_label('Благодійність', 'Charity') ?>" class="color-after-bright-green <?php echo $menu_bottom_color ?>"><?php echo get_label('Благодійність', 'Charity') ?></span></span></a></div>
            <div class="follow-links"><a class="None animated-link underlined-link" data-cursor="active" href="https://www.facebook.com/Telesens" target="_blank" rel="noopener noreferrer"><span class="title"><span data-text="Facebook" class="color-after-bright-green <?php echo $menu_bottom_color ?>">Facebook</span></span></a><a class="None animated-link underlined-link" href="https://www.instagram.com/telesens_it/?hl=en" data-cursor="active" target="_blank" rel="noopener noreferrer"><span class="title"><span data-text="Instagram" class="color-after-bright-green <?php echo $menu_bottom_color ?>">Instagram</span></span></a><a class="None animated-link underlined-link" href="https://www.linkedin.com/company/27443/admin/" target="_blank" data-cursor="active" rel="noopener noreferrer"><span class="title"><span data-text="LinkedIn" class="color-after-bright-green <?php echo $menu_bottom_color ?>">LinkedIn</span></span></a><a class="None animated-link underlined-link" href="https://twitter.com/Telesens_IT" target="_blank" data-cursor="active" rel="noopener noreferrer"><span class="title"><span data-text="Twitter" class="color-after-bright-green <?php echo $menu_bottom_color ?>">Twitter</span></span></a></div>
        </div>
        <div class="page-links mob-wrap"><a class="Sub2 animated-link " href="<?php echo get_url('about-us') ?>"><span class="title"><span data-text="<?php echo get_label('Про нас', 'About us') ?>" class="color-after-bright-green <?php echo $menu_bottom_color ?>"><?php echo get_label('Про нас', 'About us') ?></span></span></a><a class="Sub2 animated-link " href="<?php echo get_url('blog') ?>"><span class="title"><span data-text="<?php echo get_label('Блог', 'Blog') ?>" class="color-after-bright-green <?php echo $menu_bottom_color ?>"><?php echo get_label('Блог', 'Blog') ?></span></span></a><a class="Sub2 animated-link " href="<?php echo get_url('contact-us') ?>"><span class="title"><span data-text="<?php echo get_label('Контакти', 'Contact Us') ?>" class="color-after-bright-green <?php echo $menu_bottom_color ?>"><?php echo get_label('Контакти', 'Contact Us') ?></span></span></a><a class="Sub2 animated-link " href="<?php echo get_url('career') ?>"><span class="title"><span data-text="<?php echo get_label('Вакансії', 'Career') ?>" class="color-after-bright-green <?php echo $menu_bottom_color ?>"><?php echo get_label('Вакансії', 'Career') ?></span></span></a><a class="Sub2 animated-link " href="<?php echo get_url('charity') ?>"><span class="title"><span data-text="<?php echo get_label('Благодійність', 'Charity') ?>" class="color-after-bright-green <?php echo $menu_bottom_color ?>"><?php echo get_label('Благодійність', 'Charity') ?></span></span></a></div>
        <div class="follow-links mob-wrap"><a class="None animated-link underlined-link" href="https://www.facebook.com/Telesens" target="_blank" rel="noopener noreferrer"><span class="title"><span data-text="Facebook" class="color-after-bright-green <?php echo $menu_bottom_color ?>">Facebook</span></span></a><a class="None animated-link underlined-link" href="https://www.instagram.com/telesens_it/?hl=en" target="_blank" rel="noopener noreferrer"><span class="title"><span data-text="Instagram" class="color-after-bright-green <?php echo $menu_bottom_color ?>">Instagram</span></span></a><a class="None animated-link underlined-link" href="https://www.linkedin.com/company/27443/admin/" target="_blank" rel="noopener noreferrer"><span class="title"><span data-text="LinkedIn" class="color-after-bright-green <?php echo $menu_bottom_color ?>">LinkedIn</span></span></a><a class="None animated-link underlined-link" href="https://twitter.com/Telesens_IT" target="_blank" rel="noopener noreferrer"><span class="title"><span data-text="Twitter" class="color-after-bright-green <?php echo $menu_bottom_color ?>">Twitter</span></span></a></div>
    </div>
    <div class="menu <?php echo $menu_bg_class ?>" style="left: 0px; top: 0px;"></div>
</section>

<header id=":r0:" class="<?php echo $header_bg ?>">
    <div class="root">
        <a href="<?php echo pll_home_url() ?>" data-cursor="active">
            <svg id="logo" width="152" height="40" viewBox="0 0 152 40" fill="none" xmlns="http://www.w3.org/2000/svg" class="fill-<?php echo $loc_color ?>">
                <path d="M10.5584 2.60049V24.8866H7.74737V2.60049H0V0.00272036H18.2372V2.60049H10.5584Z" fill="white"></path>
                <path d="M27.8376 6.83623C29.7573 6.83623 31.4028 7.31477 32.774 8.20348C34.1452 9.16055 35.1736 10.3911 35.8592 12.0318C36.1335 12.7154 36.3392 13.5357 36.4077 14.4245C36.4763 15.3132 36.4077 16.0651 36.2021 16.612H21.3929C21.3929 18.4578 22.01 19.9618 23.2441 21.0556C24.4782 22.1494 26.1236 22.6963 28.1119 22.7647C30.3744 22.7647 32.4312 22.1494 34.2824 20.8505L35.6536 22.4229C33.3225 24.2003 30.8543 25.1573 28.1119 25.1573C25.3694 25.1573 23.1069 24.2686 21.3929 22.6279C19.6789 20.9189 18.7876 18.7313 18.7876 16.0652C18.7876 13.4674 19.6103 11.2798 21.3244 9.57072C22.9698 7.72494 25.1638 6.83623 27.8376 6.83623ZM27.8376 9.22891C26.0551 9.22891 24.6153 9.77581 23.4497 10.8696C22.2842 11.9634 21.6672 13.2623 21.5301 14.8346H33.871C33.9396 14.2194 33.8024 13.5357 33.4596 12.7838C32.9797 11.69 32.2941 10.8012 31.3342 10.186C30.3058 9.57072 29.2089 9.22891 27.8376 9.22891Z" fill="white"></path>
                <path d="M44.5639 0H41.9592V24.8839H44.5639V0Z" fill="white"></path>
                <path d="M59.0944 6.83623C61.0141 6.83623 62.6596 7.31477 64.0308 8.20348C65.402 9.16055 66.4304 10.3911 67.116 12.0318C67.3903 12.7154 67.5959 13.5357 67.6645 14.4245C67.7331 15.3132 67.6645 16.0651 67.4588 16.612H52.6497C52.6497 18.4578 53.2667 19.9618 54.5008 21.0556C55.7349 22.1494 57.3804 22.6963 59.3686 22.7647C61.6311 22.7647 63.688 22.1494 65.5391 20.8505L66.9103 22.4229C64.5793 24.2003 62.1111 25.1573 59.3686 25.1573C56.6262 25.1573 54.3637 24.2686 52.6497 22.6279C50.9357 20.9189 50.0444 18.7313 50.0444 16.0652C50.0444 13.4674 50.8671 11.2798 52.5811 9.57072C54.2266 7.72494 56.4205 6.83623 59.0944 6.83623ZM59.0944 9.22891C57.3118 9.22891 55.872 9.77581 54.7065 10.8696C53.541 11.9634 52.9239 13.2623 52.7868 14.8346H65.1278C65.1963 14.2194 65.0592 13.5357 64.7164 12.7838C64.2365 11.69 63.5508 10.8012 62.591 10.186C61.5626 9.57072 60.3971 9.22891 59.0944 9.22891Z" fill="white"></path>
                <path d="M79.2542 6.83623H79.6655C81.0368 6.83623 82.3394 7.10968 83.6421 7.72494C84.9447 8.3402 85.9731 9.16055 86.6588 10.1176L85.1504 11.4849C84.6019 10.7329 83.7792 10.0493 82.7508 9.57073C81.7224 9.09219 80.694 8.8871 79.7341 8.8871H79.3913C78.1572 8.8871 77.1288 9.16055 76.3061 9.63909C75.4833 10.1176 75.072 10.8696 75.072 11.69C75.072 12.4419 75.3462 12.9888 75.8947 13.4674C76.4432 13.8776 77.403 14.2194 78.9114 14.3561L81.0368 14.5612C81.8595 14.6295 82.6137 14.7663 83.2307 14.9714C83.8478 15.1764 84.4648 15.4499 85.0818 15.7917C85.6989 16.1335 86.1788 16.6804 86.5216 17.364C86.8644 18.0477 87.0015 18.868 87.0015 19.7567C87.0015 21.3291 86.3845 22.6279 85.0818 23.585C83.7792 24.5421 82.1337 25.0206 80.0769 25.089H79.8027C78.0887 25.089 76.5118 24.7472 75.072 24.0635C73.5637 23.3799 72.5352 22.5596 71.9182 21.4658L73.4265 20.0302C73.9064 20.8505 74.7977 21.5341 75.9633 22.081C77.1974 22.6279 78.4315 22.9014 79.7341 22.9014H79.8712C81.1739 22.9014 82.2709 22.6279 83.0936 22.081C83.9163 21.5341 84.3962 20.7822 84.3962 19.8251C84.3962 19.0731 84.1906 18.3895 83.7792 17.9793C83.3678 17.5008 82.9565 17.2273 82.408 17.0906C81.928 16.9539 81.2424 16.8171 80.4883 16.7488L78.4315 16.5437C74.3864 16.1335 72.3981 14.5612 72.3981 11.8267C72.3981 10.2543 73.0152 9.02383 74.3178 8.13511C75.7576 7.31477 77.3345 6.83623 79.2542 6.83623Z" fill="white"></path>
                <path d="M100.58 6.83623C102.499 6.83623 104.145 7.31477 105.516 8.20348C106.887 9.16055 107.916 10.3911 108.601 12.0318C108.875 12.7154 109.081 13.5357 109.15 14.4245C109.218 15.3132 109.15 16.0651 108.944 16.612H94.1348C94.1348 18.4578 94.7519 19.9618 95.986 21.0556C97.2201 22.1494 98.8655 22.6963 100.854 22.7647C103.116 22.7647 105.173 22.1494 107.024 20.8505L108.395 22.4229C106.064 24.2003 103.596 25.1573 100.854 25.1573C98.1114 25.1573 95.8489 24.2686 94.1348 22.6279C92.4208 20.9189 91.5295 18.7313 91.5295 16.0652C91.5295 13.4674 92.3522 11.2798 94.0663 9.57072C95.7117 7.72494 97.9057 6.83623 100.58 6.83623ZM100.58 9.22891C98.797 9.22891 97.3572 9.77581 96.1917 10.8696C95.0261 11.9634 94.4091 13.2623 94.272 14.8346H106.613C106.681 14.2194 106.544 13.5357 106.202 12.7838C105.722 11.69 105.036 10.8012 104.076 10.186C103.116 9.57072 101.951 9.22891 100.58 9.22891Z" fill="white"></path>
                <path d="M123.619 6.83623C126.019 6.83623 127.938 7.58822 129.31 9.09219C130.681 10.5962 131.366 12.647 131.366 15.3132V24.8839H128.83V15.3815C128.83 13.3307 128.35 11.8267 127.321 10.8012C126.361 9.77581 124.99 9.29728 123.276 9.29728C121.425 9.29728 119.917 9.91254 118.82 11.1431C117.723 12.3736 117.174 14.151 117.174 16.407V24.8839H114.569V7.10968H116.42L116.557 11.1431C117.243 9.70745 118.203 8.61365 119.505 7.93003C120.739 7.17804 122.111 6.83623 123.619 6.83623Z" fill="white"></path>
                <path d="M144.053 6.83623H144.464C145.835 6.83623 147.138 7.10968 148.441 7.72494C149.743 8.3402 150.772 9.16055 151.457 10.1176L149.949 11.4849C149.401 10.7329 148.578 10.0493 147.55 9.57073C146.521 9.09219 145.493 8.8871 144.533 8.8871H144.259C143.025 8.8871 141.996 9.16055 141.173 9.63909C140.351 10.1176 139.939 10.8696 139.939 11.69C139.939 12.4419 140.214 12.9888 140.762 13.4674C141.31 13.8776 142.27 14.2194 143.779 14.3561L145.904 14.5612C146.727 14.6295 147.481 14.7663 148.098 14.9714C148.715 15.1764 149.332 15.4499 149.949 15.7917C150.566 16.1335 151.046 16.6804 151.389 17.364C151.732 18.0477 151.869 18.868 151.869 19.7567C151.869 21.3291 151.252 22.6279 149.949 23.585C148.646 24.5421 147.001 25.0206 144.944 25.089H144.67C142.956 25.089 141.379 24.7472 139.939 24.0635C138.431 23.3799 137.403 22.5596 136.785 21.4658L138.294 20.0302C138.774 20.8505 139.665 21.5341 140.831 22.081C142.065 22.6279 143.299 22.9014 144.601 22.9014H144.739C146.041 22.9014 147.138 22.6279 147.961 22.081C148.784 21.5341 149.264 20.7822 149.264 19.8251C149.264 19.0731 149.058 18.3895 148.646 17.9793C148.235 17.5008 147.824 17.2273 147.275 17.0906C146.795 16.9539 146.11 16.8171 145.356 16.7488L143.299 16.5437C139.254 16.1335 137.265 14.5612 137.265 11.8267C137.265 10.2543 137.882 9.02383 139.185 8.13511C140.556 7.31477 142.133 6.83623 144.053 6.83623Z" fill="white"></path>
                <path d="M11.7926 39.9988C10.7838 39.9988 9.9095 39.6635 9.23695 38.9929C8.56441 38.3223 8.22813 37.4505 8.22813 36.4446C8.22813 35.4387 8.56441 34.5669 9.23695 33.8963C9.9095 33.2257 10.7838 32.8904 11.7926 32.8904C12.5997 32.8904 13.3395 33.0916 13.9448 33.494V34.5669C13.3395 34.1646 12.5997 33.8963 11.8599 33.8963C11.1201 33.8963 10.5148 34.1646 10.044 34.634C9.57322 35.1034 9.3042 35.707 9.3042 36.4446C9.3042 37.1823 9.57322 37.7858 10.044 38.2552C10.5148 38.7247 11.1201 38.9258 11.7926 38.9258C12.4652 38.9258 13.0705 38.7247 13.474 38.3223V35.8411H14.5501V38.7917C14.281 39.127 13.8775 39.3953 13.4067 39.5964C12.8687 39.8647 12.3307 39.9988 11.7926 39.9988Z" fill="white"></path>
                <path d="M23.1558 39.8659H18.3807V33.0257H19.4568V38.86H23.1558V39.8659Z" fill="white"></path>
                <path d="M31.9099 38.9929C31.2374 39.6635 30.4303 39.9988 29.4215 39.9988C28.4127 39.9988 27.6056 39.6635 26.9331 38.9929C26.2605 38.3223 25.9243 37.4505 25.9243 36.4446C25.9243 35.4387 26.2605 34.5669 26.9331 33.8963C27.6056 33.2257 28.4127 32.8904 29.4215 32.8904C30.4303 32.8904 31.2374 33.2257 31.9099 33.8963C32.5825 34.5669 32.9187 35.4387 32.9187 36.4446C32.9187 37.4505 32.5825 38.2552 31.9099 38.9929ZM27.6729 38.2552C28.1437 38.7247 28.6817 38.9929 29.3542 38.9929C30.0268 38.9929 30.6321 38.7247 31.0356 38.2552C31.5064 37.7858 31.7082 37.1823 31.7082 36.4446C31.7082 35.707 31.5064 35.1034 31.0356 34.634C30.5648 34.1646 30.0268 33.8963 29.3542 33.8963C28.6817 33.8963 28.0764 34.1646 27.6729 34.634C27.2021 35.1034 27.0003 35.707 27.0003 36.4446C27.0003 37.1823 27.2694 37.7858 27.6729 38.2552Z" fill="white"></path>
                <path d="M40.1096 39.8659H36.7469V33.0257H39.8406C40.4459 33.0257 40.9839 33.1599 41.3202 33.4952C41.6565 33.7634 41.8582 34.2328 41.8582 34.7022C41.8582 35.0375 41.791 35.3058 41.5892 35.574C41.3874 35.8423 41.1857 35.9764 40.9166 36.1105C41.3202 36.1776 41.7237 36.3787 41.9927 36.7141C42.2617 37.0494 42.3962 37.4517 42.3962 37.9211C42.3962 38.5247 42.1945 38.9941 41.791 39.3294C41.3874 39.6647 40.7821 39.8659 40.1096 39.8659ZM37.8229 33.9646V35.7081H39.7061C40.0423 35.7081 40.3786 35.6411 40.5804 35.507C40.7821 35.3728 40.8494 35.1046 40.8494 34.8364C40.8494 34.5681 40.7821 34.2999 40.5804 34.1658C40.3786 34.0316 40.1096 33.9646 39.7061 33.9646H37.8229ZM37.8229 36.7141V38.86H39.9078C40.3114 38.86 40.6476 38.7929 40.9166 38.5917C41.1857 38.3906 41.2529 38.1223 41.2529 37.787C41.2529 37.4517 41.1184 37.1835 40.9166 36.9823C40.6476 36.7811 40.3786 36.7141 39.9078 36.7141H37.8229Z" fill="white"></path>
                <path d="M46.6239 39.8646H45.4806L48.5071 32.9574H49.5159L52.5424 39.8646H51.399L50.6592 38.1881H47.3638L46.6239 39.8646ZM48.9779 34.2986L47.7 37.1822H50.1885L48.9779 34.2986Z" fill="white"></path>
                <path d="M60.6842 39.8659H55.9091V33.0257H57.0524V38.86H60.6842V39.8659Z" fill="white"></path>
                <path d="M75.554 39.9988C74.4779 39.9988 73.6708 39.7306 72.9983 39.2611V38.1211C73.2673 38.3894 73.6709 38.5905 74.1416 38.7247C74.6124 38.9258 75.0832 38.9929 75.554 38.9929C76.0248 38.9929 76.4283 38.9258 76.6973 38.7247C76.9663 38.5235 77.1681 38.3223 77.1681 37.987C77.1681 37.7188 77.1008 37.5176 76.8318 37.3835C76.7646 37.3164 76.6301 37.2493 76.4956 37.1823C76.2938 37.1152 75.9575 36.9811 75.554 36.847L75.4195 36.7799C75.0159 36.6458 74.7469 36.5787 74.5452 36.5117C74.3434 36.4446 74.1416 36.3105 73.8726 36.1764C73.4018 35.9081 73.1328 35.4387 73.1328 34.7681C73.1328 34.2316 73.3346 33.7622 73.8054 33.4269C74.2761 33.0916 74.8814 32.8904 75.6212 32.8904C76.4283 32.8904 77.1681 33.0916 77.8407 33.4269V34.4999C77.1681 34.0975 76.4283 33.8293 75.6885 33.8293C75.2177 33.8293 74.8814 33.8963 74.6124 34.0975C74.3434 34.2316 74.2761 34.4999 74.2761 34.7011C74.2761 34.9022 74.4107 35.1034 74.6797 35.3046C74.7469 35.3046 74.7469 35.3717 74.8142 35.3717C74.8814 35.3717 74.9487 35.4387 75.0832 35.4387C75.2177 35.4387 75.2177 35.5058 75.285 35.5058L76.092 35.707C76.5628 35.8411 76.9663 36.0423 77.3699 36.2434C77.9752 36.5787 78.3114 37.1152 78.3114 37.8529C78.3114 38.4564 78.0424 38.9929 77.5716 39.3282C76.8991 39.7976 76.2938 39.9988 75.554 39.9988Z" fill="white"></path>
                <path d="M87.5259 38.9929C86.8534 39.6635 86.0463 39.9988 85.0375 39.9988C84.0287 39.9988 83.2216 39.6635 82.5491 38.9929C81.8765 38.3223 81.5402 37.4505 81.5402 36.4446C81.5402 35.4387 81.8765 34.5669 82.5491 33.8963C83.2216 33.2257 84.0287 32.8904 85.0375 32.8904C86.0463 32.8904 86.8534 33.2257 87.5259 33.8963C88.1985 34.5669 88.5347 35.4387 88.5347 36.4446C88.5347 37.4505 88.1985 38.2552 87.5259 38.9929ZM83.3561 38.2552C83.8269 38.7247 84.3649 38.9929 85.0375 38.9929C85.71 38.9929 86.3153 38.7247 86.7188 38.2552C87.1896 37.7858 87.3914 37.1823 87.3914 36.4446C87.3914 35.707 87.1896 35.1034 86.7188 34.634C86.2481 34.1646 85.71 33.8963 85.0375 33.8963C84.3649 33.8963 83.7596 34.1646 83.3561 34.634C82.8853 35.1034 82.6836 35.707 82.6836 36.4446C82.6836 37.1823 82.8853 37.7858 83.3561 38.2552Z" fill="white"></path>
                <path d="M97.0733 39.8659H92.3655V33.0257H93.4415V38.86H97.0733V39.8659Z" fill="white"></path>
                <path d="M100.503 36.9823V33.0257H101.579V37.0494C101.579 37.6529 101.713 38.1894 102.05 38.5247C102.386 38.86 102.789 39.0612 103.395 39.0612C104 39.0612 104.404 38.86 104.74 38.5247C105.076 38.1894 105.211 37.72 105.211 37.0494V33.0257H106.287V36.9823C106.287 37.9211 106.018 38.6588 105.48 39.1953C104.942 39.7318 104.269 40 103.395 40C102.52 40 101.848 39.7318 101.31 39.1953C100.772 38.6588 100.503 37.9211 100.503 36.9823Z" fill="white"></path>
                <path d="M109.644 33.9646V33.0257H115.293V33.9646H113.007V39.8659H111.93V33.9646H109.644Z" fill="white"></path>
                <path d="M119.937 33.0257H118.861V39.8659H119.937V33.0257Z" fill="white"></path>
                <path d="M129.826 38.9929C129.153 39.6635 128.346 39.9988 127.337 39.9988C126.329 39.9988 125.521 39.6635 124.849 38.9929C124.176 38.3223 123.84 37.4505 123.84 36.4446C123.84 35.4387 124.176 34.5669 124.849 33.8963C125.521 33.2257 126.329 32.8904 127.337 32.8904C128.346 32.8904 129.153 33.2257 129.826 33.8963C130.498 34.5669 130.835 35.4387 130.835 36.4446C130.835 37.4505 130.498 38.2552 129.826 38.9929ZM125.589 38.2552C126.06 38.7247 126.598 38.9929 127.27 38.9929C127.943 38.9929 128.548 38.7247 128.951 38.2552C129.422 37.7858 129.624 37.1823 129.624 36.4446C129.624 35.707 129.422 35.1034 128.951 34.634C128.481 34.1646 127.943 33.8963 127.27 33.8963C126.598 33.8963 125.992 34.1646 125.589 34.634C125.118 35.1034 124.916 35.707 124.916 36.4446C124.916 37.1823 125.118 37.7858 125.589 38.2552Z" fill="white"></path>
                <path d="M135.671 39.8659H134.594V33.0257H135.536L139.437 37.9882V33.0257H140.513V39.8659H139.571L135.671 34.9034V39.8659Z" fill="white"></path>
                <path d="M146.706 39.9988C145.63 39.9988 144.823 39.7306 144.151 39.2611V38.1211C144.42 38.3894 144.823 38.5905 145.294 38.7247C145.765 38.9258 146.235 38.9929 146.706 38.9929C147.177 38.9929 147.581 38.9258 147.85 38.7247C148.119 38.5235 148.32 38.3223 148.32 37.987C148.32 37.7188 148.253 37.5176 147.984 37.3835C147.917 37.3164 147.782 37.2493 147.648 37.1823C147.446 37.1152 147.11 36.9811 146.706 36.847L146.572 36.7799C146.168 36.6458 145.899 36.5787 145.697 36.5117C145.496 36.4446 145.294 36.3105 145.025 36.1764C144.554 35.9081 144.285 35.4387 144.285 34.7681C144.285 34.2316 144.487 33.7622 144.958 33.4269C145.428 33.0916 146.034 32.8904 146.774 32.8904C147.581 32.8904 148.32 33.0916 148.993 33.4269V34.4999C148.32 34.0975 147.581 33.8293 146.841 33.8293C146.37 33.8293 146.034 33.8963 145.765 34.0975C145.496 34.2316 145.428 34.4999 145.428 34.7011C145.428 34.9022 145.563 35.1034 145.832 35.3046C145.899 35.3046 145.899 35.3717 145.966 35.3717C146.034 35.3717 146.101 35.4387 146.235 35.4387C146.37 35.4387 146.37 35.5058 146.437 35.5058L147.244 35.707C147.715 35.8411 148.119 36.0423 148.522 36.2434C149.127 36.5787 149.464 37.1152 149.464 37.8529C149.464 38.4564 149.195 38.9929 148.724 39.3282C148.051 39.7976 147.446 39.9988 146.706 39.9988Z" fill="white"></path>
            </svg>
        </a>
        <div class="frc gap32">
            <div class="locale-btn bg-transparent bw1 border-color-<?php echo $loc_color ?>" data-cursor="active" onclick="goto('<?php echo get_permalink(pll_get_post(get_the_ID(), pll_current_language() == 'en' ? 'uk' : 'en')) ?>')">
                <input class="hover-border-color-<?php echo $loc_color ?>" type="checkbox" autocomplete='off' <?php echo pll_current_language() == 'en' ? 'checked' : '' ?>>
                <div data-left="UA" data-right="EN" class="knobs color-before-<?php echo $loc_text ?> bg-before-<?php echo $loc_color ?>"></div>
                <div data-left="UA" data-right="EN" class="labels color-before-<?php echo $loc_color ?> color-after-<?php echo $loc_color ?>"></div>
            </div>
            <div id="header-menu">
                <div class="menu-button <?php echo $menu_bg_class . ' ' . $menu_border ?>" style="transition: all 0.75s ease-out 0s;" data-cursor="active">
                    <div class="menu-bar" style="transition: all 0.75s ease-out 0s;">
                        <div class="menu-check "><span class="contrast-<?php echo $menu_bg_class ?>"></span><span class="contrast-<?php echo $menu_bg_class ?>"></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>