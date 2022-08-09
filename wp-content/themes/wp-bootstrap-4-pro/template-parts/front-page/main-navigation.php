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

<div id="primary-menu-wrap" class="collapse navbar-collapse">
    <ul id="primary-menu" class="navbar-nav mr-auto mx-auto nav-fill w-100">
        <?php if(!empty($menu_items_1)): ?>
            <?php foreach($menu_items_1 as $key => $menuItem): ?>
                <?php if($key == 0): ?>
                    <li class="nav-item active menu-item menu-item-type-<?php echo $menuItem->type; ?> menu-item-object-<?php echo $menuItem->object; ?> menu-item-<?php echo strtolower($menuItem->title); ?> current-menu-item <?php echo $menuItem->object; ?>_item current_page_item">
                        <a href="<?php echo $menuItem->url; ?>" class="nav-link"><?php echo $menuItem->title; ?></a>
                    </li>
                 <?php else: ?>
                    <li class="nav-item menu-item menu-item-type-<?php echo $menuItem->type; ?> menu-item-object-<?php echo $menuItem->object; ?>"><a href="<?php echo $menuItem->url; ?>" class="nav-link"><?php echo $menuItem->title; ?></a></li>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <li class="nav-item menu-item menu-item-type-logo menu-item-object-logo">
            <?php // the_custom_logo();?>
            <img src="<?php echo esc_url( get_template_directory_uri() .'/assets/images/main_menu_logo.svg'); ?>" alt="menu logo" class="custom-logo"/>
        </li>
        <?php if(!empty($menu_items_2)): ?>
            <?php foreach($menu_items_2 as $key => $menuItem): ?>
                <?php $order_class = ''; ?>
                <?php if($menuItem->title == 'Order'):
                    $order_class= 'custom-order';
                endif; ?>
                <?php if($key == 0): ?>
                    <li class="nav-item active menu-item menu-item-type-<?php echo $menuItem->type; ?> menu-item-object-<?php echo $menuItem->object; ?> menu-item-<?php echo strtolower($menuItem->title); ?> current-menu-item <?php echo $menuItem->object; ?>_item current_page_item">
                        <a href="<?php echo $menuItem->url; ?>" class="nav-link <?php echo $order_class; ?>"><?php echo $menuItem->title; ?></a>
                    </li>
                <?php else: ?>
                    <li class="nav-item menu-item menu-item-type-<?php echo $menuItem->type; ?> menu-item-object-<?php echo $menuItem->object; ?>"><a href="<?php echo $menuItem->url; ?>" class="nav-link <?php echo $order_class; ?>"><?php echo $menuItem->title; ?></a></li>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>

</div>
