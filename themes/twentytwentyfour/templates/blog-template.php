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
                <p class="Sub color-black  mv12">Закладки</p><a class="flex-row align-center gap8 mb12" href="#ТЕЛЕСЕНС ІНСАЙТИ">
                    <p class="Body color-grey ">ТЕЛЕСЕНС ІНСАЙТИ</p>
                </a><a class="flex-row align-center gap8 mb12" href="#ТЕЛЕСЕНС НОВИНИ">
                    <p class="Body color-grey ">ТЕЛЕСЕНС НОВИНИ</p>
                </a>
            </div>
        </div>
        <div class="flex-col blog-content">
            <p class="H3 color-black  italic mb32">Блог</p>
            <div class="module-container type-head bg-transparent">
                <p class="Sub color-transparent anchor-name" id="ТЕЛЕСЕНС ІНСАЙТИ"></p>
            </div>
            <div class="module-container type-paragraph bg-transparent">
                <p class="Body color-grey  text-left"><span class="inh  H4">ТЕЛЕСЕНС - ІНСАЙТИ</span></p>
            </div>

            <?php
            $args = array(
                'post_type'      => 'post',
                'category_name'  => 'blog',
                'orderby'        => 'date',
                'order'          => 'DESC',
                'posts_per_page' => 50,     
            );

            $posts = get_posts($args);

            foreach ($posts as $post) {
                setup_postdata($post);
            ?>
                <div class="module-container type-linkedImage">
                    <img loading="lazy" src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo basename(get_the_post_thumbnail_url()) ?>">
                </div>
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

            <div class="module-container type-head">
                <p class="Sub color- anchor-name" id="ТЕЛЕСЕНС НОВИНИ"></p>
            </div>
            <div class="module-container type-paragraph">
                <p class="Body color-grey  text-left"><span class="inh  H4">ТЕЛЕСЕНС - НОВИНИ </span></p>
            </div>
            <div class="module-container type-paragraph">
                <p class="Body color-  text-left"><a href="https://telesens.ua/charity" target="_blank" class="inh Link">Благодійність</a>

                    ● <a href="https://helpingdoctors.telesens.co.uk/ua/?lang=ua" target="_blank" class="inh Link">Допомога лікарям</a>
                    ● <a href="https://helpingschoolchildren.telesens.co.uk" target="_blank" class="inh Link">Допомога школярам</a>
                    ● <a href="https://helpingangels.telesens.co.uk/?lang=ua" target="_blank" class="inh Link">Допомога янголам</a></p>
            </div>

            <?php
            $args = array(
                'post_type'      => 'post',
                'category_name'  => 'news',
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

<?php
// echo get_post_field('post_content', get_queried_object_id());

get_footer();
