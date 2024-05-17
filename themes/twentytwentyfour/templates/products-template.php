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

                    $categories = get_categories(['parent' => 0]);

                    if (!empty($categories)) {
                        foreach ($categories as $category) {
                            if (in_array($category->slug, [
                                'blog',
                                'blog-en',
                                'news',
                                'news-en',
                                'client_feedback',
                                'client_feedback-en',
                                'career',
                                'career-en',
                                'uncategorized-uk',
                                'uncategorized-en',
                                'gallery',
                                'gallery-en',
                                'regions',
                                'regions-en',
                                'charity',
                                'charity-en',
                                'helping',
                                'helping-en',
                            ])) {
                                continue;
                            }

                            $image = get_field('category_image', 'category_' . $category->cat_ID);
                    ?>
                            <div id="cat_slug_<?php echo $category->slug ?>" class="services-card light-blue" onclick="getProducts(this, 0)" data-cat_id="<?php echo $category->cat_ID ?>" data-cat_title="<?php echo $category->cat_name ?>" data-cat_slug="<?php echo $category->slug ?>">
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
                var redirectBlocked = true;
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
