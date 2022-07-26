<?php
/*
  Template Name: Join
 */

get_header('default');
get_template_part('template-parts/join/banner');
$join_us_form_header = get_field('join_us_form_header');
$join_us_form_description = get_field('join_us_form_description');
?>
<?php if (get_theme_mod('show_main_content', 1)) : ?>
    <!-- Franchise form Section -->
    <section class="wp-bp-main-content boba-join-us-form">
        <div class="container">
            <div class="row justify-content-center boba-join-us-form-row">
                <div class="col-md-12">
                    <p class="text-center mb-4 header">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/popatee_form_logo.svg'); ?>"/>
                    </p>
                    <p class="mb-0 text-desc text-center">
                        <?php echo $join_us_form_description; ?>
                    </p>
                    <p class="text-center mb-2 header">
                        <?php echo $join_us_form_header; ?>
                    </p>
                    <p class="mb-0 text-desc text-center">
                        <?php echo do_shortcode("[contact-form-7 id='104' title='Work With Us!']"); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
get_footer('custom');
?>
<!-- custom javascript for join form for join us page only -->
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        var resume_btn = "<img class='show-resume-btn' src='<?php echo esc_url(get_template_directory_uri() . '/assets/images/upload_resume_btn.svg'); ?>'/>";
        var cover_letter_btn = "<img class='show-cover-letter-btn' src='<?php echo esc_url(get_template_directory_uri() . '/assets/images/upload_cover_letter_btn.svg'); ?>'/>";
        var file_show = "<p class='file-show'></p>";
        $(".boba-join-us-form-row .wpcf7 .resume-btn").append(resume_btn);
        $(".boba-join-us-form-row .wpcf7 .resume-btn").append(file_show);

        $(".boba-join-us-form-row .wpcf7 .cover-letter-btn").append(cover_letter_btn);
        $(".boba-join-us-form-row .wpcf7 .cover-letter-btn").append(file_show);

        $(".boba-join-us-form-row .wpcf7 .resume-btn .wpcf7-form-control-wrap").hide();
        $(".boba-join-us-form-row .wpcf7 .cover-letter-btn .wpcf7-form-control-wrap").hide();

        $(".boba-join-us-form-row .wpcf7 .resume-btn .wpcf7-form-control-wrap input#resume").on("change",function() {
            if($(this).val()) {
                $(".boba-join-us-form-row .wpcf7 .resume-btn .file-show").html($(this).val().split('\\').pop());
            } else {
                $(".boba-join-us-form-row .wpcf7 .resume-btn .file-show").html("");
            }
        });

        $(".boba-join-us-form-row .wpcf7 .cover-letter-btn .wpcf7-form-control-wrap input#cover-letter").on("change",function() {
            if($(this).val()) {
                $(".boba-join-us-form-row .wpcf7 .cover-letter-btn .file-show").html($(this).val().split('\\').pop());
            } else {
                $(".boba-join-us-form-row .wpcf7 .cover-letter-btn .file-show").html("");
            }
        });

        $(".boba-join-us-form-row .wpcf7 .message-input #message").attr('rows',10);
    });
</script>
