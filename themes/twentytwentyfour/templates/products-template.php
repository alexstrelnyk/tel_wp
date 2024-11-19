<?php
/*
Template Name: Products
*/

get_header();

$t1 = get_label('Продукти та Послуги', 'Products & Services');
$t2 = get_label('НАШІ ПРОДУКТИ ТА ПОСЛУГИ', 'OUR PRODUCTS AND SERVICES');
?>

<section id=":r17:" class="width-wrapper">
    <div class="services-tree bg-white">
        <div class="flex-col sub_parent_0">
            <div id="cards-tree-mob" class=" shelf-content-mob">
                <!-- <p class="Cap color-black medium mb6"><?php echo $t2 ?></p> -->
                <p class="H-mob color-black"><?php echo $t1 ?></p>
            </div>

            <div id="cards-tree" class="shelf-content">
                <p class="H3 color-black  italic"><?php echo $t1 ?></p>
            </div>

            <div class="prod_container">
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

                        <div class="single">
                            <div class="img">
                                <?php if ($image) { ?>
                                    <img loading="lazy" src="<?php echo $image['url'] ?>" alt="<?php echo $image['name'] ?>">
                                <?php } ?>
                            </div>
                            <div class="desc">
                                <div class="main"><?php echo $category->name ?></div>
                                <div><a href="#"><?php echo $category->name ?></a></div>
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
