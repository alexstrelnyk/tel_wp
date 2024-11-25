<?php
/*
Template Name: Products
*/

get_header();

?>

<section id=":r17:" class="width-wrapper">
    <div class="services-tree bg-white">
        <div class="flex-col sub_parent_0">
            <div id="cards-tree-mob" class=" shelf-content-mob">
                <p class="H-mob color-black"><?php echo get_the_title() ?></p>
            </div>

            <div id="cards-tree" class="shelf-content">
                <p class="H3 color-black  italic"><?php echo get_the_title() ?></p>
            </div>

            <div class="prod_container">
                <?php

                if ($subpages = get_pages(['parent' => get_the_ID(), 'sort_column' => 'menu_order'])) {
                    foreach ($subpages as $key => $subpage) {
                        if ($key && ($key % 2 == 0)) {
                            echo '</div><div class="prod_container">';
                        }
                        $page_image = get_field('page_image', $subpage->ID);

                        $page_title = esc_html($subpage->post_title);
                        $page_url = get_permalink($subpage->ID);
                ?>
                        <div class="single">
                            <div class="img">
                                <?php if ($page_image) { ?>
                                    <img loading="lazy" src="<?php echo $page_image['url'] ?>" alt="<?php echo $page_image['name'] ?>">
                                <?php } ?>
                            </div>
                            <div class="desc">
                                <div class="main"><?php echo $page_title ?></div>
                                <?php

                                if ($sub_pages = get_pages(['parent' => $subpage->ID, 'sort_column' => 'menu_order'])) {
                                    foreach ($sub_pages as $sub_page) {
                                        if ($sub_pages2 = get_pages(['parent' => $sub_page->ID, 'sort_column' => 'menu_order'])) {
                                ?>
                                            <div class="sub_page_title"><?php echo esc_html($sub_page->post_title) ?></div>

                                            <?php
                                            foreach ($sub_pages2 as $sub_page2) {
                                            ?>
                                                <div class="sub_page_link"><a data-cursor="active" href="<?php echo get_permalink($sub_page2->ID) ?>"><?php echo esc_html($sub_page2->post_title) ?></a></div>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <div><a data-cursor="active" href="<?php echo get_permalink($sub_page->ID) ?>"><?php echo esc_html($sub_page->post_title) ?></a></div>
                                <?php
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('parts/form') ?>

<?php get_template_part('parts/feedback-slider') ?>

<script>
    var parentCatSlugs = false;
    var postId = false;
</script>

<?php

$parent_cat_slugs = [];
function get_parent_cat($cat_id, $parent_cat_slugs)
{
    $cat_slug = false;
    if ($category = get_term($cat_id, 'category')) {
        $cat_slug = $category->slug;
    }
    $parent_cat_slugs[] = $cat_slug;

    if ($category && $category->parent != 0) {
        $parent_cat_slugs = get_parent_cat($category->parent, $parent_cat_slugs);
    }

    return $parent_cat_slugs;
}

if (isset($_GET['post_slug']) && $_GET['post_slug']) {
    $post_slug = $_GET['post_slug'];

    if ($post = get_page_by_path($post_slug, OBJECT, 'post')) {

        if ($categories = get_the_category($post->ID)) {
            $parent_cat_slugs[] = $categories[0]->slug;
            $parent_cat_slugs = array_reverse(get_parent_cat($categories[0]->parent, $parent_cat_slugs));
?>
            <script>
                var parentCatSlugs = JSON.parse('<?php echo json_encode($parent_cat_slugs) ?>');
            </script>
    <?php
        }
    }
}
if (isset($_GET['cat_slug']) && $_GET['cat_slug']) {
    ?>
    <script>
        $(document).ready(function() {
            $('#cat_slug_<?php echo $_GET['cat_slug'] ?>').click();
        });
    </script>
<?php
}
get_footer();
