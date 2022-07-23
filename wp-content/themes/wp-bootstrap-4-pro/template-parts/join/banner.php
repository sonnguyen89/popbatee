<?php

$page_title = get_the_title();
$page_desc = get_the_content();
?>
<section class="jumbotron page-default-banner">
  <div class="container text-center">
      <h1 class="jumbotron-heading header-title text-white"><?php echo $page_title; ?></h1>
      <p class="page-desc text-white"><?php echo $page_desc; ?></p>
      <?php $join_us_image = get_field( "join_us_image" ); ?>
      <p class="page-desc p-0 m-0">
          <img src="<?php echo $join_us_image; ?>" class="join-us-image w-100" />
      </p>
  </div>
</section>

