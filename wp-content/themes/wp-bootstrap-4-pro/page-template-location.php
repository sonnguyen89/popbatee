<?php
/*
  Template Name: Location
 */

get_header('default');
get_template_part('template-parts/location/banner');
$location_filter_header = get_field('location_filter_header');
$location_filter_description = get_field('location_filter_description');
global $post;
$page_id = $post->ID;
?>
<?php if (get_theme_mod('show_main_content', 1)) : ?>
    <!-- Find your store Section -->
    <section class="wp-bp-main-content find-boba-store">
        <div class="container-fluid">
            <div class="row justify-content-center boba-store-row">
                <div class="col-md-12">
                    <h1 class="text-center mb-4 header"><?php echo $location_filter_header; ?></h1>
                    <p class="mb-0 text-desc text-center">
                        <?php echo $location_filter_description; ?>
                    </p>
                </div>
            </div>
            <div class="row boba-store-row">
                <div class="container-fluid pl-5">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="sort-by-label p-0">Sort By</p>
                        </div>
                    </div>
                    <div class="row filter-form">
                        <div class="col-md-3 col-sm-6">
                            <div class="dropdown" id="state-filter-input">
                                <a class="btn btn-outline-secondary dropdown-toggle w-100 text-left"
                                   type="button"
                                   id="statesDropdown" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    State
                                </a>
                                <div class="dropdown-menu" aria-labelledby="statesDropdown">
                                    <?php $states_term = get_terms('states', array(
                                        'hide_empty' => true,
                                    )); ?>
                                    <a class="dropdown-item state-item" href="#" term-name="all">All</a>
                                    <?php foreach ($states_term as $term): ?>
                                        <a class="dropdown-item state-item" href="#"
                                           term-name="<?php echo $term->name; ?>"><?php echo $term->name; ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <input type="text" id="postcode-filter-input" class="form-control w-100 postcode-filter"
                                   placeholder="Enter Postcode">
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $my_query = new WP_Query(array(
                'post_type' => 'stores',
                'orderby' => 'id',
                'order' => 'ASC',
            ));
            ?>
            <?php if (have_posts()) : ?>
                <div class="row boba-store-row">
                    <div class="container-fluid p-5">
                        <div class="row" id="boba-store-item-list">
                            <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                                <?php $street_address = get_field("street_address", get_the_ID()); ?>
                                <?php $postcode = get_field("postcode", get_the_ID()); ?>
                                <?php $telephone = get_field("telephone", get_the_ID()); ?>
                                <?php $email = get_field("email", get_the_ID()); ?>
                                <?php $trading_hours = get_field("trading_hours", get_the_ID()); ?>
                                <?php $categories = get_the_terms(get_the_ID(), 'states');
                                $state = '';
                                if (!empty($categories)) {
                                    $state = esc_html($categories[0]->name);
                                } ?>
                                <div class="col-md-6 boba-store-item" data-postcode="<?php echo $postcode; ?>"
                                     data-state="<?php echo $state; ?>">
                                    <?php if (has_post_thumbnail()): ?>
                                        <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                                        <div class="boba-store-item-image">
                                            <img class="img-fluid" src="<?php echo $featured_img_url; ?>"/>
                                        </div>
                                    <?php endif; ?>
                                    <div class="boba-store-item-content ml-3 mt-3">
                                        <div class="row">
                                            <h3 class="header"><?php the_title(); ?></h3>
                                        </div>
                                        <?php if (!empty($street_address)) : ?>
                                            <div class="row">
                                                <p class="street-address"><?php echo $street_address; ?> </p>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($telephone)) : ?>
                                            <div class="row telephone-row">
                                                <div class="col-6 p-0">
                                                    <p class="field-label">Telephone</p>
                                                </div>
                                                <div class="col-6 p-0">
                                                    <p class="field-value"><?php echo $telephone; ?> </p>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (!empty($trading_hours)) : ?>
                                            <div class="row trading-hours-row">
                                                <div class="col-12 p-0">
                                                    <p class="field-label">Trading Hours</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <?php foreach ($trading_hours as $th): ?>
                                                    <div class="col-6 p-0">
                                                        <p class="trading-hours field-value"><?php echo $th['date']; ?> </p>
                                                    </div>
                                                    <div class="col-6 p-0">
                                                        <p class="trading-hours field-value"><?php echo $th['hours']; ?> </p>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>

                                        <?php endif; ?>

                                        <?php if (!empty($email)) : ?>
                                            <div class="row email-row">
                                                <div class="col-6 p-0">
                                                    <p class="field-label">Email</p>
                                                </div>
                                                <div class="col-6 p-0">
                                                    <p class="field-value"><?php echo $email; ?> </p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="row justify-content-center">
                    <p>Nothing Found</p>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <!-- Order Online Section -->
    <section class="wp-bp-main-content page-menu order-online">
        <div class="container">
            <div class="row justify-content-center order-online-row">
                <div class="col-md-12">
                    <?php $order_online_header = get_field('location_order_online_header',$page_id); ?>
                    <?php $order_online_description = get_field('location_order_online_description',$page_id); ?>
                    <h1 class="text-center mb-4 header"><?php echo $order_online_header; ?></h1>
                    <p class="mb-0 text-desc text-center">
                        <?php echo $order_online_description; ?>
                    </p>
                </div>
            </div>
            <?php
            $order_pickup_url = get_field('order_pickup_url',83);
            $order_pickup_url = !empty($order_pickup_url) ? $order_pickup_url : '#';
            $order_delivery_url = get_field('order_delivery_url',83);
            $order_delivery_url = !empty($order_delivery_url) ? $order_delivery_url : '#';
            $uber_eat_url = get_field('uber_eat_url',83);
            $uber_eat_url = !empty($uber_eat_url) ? $uber_eat_url : '#';
            $door_dash_url = get_field('door_dash_url',83);
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
<?php endif; ?>

<?php
get_footer('custom');
?>
<!-- custom javascript for store filer form for location page only -->
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $("#postcode-filter-input").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#boba-store-item-list .boba-store-item").filter(function () {
                $(this).toggle($(this).attr('data-postcode').toLowerCase().indexOf(value) > -1);
            });
            //reset other filter
            $("#state-filter-input #statesDropdown").html('State');
        });
        $("#state-filter-input .state-item").on("click", function (e) {
            e.preventDefault();
            var value = $(this).attr('term-name').toLowerCase();
            $("#state-filter-input #statesDropdown").html($(this).attr('term-name'));
            $("#boba-store-item-list .boba-store-item").filter(function () {
                if (value !== 'all') {
                    $(this).toggle($(this).attr('data-state').toLowerCase().indexOf(value) > -1);
                } else {
                    $(this).toggle($(this).attr('data-state'));
                    $("#state-filter-input #statesDropdown").html('State');
                }
            });
            //reset other filter
            $("#postcode-filter-input").val('');
        });
    });
</script>