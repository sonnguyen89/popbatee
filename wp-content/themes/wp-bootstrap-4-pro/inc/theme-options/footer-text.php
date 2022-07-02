<?php

WP_Bootstrap_4_Kirki::add_section( 'wp_bp_footer_text', array(
    'title'          => esc_html__( 'Footer Text', 'wp-bootstrap-4' ),
    'panel'          => 'theme_options',
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );


WP_Bootstrap_4_Kirki::add_field( 'wp_bootstrap_4_theme', array(
	'settings'          => 'footer_text',
	'label'             => esc_html__( 'Footer Text', 'wp-bootstrap-4' ),
	'section'           => 'wp_bp_footer_text',
	'type'              => 'text',
    'default'           => wp_kses_post( __( '<a href="https://bootstrap-wp.com/">Bootstrap 4 WordPress Theme</a> <span class="sep"> | </span> Theme Name: WP Bootstrap 4.', 'wp-bootstrap-4' ) ),
    'sanitize_callback' => 'wp_kses_post',
) );
