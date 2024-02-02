<section id=":rk:" class="main-menu">
    <div class="up">
        <div class="main-links">

            <?php
            $posts = get_posts(['post_type' => 'nav_menu_item', 'number_posts' => -1, 'orderby' => 'menu_order', 'order' => 'ASC']);
            foreach ($posts as $key => $value) {
                if (get_post_meta($value->ID, '_menu_item_type', true) == 'custom'){
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
                    <a class="" href="<?php echo $url ?>">
                        <span class="label color-black"><?php echo $title ?></span>
                        <?php if ($image) { ?>
                            <img loading="lazy" src="<?php echo $image ?>" alt="<?php echo $title ?>" class="main-menu-picture">
                        <?php } ?>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="page-links">
            <a class="Body animated-link " href="/about-us">
                <span class="title">
                    <span data-text="Про нас" class="color-after-bright-green color-before-black">Про нас</span>
                </span>
            </a>
            <a class="Body animated-link " href="/blog">
                <span class="title">
                    <span data-text="Блог" class="color-after-bright-green color-before-black">Блог</span>
                </span>
            </a>
            <a class="Body animated-link " href="/contact-us">
                <span class="title">
                    <span data-text="Контакти" class="color-after-bright-green color-before-black">Контакти</span>
                </span>
            </a>
            <a class="Body animated-link " href="/career">
                <span class="title">
                    <span data-text="Вакансії" class="color-after-bright-green color-before-black">Вакансії</span>
                </span>
            </a>
            <a class="Body animated-link " href="/charity">
                <span class="title">
                    <span data-text="Благодійність" class="color-after-bright-green color-before-black">Благодійність</span>
                </span>
            </a>
        </div>
        <div class="follow-links">
            <a class="None animated-link underlined-link" href="https://www.facebook.com/Telesens" target="_blank" rel="noopener noreferrer">
                <span class="title">
                    <span data-text="Facebook" class="color-after-bright-green color-before-black">Facebook</span>
                </span>
            </a>
            <a class="None animated-link underlined-link" href="https://www.instagram.com/telesens_it/?hl=en" target="_blank" rel="noopener noreferrer">
                <span class="title">
                    <span data-text="Instagram" class="color-after-bright-green color-before-black">Instagram</span>
                </span>
            </a>
            <a class="None animated-link underlined-link" href="https://www.linkedin.com/company/27443/admin/" target="_blank" rel="noopener noreferrer">
                <span class="title">
                    <span data-text="LinkedIn" class="color-after-bright-green color-before-black">LinkedIn</span>
                </span>
            </a>
            <a class="None animated-link underlined-link" href="https://twitter.com/Telesens_IT" target="_blank" rel="noopener noreferrer">
                <span class="title">
                    <span data-text="Twitter" class="color-after-bright-green color-before-black">Twitter</span>
                </span>
            </a>
        </div>
    </div>
    <div class="menu bg-white" style="left: 0px; top: 0px;"></div>
</section>