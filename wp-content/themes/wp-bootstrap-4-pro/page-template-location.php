<?php
/*
  Template Name: Location
 */

get_header('default');
get_template_part('template-parts/location/banner');

?>
<?php if (get_theme_mod('show_main_content', 1)) : ?>
    <!-- Find your store Section -->
    <section class="wp-bp-main-content find-boba-store">
        <div class="container-fluid">
            <div class="row justify-content-center boba-store-row">
                <div class="col-md-12">
                    <h1 class="text-center mb-4 header">Find Your Nearest Store!</h1>
                    <p class="mb-0 text-desc text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse
                        ultrices
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
                        <div class="col-2">
                            <div class="dropdown" id="state-filter-input">
                                <a class="btn btn-outline-secondary dropdown-toggle w-100 text-left"
                                   type="button"
                                   id="statesDropdown" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    State
                                </a>
                                <div class="dropdown-menu" aria-labelledby="statesDropdown">
                                     <?php $states_term = get_terms( 'states',array(
                                         'hide_empty' => true,
                                     )); ?>
                                    <a class="dropdown-item state-item" href="#" term-name="all" >All</a>
                                    <?php foreach($states_term as $term): ?>
                                        <a class="dropdown-item state-item" href="#" term-name="<?php echo $term->name; ?>" ><?php echo $term->name; ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <input type="text" id="postcode-filter-input" class="form-control w-100 postcode-filter" placeholder="Enter Postcode">
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
                                <?php $categories = get_the_terms( get_the_ID() , 'states' );
                                $state = '';
                                if ( ! empty( $categories ) ) {
                                    $state =  esc_html( $categories[0]->name );
                                } ?>
                                <div class="col-md-6 boba-store-item" data-postcode="<?php echo $postcode; ?>" data-state="<?php echo $state; ?>">
                                    <?php if (has_post_thumbnail()): ?>
                                        <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                                        <div class="boba-store-item-image">
                                            <img class="img-fluid" src="<?php echo $featured_img_url; ?>"/>
                                        </div>
                                    <?php endif; ?>
                                    <div class="boba-store-item-content ml-3 mt-3">
                                        <h3 class="header"><?php the_title(); ?></h3>
                                        <?php if (!empty($street_address)) : ?>
                                            <p class="street-address"><?php echo $street_address; ?> </p>
                                        <?php endif; ?>
                                        <?php if (!empty($telephone)) : ?>
                                            <div class="row">
                                                <div class="col-6">
                                                    <p class="field-label">Telephone</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="field-value"><?php echo $telephone; ?> </p>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (!empty($trading_hours)) : ?>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="field-label">trading Hours</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <?php foreach ($trading_hours as $th): ?>
                                                    <div class="col-6">
                                                        <p class="field-value"><?php echo $th['date']; ?> </p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="field-value"><?php echo $th['hours']; ?> </p>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>

                                        <?php endif; ?>

                                        <?php if (!empty($email)) : ?>
                                            <div class="row">
                                                <div class="col-6">
                                                    <p class="field-label">Email</p>
                                                </div>
                                                <div class="col-6">
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
                    <h1 class="text-center mb-4 header">Order Online</h1>
                    <p class="mb-0 text-desc text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse
                        ultrices</p>
                </div>
            </div>
            <div class="row justify-content-center order-online-row">
                <div class="col-md-6">
                    <p class="text-right">
                        <a href="#" target="_blank" class="btn-link">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/order_pickup_btn.svg'); ?>"
                                 alt="order pickup button"/>
                        </a>
                    </p>
                </div>
                <div class="col-md-6">
                    <p class="text-left">
                        <a href="#" target="_blank" class="btn-link">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/order_delivery_btn.svg'); ?>"
                                 alt="order delivery Menu button"/>
                        </a>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center order-online-row">
                <div class="col-md-6">
                    <p class="text-right">
                        <a href="#" target="_blank" class="btn-link">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/uber_eat_btn.svg'); ?>"
                                 alt="uber eat button"/>
                        </a>
                    </p>
                </div>
                <div class="col-md-6">
                    <p class="text-left">
                        <a href="#" target="_blank" class="btn-link">
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
    jQuery(document).ready(function($) {
        $("#postcode-filter-input").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#boba-store-item-list .boba-store-item").filter(function () {
                $(this).toggle($(this).attr('data-postcode').toLowerCase().indexOf(value) > -1);
            });
            //reset other filter
            $("#state-filter-input #statesDropdown").html('State');
        });
        $("#state-filter-input .state-item").on("click", function(e) {
            e.preventDefault();
            var value = $(this).attr('term-name').toLowerCase();
            $("#state-filter-input #statesDropdown").html($(this).attr('term-name'));
            $("#boba-store-item-list .boba-store-item").filter(function () {
                if(value !== 'all') {
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