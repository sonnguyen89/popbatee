<?php
/**
 * WP Bootstrap 4 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Bootstrap_4
 */

if (!function_exists('wp_bootstrap_4_setup')) :
    function wp_bootstrap_4_setup()
    {

        // Make theme available for translation.
        load_theme_textdomain('wp-bootstrap-4', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        // Let WordPress manage the document title.
        add_theme_support('title-tag');

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support('post-thumbnails');

        // Enable Post formats
        add_theme_support('post-formats', array('gallery', 'video', 'audio', 'status', 'quote', 'link'));

        // Enable support for woocommerce.
        add_theme_support('woocommerce');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-2' => esc_html__('Primary right', 'wp-bootstrap-4'),
            'menu-1' => esc_html__('Primary left', 'wp-bootstrap-4'),
        ));

        // Switch default core markup for search form, comment form, and comments
        add_theme_support('html5', array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('wp_bootstrap_4_custom_background_args', array(
            'default-color' => 'f8f9fa',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        // Add support for core custom logo.
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'wp_bootstrap_4_setup');


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_bootstrap_4_content_width()
{
    $GLOBALS['content_width'] = apply_filters('wp_bootstrap_4_content_width', 800);
}

add_action('after_setup_theme', 'wp_bootstrap_4_content_width', 0);


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_bootstrap_4_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'wp-bootstrap-4'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'wp-bootstrap-4'),
        'before_widget' => '<section id="%1$s" class="widget border-bottom %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h5 class="widget-title h6">',
        'after_title' => '</h5>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Column 1', 'wp-bootstrap-4'),
        'id' => 'footer-1',
        'description' => esc_html__('Add widgets here.', 'wp-bootstrap-4'),
        'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h5 class="widget-title h6">',
        'after_title' => '</h5>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Column 2', 'wp-bootstrap-4'),
        'id' => 'footer-2',
        'description' => esc_html__('Add widgets here.', 'wp-bootstrap-4'),
        'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h5 class="widget-title h6">',
        'after_title' => '</h5>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Column 3', 'wp-bootstrap-4'),
        'id' => 'footer-3',
        'description' => esc_html__('Add widgets here.', 'wp-bootstrap-4'),
        'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h5 class="widget-title h6">',
        'after_title' => '</h5>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Column 4', 'wp-bootstrap-4'),
        'id' => 'footer-4',
        'description' => esc_html__('Add widgets here.', 'wp-bootstrap-4'),
        'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h5 class="widget-title h6">',
        'after_title' => '</h5>',
    ));
}

add_action('widgets_init', 'wp_bootstrap_4_widgets_init');


/**
 * Enqueue scripts and styles.
 */
function wp_bootstrap_4_scripts()
{
    wp_enqueue_style('open-iconic-bootstrap', get_template_directory_uri() . '/assets/css/open-iconic-bootstrap.css', array(), 'v4.0.0', 'all');
    wp_enqueue_style('bootstrap-4', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), 'v4.0.0', 'all');
    wp_enqueue_style('wp-bootstrap-4-style', get_stylesheet_uri(), array(), '1.0.2', 'all');
    wp_enqueue_style('responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), 'v4.0.0', 'all');

    wp_enqueue_script('popper-js', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), 'v1.11.0', true);
    wp_enqueue_script('bootstrap-4-js', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), 'v4.0.0', true);
    wp_enqueue_script('wp-bootstrap-4-theme', get_template_directory_uri() . '/assets/js/theme.js', array('jquery'), '1.0.5', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'wp_bootstrap_4_scripts');


/**
 * Registers an editor stylesheet for the theme.
 */
function wp_bootstrap_4_add_editor_styles()
{
    add_editor_style('editor-style.css');
}

add_action('admin_init', 'wp_bootstrap_4_add_editor_styles');


// Implement the Custom Header feature.
require get_template_directory() . '/inc/custom-header.php';

// Implement the Custom Comment feature.
require get_template_directory() . '/inc/custom-comment.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Custom Navbar
require get_template_directory() . '/inc/custom-navbar.php';

// Customizer additions.
require get_template_directory() . '/inc/tgmpa/tgmpa-init.php';

// Use Kirki for customizer API
require get_template_directory() . '/inc/theme-options/add-settings.php';

// Customizer additions.
require get_template_directory() . '/inc/customizer.php';

// Load Jetpack compatibility file.
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

// Load WooCommerce compatibility file.
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
}


// Change Theme Update Server
require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://s3.ap-south-1.amazonaws.com/wp-bootstrap-4/theme.json',
    __FILE__, //Full path to the main plugin file or functions.php.
    'wp-bootstrap-4-pro'
);


// customize the theme

function bopa_menu_item_type()
{

    $args = array(
        'labels' => array(
            'name' => 'Menu Items',
            'menu_name' => 'Menu Items',
            'singular_name' => 'Menu Item',
            'add_new_item' => 'Add New Menu Item',
            'edit_item' => 'Edit Menu Item',
            'update_item' => 'Update Menu Item',
            'add_new' => 'Add New Menu Item'
        ),
        'hierarchical' => true,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-food',
        'supports' => array('title', 'editor', 'thumbnail')
    );
    register_post_type('menu_items', $args);
}

