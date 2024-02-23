<div class="flex-col sub_parent sub_parent_<?php echo $level ?>">
    <div id="cards-tree" class="shelf-content <?php echo $level % 2 === 0 ? 'bg-yellow' : 'bg-light-blue' ?>"></div>
    <div class="slider-container <?php echo $level % 2 === 0 ? 'bg-yellow' : 'bg-light-blue' ?>">
        <div class="slider-side-bar <?php echo $level % 2 === 0 ? 'bg-yellow' : 'bg-light-blue' ?>">
            <p class="Sub color-black "><?php echo $cat_title ?></p>
        </div>
        <div class="services-slider" style="transform: translateX(0px);">
            <?php
            foreach ($categories as $key => $category) {
                $image = get_field('category_image', 'category_' . $category->cat_ID);
                $categories = get_categories(['parent' => $category->cat_ID]);
            ?>

                <div class="services-card <?php echo $level % 2 === 0 ? 'light-blue' : 'yellow' ?> <?php echo count($categories) ? '' : 'ending' ?>" onclick="getProducts(this, <?php echo $level ?>)" data-cat_id="<?php echo $category->cat_ID ?>" data-cat_title="<?php echo $category->cat_name ?>">
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