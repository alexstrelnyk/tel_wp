<?php
/*
Template Name: Products
*/

get_header();

$t1 = get_label('Продукти та Послуги', 'Products & Services');
$t2 = get_label('НАШІ ПРОДУКТИ ТА ПОСЛУГИ', 'OUR PRODUCTS AND SERVICES');
?>

<section id=":r17:" class="width-wrapper">
    <div class="services-tree">
        <div class="flex-col sub_parent_0">
            <div id="cards-tree-mob" class="bg-midnight-blue shelf-content-mob">
                <p class="Cap color-white medium mb6"><?php echo $t2 ?></p>
                <p class="H-mob color-white  mb32"><?php echo $t1 ?></p>
            </div>

            <div id="cards-tree" class="shelf-content bg-midnight-blue">
                <p class="H3 color-white  italic"><?php echo $t1 ?></p>
            </div>

            <div class="slider-container bg-midnight-blue">
                <div class="slider-side-bar bg-midnight-blue">
                    <p class="Sub color-white "><?php echo $t2 ?></p>
                </div>
                <div class="services-slider" style="transform: translateX(0px);">

                    <?php

                    $categories = get_terms([
                        'taxonomy' => 'category',
                        'slug' => $category_order,
                        'hide_empty' => false,
                    ]);

                    $sorted_categories = sort_categories_by_slugs($categories, $category_order);
                    if (!empty($categories)) {
                        foreach ($sorted_categories as $category) {
                            $image = get_field('category_image', 'category_' . $category->term_id);
                    ?>
                            <div id="cat_slug_<?php echo $category->slug ?>" class="services-card light-blue" onclick="getProducts(this, 0)" data-cat_id="<?php echo $category->term_id ?>" data-cat_title="<?php echo $category->cat_name ?>" data-cat_slug="<?php echo $category->slug ?>">
                                <?php if ($image) { ?>
                                    <div class="image"><img loading="lazy" src="<?php echo $image['url'] ?>" alt="<?php echo $image['name'] ?>"></div>
                                <?php } ?>
                                <div class="desc">
                                    <p class="H5 color-white  bold"><?php echo $category->name ?></p>
                                    <p class="H6 color-white medium"></p>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('parts/form') ?>

<?php get_template_part('parts/feedback-slider') ?>

<script>
    var parentCatSlugs = false;
    var postId = false;
    var redirectBlocked = false;
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
                redirectBlocked = true;
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
