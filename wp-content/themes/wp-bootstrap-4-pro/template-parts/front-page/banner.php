<?php
global $post;
$page_id = $post->ID;
?>
<section class="jumbotron text-center wp-bs-4-jumbotron border-bottom text-white homepage-banner">
    <div class="wp-bp-jumbo-overlay">
        <div class="container-fluid banner-container-fluid p-0">
            <?php $banners = get_field( "banners",$page_id ); ?>
            <div id="banner-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php foreach($banners as $index => $banner_item):  ?>
                        <div class="carousel-item <?php if ($index == 0): ?> active <?php endif; ?>">
                            <img class="d-block w-100" src="<?php echo $banner_item['image'] ?>" alt="banner"/>
                            <?php if(!empty($banner_item['header'])): ?>
                            <p class="banner-header">
                                <?php echo $banner_item['header']; ?>
                            </p>
                            <?php endif; ?>
                            <?php if(!empty($banner_item['description'])): ?>
                            <p class="banner-desc">
                                <?php echo $banner_item['description']; ?>
                            </p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a class="carousel-control-prev" href="#banner-carousel" data-slide="prev">
                    <span class="carousel-control-prev-icon"> < </span>
                </a>
                <a class="carousel-control-next" href="#banner-carousel" data-slide="next">
                    <span class="carousel-control-next-icon"> > </span>
                </a>
            </div>
        </div>
    </div>
</section>

