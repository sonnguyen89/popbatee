<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_4
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header <?php if ( get_theme_mod( 'sticky_header', 0 ) ) : echo 'sticky-top'; endif; ?>">
		<nav id="site-navigation" class="main-navigation navbar navbar-expand-lg navbar-dark">
			<div class="container-fluid">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-menu-wrap" aria-controls="primary-menu-wrap" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php get_template_part( 'template-parts/default/main-navigation' ); ?>
			</div>
		</nav><!-- #site-navigation -->
        <a class="mobile-logo" href="<?php echo home_url(); ?>">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/popatee_form_logo.svg'); ?>"/>
        </a>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
