<?php
/*
  Template Name: Menu
 */

get_header('default');
get_template_part( 'template-parts/default/banner' );

?>

<?php if ( get_theme_mod( 'show_main_content', 1 ) ) : ?>
 <!-- This Month Pick Section -->
<section class="wp-bp-main-content signature-boba">
    <div class="container-fluid">
        <div class="row justify-content-center signature-boba-row">
            <div class="col-md-12">
                <h1 class="text-center mb-4 header">This Months Picks!</h1>
                <p class="mb-0 text-desc text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices
                </p>
            </div>
        </div>
        <div class="row justify-content-center signature-boba-row signature-boba-items">
            <div class="col-md-4">
                <h3 class="text-center mb-4 item-desc">Lorem ipsum</h3>
                <p class="mb-0 text-desc text-center">
                    <img src="http://popbatee.test/wp-content/uploads/2022/07/Image_9_df.png" alt="boba-signature"/>
                </p>
            </div>
            <div class="col-md-4">
                <p class="mb-0 text-desc text-center">
                    <img src="http://popbatee.test/wp-content/uploads/2022/07/Image_9_df.png" alt="boba-signature"/>
                </p>
                <h3 class="text-center mb-4 item-desc">Lorem ipsum</h3>
            </div>
            <div class="col-md-4">
                <h3 class="text-center mb-4 item-desc">Lorem ipsum</h3>
                <p class="mb-0 text-desc text-center">
                    <img src="http://popbatee.test/wp-content/uploads/2022/07/Image_9_df.png" alt="boba-signature"/>
                </p>
            </div>
        </div>
        <div class="row justify-content-center signature-row">
            <div class="col-md-12">
                <p class="see-menu-btn text-center">
                    <a href="#" target="_blank" class="btn-link">
                        <img src="<?php echo esc_url( get_template_directory_uri() .'/assets/images/boba_menu_btn.svg'); ?>" alt="boba Menu button" />
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- Order Online Section -->
<section class="wp-bp-main-content page-menu order-online">
    <div class="container">
        <div class="row justify-content-center order-online-row">
            <div class="col-md-12">
                <h1 class="text-center mb-4 header">Order Online</h1>
                <p class="mb-0 text-desc text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices</p>
            </div>
        </div>
        <div class="row justify-content-center order-online-row">
            <div class="col-md-6">
                <p class="text-right">
                    <a href="#" target="_blank" class="btn-link">
                        <img src="<?php echo esc_url( get_template_directory_uri() .'/assets/images/order_pickup_btn.svg'); ?>" alt="order pickup button" />
                    </a>
                </p>
            </div>
            <div class="col-md-6">
                <p class="text-left">
                    <a href="#" target="_blank" class="btn-link">
                        <img src="<?php echo esc_url( get_template_directory_uri() .'/assets/images/order_delivery_btn.svg'); ?>" alt="order delivery Menu button" />
                    </a>
                </p>
            </div>
        </div>
        <div class="row justify-content-center order-online-row">
            <div class="col-md-6">
                <p class="text-right">
                    <a href="#" target="_blank" class="btn-link">
                        <img src="<?php echo esc_url( get_template_directory_uri() .'/assets/images/uber_eat_btn.svg'); ?>" alt="uber eat button" />
                    </a>
                </p>
            </div>
            <div class="col-md-6">
                <p class="text-left">
                    <a href="#" target="_blank" class="btn-link">
                        <img src="<?php echo esc_url( get_template_directory_uri() .'/assets/images/doordash_btn.svg'); ?>" alt="doordash Menu button" />
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- list menu items Section - list 1 -->
<section class="wp-bp-main-content list-menu-item-1">
    <div class="container-fluid p-5">
        <div class="row justify-content-center list-menu-item-1-row">
            <div class="col-md-12">
                <h1 class="text-center mb-4 header">Milk Tea</h1>
            </div>
        </div>
        <div class="row list-menu-item-1-row">
            <div class="container-fluid p-5">
                <div class="row">
                 <?php
                     if ( get_query_var( 'paged' ) ) {
                         $paged = get_query_var( 'paged' );
                     } else if ( get_query_var( 'page' ) ) {
                         // This will occur if on front page.
                         $paged = get_query_var( 'page' );
                     } else {
                         $paged = 1;
                     }
                     $my_query = new WP_Query( array(
                         'post_type'           => 'menu_items',
                         'posts_per_page'      => 8,
                         'paged'               => $paged,
                         'orderby'        => 'id',
                         'order'          => 'ASC' ,
                         'tax_query' => array(
                             array (
                                 'taxonomy' => 'groups',
                                 'field' => 'slug',
                                 'terms' => array('milk-tea'),
                             )
                         ),
                     ) );
                     $total_pages = $my_query->max_num_pages;
                 ?>
                <?php if (have_posts()) : ?>
                    <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                        <div class="col-md-3">
                             <?php if (has_post_thumbnail()): ?>
                              <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                                 <div class="menu-item-image">
                                     <img class="img-fluid" src="<?php echo $featured_img_url; ?>" />
                                 </div>
                             <?php endif; ?>
                            <h3><?php the_title(); ?></h3>
                            <p><?php the_content(); ?> </p>
                        </div>
                        <?php
                    endwhile;
                else: ?>
                    <p>Nothing Found</p>
                <?php endif; ?>
                </div>
                <div class="row">
                    <div class="col-md-12 justify-content-center">
                    <!-- Specify justify-content-end to align to the right -->
                    <?php echo bootstrap_pagination($my_query); ?>
                    <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- list menu items Section - list 2 -->
<section class="wp-bp-main-content list-menu-item-2">
    <div class="container-fluid p-5">
        <div class="row justify-content-center list-menu-item-2-row">
            <div class="col-md-12">
                <h1 class="text-center mb-4 header">Waffles</h1>
            </div>
        </div>
        <div class="row list-menu-item-2-row">
            <div class="container-fluid p-5">
                <div class="row">
                    <?php
                        if ( get_query_var( 'paged' ) ) {
                            $paged = get_query_var( 'paged' );
                        } else if ( get_query_var( 'page' ) ) {
                            // This will occur if on front page.
                            $paged = get_query_var( 'page' );
                        } else {
                            $paged = 1;
                        }
                        $my_query = new WP_Query( array(
                            'post_type'           => 'menu_items',
                            'posts_per_page'      => 8,
                            'paged'               => $paged,
                            'orderby'        => 'id',
                            'order'          => 'ASC' ,
                            'tax_query' => array(
                                array (
                                    'taxonomy' => 'groups',
                                    'field' => 'slug',
                                    'terms' => array('milk-tea'),
                                )
                            ),
                        ) );
                        $total_pages = $my_query->max_num_pages;
                    ?>
                    <?php if (have_posts()) : ?>
                        <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                            <div class="col-md-3">
                                <?php if (has_post_thumbnail()): ?>
                                    <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                                    <div class="menu-item-image">
                                        <img  class="img-fluid" src="<?php echo $featured_img_url; ?>" />
                                    </div>
                                <?php endif; ?>
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_content(); ?> </p>
                            </div>
                        <?php
                        endwhile;
                    else: ?>
                        <p>Nothing Found</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 justify-content-center">
                <!-- Specify justify-content-end to align to the right -->
                <?php echo bootstrap_pagination($my_query); ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php
get_footer('custom');
?>
