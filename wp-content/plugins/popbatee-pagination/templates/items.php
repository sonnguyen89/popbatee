<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="menu-item p-3">
        <?php if (has_post_thumbnail()): ?>
            <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
            <div class="menu-item-image">
                <img class="img-fluid" src="<?php echo $featured_img_url; ?>"/>
            </div>
        <?php endif; ?>
        <div class="item-content w-75 ml-3 mt-3">
            <h3><?php the_title(); ?></h3>
            <p class="desc"><?php echo wp_strip_all_tags(get_the_content()); ?> </p>
            <?php $price = get_field("price", get_the_ID()); ?>
            <?php if (!empty($price)) : ?>
                <p class="price">$<?php echo $price; ?> </p>
            <?php endif; ?>
        </div>
    </div>
</div>