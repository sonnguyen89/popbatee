<?php
/*
  Template Name: Home Page
 */

get_header('homepage');
get_template_part('template-parts/front-page/banner');

?>

<?php if (get_theme_mod('show_main_content', 1)) : ?>
    <!-- Signature Boba Section -->
    <section class="wp-bp-main-content signature-boba">
        <div class="container">
            <div class="row justify-content-center signature-boba-row">
                <div class="col-md-12">
                    <?php $signatureHeader = get_field('signature_header'); ?>
                    <?php $signatureDesc = get_field('signature_description'); ?>
                    <h1 class="text-center mb-4 header"><?php echo $signatureHeader; ?></h1>
                    <p class="mb-0 text-desc text-center">
                        <?php echo $signatureDesc; ?>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center signature-boba-row signature-boba-items">
                <?php $signatureItems = get_field('signature_items'); ?>
                <?php foreach ($signatureItems as $index => $signature_item): ?>
                    <div class="col-md-4">
                        <?php if (($index % 2) == 0): ?>
                            <h3 class="text-center mb-4 item-desc"><?php echo $signature_item['item_name']; ?></h3>
                        <?php endif; ?>
                        <p class="mb-0 text-desc text-center">
                            <img src="<?php echo $signature_item['item_image']; ?>" alt="boba-signature"/>
                        </p>
                        <?php if (($index % 2) != 0): ?>
                            <h3 class="text-center mb-4 item-desc"><?php echo $signature_item['item_name']; ?></h3>
                            <h3 class="text-center mb-4 item-desc mobile"><?php echo $signature_item['item_name']; ?></h3>
                        <?php else: ?>
                            <h3 class="text-center mb-4 item-desc mobile"><?php echo $signature_item['item_name']; ?></h3>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="row justify-content-center signature-boba-row">
                <div class="col-md-12">
                    <p class="see-menu-btn text-center">
                        <?php
                        $signature_menu = get_field('signature_menu');
                        $signature_menu = !empty($signature_menu) ? $signature_menu : '#';
                        ?>
                        <a href="<?php echo $signature_menu; ?>" target="_blank" class="btn-link">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/boba_menu_btn.svg'); ?>"
                                 alt="boba Menu button"/>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Waffles Section -->
    <section class="wp-bp-main-content waffles">
        <div class="container">
            <div class="row justify-content-center waffles-row">
                <div class="col-md-12">
                    <?php $waffle_header = get_field('waffle_header'); ?>
                    <?php $waffle_description = get_field('waffle_description'); ?>
                    <h1 class="text-center mb-4 header"><?php echo $waffle_header; ?></h1>
                    <p class="mb-0 text-desc text-center"><?php echo $waffle_description; ?></p>
                </div>
            </div>
            <div class="row justify-content-center waffles-row waffles-items">
                <?php $waffle_items = get_field('waffle_items'); ?>
                <?php foreach ($waffle_items as $index => $waffle_item): ?>
                    <div class="col-md-4">
                        <?php if (($index % 2) == 0): ?>
                            <h3 class="text-center mb-4 item-desc"><?php echo $waffle_item['item_name']; ?></h3>
                        <?php endif; ?>
                        <p class="mb-0 text-desc text-center">
                            <img src="<?php echo $waffle_item['item_image']; ?>" alt="waffles"/>
                        </p>
                        <?php if (($index % 2) != 0): ?>
                            <h3 class="text-center mb-4 item-desc"><?php echo $waffle_item['item_name']; ?></h3>
                            <h3 class="text-center mb-4 item-desc mobile"><?php echo $waffle_item['item_name']; ?></h3>
                        <?php else: ?>
                            <h3 class="text-center mb-4 item-desc mobile"><?php echo $waffle_item['item_name']; ?></h3>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="row justify-content-center waffles-row">
                <p class="mb-0 see-menu-btn text-center">
                    <?php
                    $waffle_menu = get_field('waffle_menu');
                    $waffle_menu = !empty($waffle_menu) ? $waffle_menu : '#';
                    ?>
                    <a href="<?php echo $waffle_menu; ?>>" target="_blank" class="btn-link">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/waffle_menu_btn.svg'); ?>"
                             alt="See waffles Menu button"/>
                    </a>
                </p>
            </div>
        </div>
    </section>
    <!-- Order Online Section -->
    <section class="wp-bp-main-content order-online">
        <div class="container">
            <div class="row justify-content-center order-online-row">
                <div class="col-md-12">
                    <?php $order_online_header = get_field('order_online_header'); ?>
                    <?php $order_online_description = get_field('order_online_description'); ?>
                    <h1 class="text-center mb-4 header"><?php echo $order_online_header; ?></h1>
                    <p class="mb-0 text-desc text-center"><?php echo $order_online_description; ?></p>
                </div>
            </div>
            <?php
            $order_pickup_url = get_field('order_pickup_url');
            $order_pickup_url = !empty($order_pickup_url) ? $order_pickup_url : '#';
            $order_delivery_url = get_field('order_delivery_url');
            $order_delivery_url = !empty($order_delivery_url) ? $order_delivery_url : '#';
            $uber_eat_url = get_field('uber_eat_url');
            $uber_eat_url = !empty($uber_eat_url) ? $uber_eat_url : '#';
            $door_dash_url = get_field('door_dash_url');
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
    <!-- pobbatee store image Section -->
    <section class="wp-bp-main-content pobbatee-store-image p-0">
        <div class="container-fluid">
            <div class="row justify-content-center pobbatee-store-image-row">
                <div class="col-md-12 p-0">
                    <img class="d-block w-100" src="http://popbatee.test/wp-content/uploads/2022/07/Image_18.png"
                         alt="boba store image"/>
                </div>
            </div>
        </div>
    </section>
    <!-- Franchise Section -->
    <section class="wp-bp-main-content franchise">
        <div class="container">
            <div class="row justify-content-center franchise-row">
                <div class="col-md-12">
                    <?php $franchise_header = get_field('franchise_header'); ?>
                    <?php $franchise_description = get_field('franchise_description'); ?>
                    <h1 class="text-center mb-4 header"><?php echo $franchise_header; ?></h1>
                    <p class="mb-0 text-desc text-center">
                        <?php echo $franchise_description; ?>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center franchise-row">
                <div class="col-md-12">
                    <p class="franchise-btn text-center">
                        <?php
                        $franchise_url = get_field('franchise_url');
                        $franchise_url = !empty($franchise_url) ? $franchise_url : '#';
                        ?>
                        <a href="<?php echo $franchise_url; ?>" target="_blank" class="btn-link">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/franchise_btn.svg'); ?>"
                                 alt="Franchise button"/>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
get_footer('custom');
?>
