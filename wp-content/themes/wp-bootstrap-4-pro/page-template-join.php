<?php
/*
  Template Name: Join
 */

get_header('default');
get_template_part('template-parts/join/banner');

?>
<?php if (get_theme_mod('show_main_content', 1)) : ?>
    <!-- Franchise form Section -->
    <section class="wp-bp-main-content boba-join-us-form">
        <div class="container">
            <div class="row justify-content-center boba-join-us-form-row">
                <div class="col-md-12">
                    <p class="text-center mb-4 header">
                        <img src="<?php echo esc_url( get_template_directory_uri() .'/assets/images/popatee_form_logo.svg'); ?>"/>
                    </p>
                    <p class="mb-0 text-desc text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse
                        ultrices
                    </p>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
get_footer('custom');
?>