function bopa_menu_item_taxonomoy()
{
    $args = array(
        'labels' => array(
            'name' => 'Groups',
            'singular_name' => 'Group'
        ),
        'public' => true,
        'hierarchical' => true,
    );
    register_taxonomy('groups', array('menu_items'), $args);
}

function bopa_store_type()
{

    $args = array(
        'labels' => array(
            'name' => 'Stores',
            'singular_name' => 'Store',
            'menu_name' => 'Stores',
            'add_new_item' => 'Add New Store',
            'edit_item' => 'Edit Store',
            'update_item' => 'Update Store',
            'add_new' => 'Add New Store'
        ),
        'hierarchical' => true,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-store',
        'supports' => array('title', 'editor', 'thumbnail')
    );
    register_post_type('stores', $args);
}

function bopa_store_state_taxonomoy()
{
    $args = array(
        'labels' => array(
            'name' => 'States',
            'singular_name' => 'State'
        ),
        'public' => true,
        'hierarchical' => true,
    );
    register_taxonomy('states', array('stores'), $args);
}


add_action('init', 'bopa_menu_item_type');
add_action('init', 'bopa_menu_item_taxonomoy');
add_action('init', 'bopa_store_type');
add_action('init', 'bopa_store_state_taxonomoy');

/**
 * https://gist.github.com/mtx-z/f95af6cc6fb562eb1a1540ca715ed928
 * @param WP_Query|null $wp_query
 * @param bool $echo
 * @param array $params
 *
 * @return string|null
 *
 * UPDATE for Bootstrap 5.0: https://gist.github.com/mtx-z/af85d3abd4c19a84a9713e69956e1507
 *
 * Accepts a WP_Query instance to build pagination (for custom wp_query()),
 * or nothing to use the current global $wp_query (eg: taxonomy term page)
 * - Tested on WP 5.7.1
 * - Tested with Bootstrap 4.4
 * - Tested on Sage 9.0.9
 *
 * INSTALLATION:
 * add this file content to your theme function.php or equivalent
 *
 * USAGE:
 *     <?php echo bootstrap_pagination(); ?> //uses global $wp_query
 * or with custom WP_Query():
 *     <?php
 *      $query = new \WP_Query($args);
 *       ... while(have_posts()), $query->posts stuff ... endwhile() ...
 *       echo bootstrap_pagination($query);
 *     ?>
 */
function bootstrap_pagination(\WP_Query $wp_query = null, $echo = true, $params = [], $add_args = [])
{
    if (null === $wp_query) {
        global $wp_query;
    }

    // $add_args = [];

    //add query (GET) parameters to generated page URLs
    /*if (isset($_GET[ 'sort' ])) {
        $add_args[ 'sort' ] = (string)$_GET[ 'sort' ];
    }*/

    $pages = paginate_links(array_merge([
            'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages,
            'type' => 'array',
            'show_all' => false,
            'end_size' => 3,
            'mid_size' => 1,
            'prev_next' => true,
            'prev_text' => __('« Prev'),
            'next_text' => __('Next »'),
            'add_args' => $add_args,
            'add_fragment' => ''
        ], $params)
    );

    if (is_array($pages)) {
        //$current_page = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
        $pagination = '<ul class="pagination justify-content-center">';

        foreach ($pages as $page) {
            $pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
        }

        $pagination .= '</ul>';

        if ($echo) {
            echo $pagination;
        } else {
            return $pagination;
        }
    }

    return null;
}

add_action('admin_menu', 'popbatee_theme_setting_menu');

function popbatee_theme_setting_menu()
{

    add_menu_page(
        'Popbatee Theme Settings', // page <title>Title</title>
        'Popbatee Theme', // link text
        'manage_options', // user capabilities
        'popbatee_theme_setting', // page slug
        'popbatee_theme_setting_page_callback', // this function prints the page content
        'dashicons-admin-tools', // icon (from Dashicons for example)
        999 // menu position
    );
}

function popbatee_theme_setting_page_callback()
{
    ?>
    <div class="wrap">
        <h1><?php echo get_admin_page_title() ?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('popbatee_theme_settings_group'); // settings group name
            do_settings_sections('popbatee_theme_setting'); // just a page slug
            submit_button(); // "Save Changes" button
            ?>
        </form>
    </div>
    <?php
}

add_action('admin_init', 'popbatee_custom_fields_register_settings');

function popbatee_custom_fields_register_settings()
{
    $page_slug = 'popbatee_theme_setting';
    $option_group = 'popbatee_theme_settings_group';
    //create section
    add_settings_section(
        'popbatee_theme_section_1', // section ID
        '', // title (optional)
        '', // callback function to display the section (optional)
        $page_slug
    );

    //add fields to section
    register_setting($option_group, 'popbatee-footer-content-field', 'esc_attr');
    add_settings_field(
        'popbatee-footer-content-field',
        'Footer Content Field',
        'footer_content_field_setting_callback_function',
        $page_slug,
        'popbatee_theme_section_1',
        array('label_for' => 'popbatee-footer-content-field')
    );
}

function footer_content_field_setting_callback_function()
{
    $value = get_option('popbatee-footer-content-field');
    echo '<textarea type="text" id="popbatee-footer-content-field" name="popbatee-footer-content-field" rows="4" cols="50">' . $value . ' </textarea>';
}

?>