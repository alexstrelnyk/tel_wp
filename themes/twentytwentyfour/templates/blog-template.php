<?php
/*
Template Name: blog
*/
get_header();

?>

<section data=":rr:" id="blog-section" class="blog-view frc bg-soft-blue">
    <div class="container">
        <div class="blog-side-bar">
            <div class="">
                <p class="Sub color-black  mv12"><?php echo get_label('Закладки', 'Bookmarks') ?></p><a class="flex-row align-center gap8 mb12" href="#ТЕЛЕСЕНС ІНСАЙТИ">
                    <p class="Body color-grey "><?php echo get_label('ТЕЛЕСЕНС ІНСАЙТИ', 'TELESENS INSIGHTS') ?></p>
                </a><a class="flex-row align-center gap8 mb12" href="#ТЕЛЕСЕНС НОВИНИ">
                    <p class="Body color-grey "><?php echo get_label('ТЕЛЕСЕНС НОВИНИ', 'TELESENS NEWS') ?></p>
                </a>
            </div>
        </div>
        <div class="flex-col blog-content">
            <p class="H3 color-black  italic mb32"><?php echo get_label('Блог', 'Blog') ?></p>
            <div class="module-container type-head bg-transparent">
                <p class="Sub color-transparent anchor-name" id="ТЕЛЕСЕНС ІНСАЙТИ"></p>
            </div>
            <div class="module-container type-paragraph bg-transparent">
                <p class="Body color-grey  text-left"><span class="inh  H4"><?php echo get_label('ТЕЛЕСЕНС ІНСАЙТИ', 'TELESENS INSIGHTS') ?></span></p>
            </div>

            <?php
            $args = array(
                'post_type'      => 'post',
                'category_name'  => get_label('blog', 'blog-en'),
                'orderby'        => 'date',
                'order'          => 'DESC',
                'posts_per_page' => 50,
            );

            $posts = get_posts($args);

            foreach ($posts as $post) {
                setup_postdata($post);
            ?>
                <div class="module-container type-linkedImage">
                    <a href="<?php the_permalink(); ?>" target="_blank">
                        <img loading="lazy" src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo basename(get_the_post_thumbnail_url()) ?>">
                    </a>
                </div>
                <div class="module-container type-paragraph">
                    <p class="Body color-  text-left">
                        <a href="<?php the_permalink(); ?>" target="_blank" class="inh Link"><?php the_title(); ?></a>
                        <br>
                        <br>
                        <?php echo get_field('description'); ?>
                    </p>
                </div>
                <br>
                <br>
            <?php
            }
            wp_reset_postdata();
            ?>

            <div class="module-container type-head">
                <p class="Sub color- anchor-name" id="ТЕЛЕСЕНС НОВИНИ"></p>
            </div>
            <div class="module-container type-paragraph">
                <p class="Body color-grey  text-left"><span class="inh  H4"><?php echo get_label('ТЕЛЕСЕНС НОВИНИ', 'TELESENS NEWS') ?></span></p>
            </div>
            <div class="module-container type-paragraph">
                <p class="Body color-  text-left"><a href="https://telesens.ua/charity" target="_blank" class="inh Link"><?php echo get_label('Благодійність', 'Charity') ?></a>

                    ● <a href="https://helpingdoctors.telesens.co.uk/ua/?lang=ua" target="_blank" class="inh Link"><?php echo get_label('Допомога лікарям', 'Helping doctors') ?></a>
                    ● <a href="https://helpingschoolchildren.telesens.co.uk" target="_blank" class="inh Link"><?php echo get_label('Допомога школярам', 'Helping schoolchildren') ?></a>
                    ● <a href="https://helpingangels.telesens.co.uk/?lang=ua" target="_blank" class="inh Link"><?php echo get_label('Допомога янголам', 'Helping Angels') ?></a></p>
            </div>

            <?php
            $args = array(
                'post_type'      => 'post',
                'category_name'  => get_label('news', 'news-en'),
                'orderby'        => 'date',
                'order'          => 'DESC',
                'posts_per_page' => 50,
            );

            $posts = get_posts($args);

            foreach ($posts as $post) {
                setup_postdata($post);
            ?>
                <div class="module-container type-paragraph">
                    <p class="Body color-  text-left">

                        <a href="<?php the_permalink(); ?>" target="_blank" class="inh Link"><?php the_title(); ?></a>

                        <?php echo get_field('description'); ?>
                    </p>
                </div>
            <?php
            }
            wp_reset_postdata();
            ?>
            <div class="block-spacer" style="height: 0px;"></div>
        </div>
    </div>
</section>
<section id=":r2:" class="width-wrapper">
    <div class="blog-preview frc bg-soft-blue">
        <div class="container">
            <div class="side f3 flex column">
                <p class="Sub2 color-black "><?php echo get_label('Слідкуйте за нами', 'Follow us') ?></p>
            </div>
            <div class="side f7 flex column">
                <p class="H3 color-black  italic"><?php echo get_label('Підписуйтеся на наші оновлення', 'Subscribe to our updates') ?></p>
                <p class="Body color-black "></p>
                <p class="Body color-black "></p>
            </div>
            <div class="f2"></div>
        </div>
    </div>
</section>
<section id=":r10:" class="width-wrapper">
    <div class="subscribe-form bg-soft-blue">
        <?php
        $form = get_label('[contact-form-7 id="c0d1b39" title="Subscribe uk"]', '[contact-form-7 id="e8661ec" title="Subscribe en"]');
        echo do_shortcode($form);
        ?>
    </div>
</section>

<?php

get_footer();
