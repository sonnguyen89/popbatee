<?php
/*
  Template Name: Franchise
 */

get_header('default');
get_template_part('template-parts/franchise/banner');

?>
<?php if (get_theme_mod('show_main_content', 1)) : ?>
    <!-- Franchise form Section -->
    <section class="wp-bp-main-content boba-franchise-form">
        <div class="container">
            <div class="row justify-content-center boba-franchise-form-row">
                <div class="col-md-12">
                    <p class="text-center mb-4 header">
                        <img src="<?php echo esc_url( get_template_directory_uri() .'/assets/images/popatee_form_logo.svg'); ?>"/>
                    </p>
                    <p class="mb-0 text-desc text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse
                        ultrices
                    </p>
                    <p class="text-center mb-2 header">
                        Join Us Today!
                    </p>
                    <p class="mb-0 text-desc text-center">
                        <?php echo do_shortcode("[contact-form-7 id='103' title='Join Us Today!']"); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
get_footer('custom');
?>

<script type="text/javascript">
    jQuery(document).ready(function ($) {

        $(".boba-franchise-form-row .wpcf7 .message-input #message").attr('rows',10);
    });
</script>

