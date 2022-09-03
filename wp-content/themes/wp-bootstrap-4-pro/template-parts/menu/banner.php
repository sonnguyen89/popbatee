<?php

$page_title = get_the_title();
$page_desc = get_the_content();
?>
<section class="jumbotron page-default-banner">
  <div class="container text-center">
      <h1 class="jumbotron-heading header-title text-white"><?php echo $page_title; ?></h1>
      <p class="page-desc text-white"><?php echo $page_desc; ?></p>
      <p class="page-desc text-white download-menu-content">
          <?php $download_url = get_field('download_menu_url'); ?>
          <?php $download_url = !empty($download_url) ? $download_url : '#' ?>
          <a href="<?php echo $download_url ?>" target="_blank" class="btn-link d-block">
          <img src="<?php echo esc_url( get_template_directory_uri() .'/assets/images/download_menu_white_btn.svg'); ?>" alt="download menu"/>
          </a>
      </p>
  </div>
</section>

