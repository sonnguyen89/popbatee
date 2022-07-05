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
<!-- Franchise Section -->
<section class="wp-bp-main-content franchise">
    <div class="container">
        <div class="row justify-content-center franchise-row">
            <div class="col-md-12">
                <h1 class="text-center mb-4 header">Franchise</h1>
                <p class="mb-0 text-desc text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices
                </p>
            </div>
        </div>
        <div class="row justify-content-center franchise-row">
            <div class="col-md-12">
                <p class="franchise-btn text-center">
                    <a href="#" target="_blank" class="btn-link">
                        <img src="<?php echo esc_url( get_template_directory_uri() .'/assets/images/franchise_btn.svg'); ?>" alt="Franchise button" />
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
