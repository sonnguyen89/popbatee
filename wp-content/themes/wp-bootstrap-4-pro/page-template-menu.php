<?php
/*
  Template Name: Menu
 */

get_header('default');
get_template_part('template-parts/menu/banner');
global $post;
$page_id = $post->ID;
?>

<?php if (get_theme_mod('show_main_content', 1)) : ?>
    <!-- This Month Pick Section -->
    <?php $this_pick_header = get_field('this_pick_header'); ?>
    <?php $this_pick_description = get_field('this_pick_description'); ?>
    <?php $this_pick_items = get_field('this_pick_items'); ?>
    <?php $boba_menu_url = get_field('boba_menu_url'); ?>
    <?php $boba_menu_url = !empty($boba_menu_url) ? $boba_menu_url : '#' ?>
    <section class="wp-bp-main-content signature-boba">
        <div class="container-fluid">
            <div class="row justify-content-center signature-boba-row">
                <div class="col-md-12">
                    <h1 class="text-center mb-4 header"><?php echo $this_pick_header; ?></h1>
                    <p class="mb-0 text-desc text-center"><?php echo $this_pick_description ?>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center signature-boba-row signature-boba-items">
                <?php foreach($this_pick_items as $index=>$item):  ?>
                <div class="col-md-4">
                    <?php if (($index % 2) == 0): ?>
                        <h3 class="text-center mb-4 item-desc"><?php echo $item['item_name']; ?></h3>
                    <?php endif; ?>
                    <p class="mb-0 text-desc text-center">
                        <img src="<?php echo $item['item_image'] ?>" alt="boba-signature"/>
                    </p>
                    <?php if (($index % 2) != 0): ?>
                        <h3 class="text-center mb-4 item-desc"><?php echo $item['item_name']; ?></h3>
                        <h3 class="text-center mb-4 item-desc mobile"><?php echo $item['item_name']; ?></h3>
                    <?php else: ?>
                        <h3 class="text-center mb-4 item-desc mobile"><?php echo $item['item_name']; ?></h3>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="row justify-content-center signature-boba-row">
                <div class="col-md-12">
                    <p class="see-menu-btn text-center">
                        <a href="<?php echo $boba_menu_url; ?>>" target="_blank" class="btn-link">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/boba_menu_btn.svg'); ?>"
                                 alt="boba Menu button"/>
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
                    <?php $order_online_header = get_field('order_online_header',$page_id); ?>
                    <?php $order_online_description = get_field('order_online_description',$page_id); ?>
                    <h1 class="text-center mb-4 header"><?php echo $order_online_header; ?></h1>
                    <p class="mb-0 text-desc text-center">
                        <?php echo $order_online_description; ?>
                    </p>
                </div>
            </div>
            <?php
            $order_pickup_url = get_field('order_pickup_url',$page_id);
            $order_pickup_url = !empty($order_pickup_url) ? $order_pickup_url : '#';
            $order_delivery_url = get_field('order_delivery_url',$page_id);
            $order_delivery_url = !empty($order_delivery_url) ? $order_delivery_url : '#';
            $uber_eat_url = get_field('uber_eat_url',$page_id);
            $uber_eat_url = !empty($uber_eat_url) ? $uber_eat_url : '#';
            $door_dash_url = get_field('door_dash_url',$page_id);
            $door_dash_url = !empty($door_dash_url) ? $door_dash_url : '#';
            ?>
            <div class="row justify-content-center order-online-row">
                <div class="col-md-6">
                    <p class="text-right">
                        <a href="<?php echo $order_pickup_url; ?>" target="_blank" class="btn-link">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/order_pickup_btn.svg'); ?>"
                                 alt="order pickup button"/>
                        </a>
                    </p>
                </div>
                <div class="col-md-6">
                    <p class="text-left">
                        <a href="<?php echo $order_delivery_url; ?>" target="_blank" class="btn-link">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/order_delivery_btn.svg'); ?>"
                                 alt="order delivery Menu button"/>
                        </a>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center order-online-row">
                <div class="col-md-6">
                    <p class="text-right">
                        <a href="<?php echo $uber_eat_url; ?>" target="_blank" class="btn-link">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/uber_eat_btn.svg'); ?>"
                                 alt="uber eat button"/>
                        </a>
                    </p>
                </div>
                <div class="col-md-6">
                    <p class="text-left">
                        <a href="<?php echo $door_dash_url; ?>" target="_blank" class="btn-link">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/doordash_btn.svg'); ?>"
                                 alt="doordash Menu button"/>
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
                    <?php $menu_header = get_field('menu_1_header', $page_id) ?? 'Milk Tea' ; ?>
                    <h1 class="text-center mb-4 header"><?php echo $menu_header; ?></h1>
                </div>
            </div>
            <div class="row list-menu-item-1-row">
                <div class="container-fluid p-5">

                    <?php
                    if (get_query_var('paged')) {
                        $paged = get_query_var('paged');
                    } else if (get_query_var('page')) {
                        // This will occur if on front page.
                        $paged = get_query_var('page');
                    } else {
                        $paged = 1;
                    }
                    $my_query = new WP_Query(array(
                        'post_type' => 'menu_items',
                        'posts_per_page' => 8,
                        'paged' => $paged,
                        'orderby' => 'id',
                        'order' => 'ASC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'groups',
                                'field' => 'slug',
                                'terms' => array('milk-tea'),
                            )
                        ),
                    ));
                    $total_pages = $my_query->max_num_pages;
                    ?>
                    <?php if (have_posts()) : ?>
                        <div class="row">
                            <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="menu-item p-1">
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
                            <?php
                            endwhile; ?>
                        </div>
                    <?php else: ?>
                        <div class="row">
                            <p>Nothing Found</p>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-12 justify-content-center">
                            <!-- Specify justify-content-end to align to the right -->
                            <?php bootstrap_pagination($my_query, true, array('prev_next' => false)); ?>
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
                    <?php $menu_header = get_field('menu_2_header', $page_id) ?? 'Waffles' ; ?>
                    <h1 class="text-center mb-4 header"><?php echo $menu_header; ?></h1>
                </div>
            </div>
            <div class="row list-menu-item-2-row">
                <div class="container-fluid p-5">
                    <div class="row">
                        <?php
                        if (get_query_var('paged')) {
                            $paged = get_query_var('paged');
                        } else if (get_query_var('page')) {
                            // This will occur if on front page.
                            $paged = get_query_var('page');
                        } else {
                            $paged = 1;
                        }
                        $my_query = new WP_Query(array(
                            'post_type' => 'menu_items',
                            'posts_per_page' => 9,
                            'paged' => $paged,
                            'orderby' => 'id',
                            'order' => 'ASC',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'groups',
                                    'field' => 'slug',
                                    'terms' => array('waffles'),
                                )
                            ),
                        ));
                        $total_pages = $my_query->max_num_pages;
                        ?>
                        <?php if (have_posts()) : ?>
                            <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
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
                    <?php bootstrap_pagination($my_query,true, array('prev_next' => false)); ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
get_footer('custom');
?>
