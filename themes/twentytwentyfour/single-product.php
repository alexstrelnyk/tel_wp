<div class="flex-col sub-parent">
    <div id="cards-tree" class="shelf-content bg-light-blue"></div>
    <div class="slider-container bg-light-blue">
        <div class="slider-side-bar bg-light-blue">
            <p class="Sub color-black "><?php echo $cat_title?></p>
        </div>
        <div class="services-slider" style="transform: translateX(0px);">
            <?php
            foreach ($categories as $key => $category) {
                $label = '';
                if ($key == 0) {
                    $label = 'selected';
                }
                $image = get_field('category_image', 'category_' . $category->cat_ID);
            ?>

                <div class="services-card yellow <?php echo $label ?>">
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