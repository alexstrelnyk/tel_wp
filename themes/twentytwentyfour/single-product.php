<div class="flex-col sub_parent sub_parent_<?php echo $level ?>">
    <div id="cards-tree" class="shelf-content <?php echo $level % 2 === 0 ? 'bg-yellow' : 'bg-light-blue' ?>"></div>
    <div class="slider-container <?php echo $level % 2 === 0 ? 'bg-yellow' : 'bg-light-blue' ?>">
        <div class="slider-side-bar <?php echo $level % 2 === 0 ? 'bg-yellow' : 'bg-light-blue' ?>">
            <p class="Sub color-black "><?php echo $cat_title ?></p>
        </div>
        <div class="services-slider" style="transform: translateX(0px);">
            <?php
            $is_last_row = true;
            foreach ($categories as $cat_key => $cat_val) {
                if ($is_last_row) {
                    $sub_cat = get_categories(['parent' => $cat_val->cat_ID]);
                    $is_last_row = !count($sub_cat) ? true : false;
                }
            }
            foreach ($categories as $key => $category) {
                $image = get_field('category_image', 'category_' . $category->cat_ID);
                $sub_categories = get_categories(['parent' => $category->cat_ID]);
                $sc_class = '';
                if ($level % 2 === 0) {
                    $sc_class .= ' light-blue';
                } else {
                    $sc_class .= ' yellow';
                }
                if (!count($sub_categories)) {
                    $sc_class .= ' ending';
                }
                if ($is_last_row) {
                    $sc_class .= ' square';
                }
            ?>

                <div id="cat_slug_<?php echo $category->slug ?>" class="services-card <?php echo $sc_class ?>" onclick="getProducts(this, <?php echo $level ?>)" data-cat_id="<?php echo $category->cat_ID ?>" data-cat_title="<?php echo $category->cat_name ?>" data-cat_slug="<?php echo $category->slug ?>">
                    <?php if ($image) { ?>
                        <div class="image"><img loading="lazy" src="<?php echo $image['url'] ?>" alt="<?php echo $image['name'] ?>"></div>
                    <?php } ?>
                    <div class="desc">
                        <p class="H5 color-black  bold"><?php echo $category->name ?></p>
                        <p class="H6 color-black medium"></p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>