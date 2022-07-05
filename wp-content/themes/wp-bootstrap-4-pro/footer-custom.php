<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_4
 */

?>
	</div><!-- #content -->
	<footer id="colophon" class="site-footer text-center">
		<section class="footer-widgets">
			<div class="container-fluid">
				<div class="row justify-content-center">
                    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                        <div class="col-md-4">
                            <div class="widget-area footer-1-area">
                                <?php dynamic_sidebar( 'footer-1' ); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-4">
                        <div class="widget-area footer-2-area">
                            <img class="" src="<?php echo esc_url( get_template_directory_uri() .'/assets/images/footer_logo.svg'); ?>" alt="Footer Logo" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="widget-area footer-3-area">
                            <p class="text-desc text-center"> Connect with us</p>
                            <p class="social-icons text-center">
                                <a href="#" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() .'/assets/images/facebook_ico.svg'); ?>" alt="boba store image"/></a>
                                <a href="#" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() .'/assets/images/instagram_ico.svg'); ?>" alt="boba store image"/></a>
                            </p>
                        </div>
                    </div>
				</div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <?php
                            $menu_name_1 = 'menu-1';
                            $menu_name_2 = 'menu-2';
                            if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name_1 ] ) ) {
                                $menu = wp_get_nav_menu_object($locations[$menu_name_1]);

                                $menu_items_1 = wp_get_nav_menu_items($menu->term_id);
                            }
                            if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name_2 ] ) ) {
                                $menu = wp_get_nav_menu_object($locations[$menu_name_2]);

                                $menu_items_2 = wp_get_nav_menu_items($menu->term_id);
                            }
                        ?>
                        <nav class="navbar navbar-expand-lg ">
                            <ul class="navbar-nav mr-auto mx-auto nav-fill w-100">
                                <?php foreach($menu_items_1 as $key => $menuItem): ?>
                                    <li class="nav-item menu-item menu-item-type-<?php echo $menuItem->type; ?> menu-item-object-<?php echo $menuItem->object; ?>">
                                        <a href="<?php echo $menuItem->url; ?>" class="nav-link"><?php echo $menuItem->title; ?></a>
                                    </li>
                                <?php endforeach; ?>
                                <?php foreach($menu_items_2 as $key => $menuItem): ?>
                                    <?php if($menuItem->post_name != 'order') : ?>
                                        <li class="nav-item menu-item menu-item-type-<?php echo $menuItem->type; ?> menu-item-object-<?php echo $menuItem->object; ?>">
                                            <a href="<?php echo $menuItem->url; ?>" class="nav-link"><?php echo $menuItem->title; ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
				<!-- /.row -->
			</div>
		</section>

		<div class="container-fluid site-info">
			<div class="row justify-content-center">
                <div class="col-md-6 mb-3 mt-3">
                    <p class="text-left">© Popbatee 2022 All Rights Reserved</p>
                </div>
                <div class="col-md-6 mb-3 mt-3">
                    <p class="text-right">Website By Flabbergast</p>
                </div>
			</div><!-- .site-info -->
		</div>
		<!-- /.container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
