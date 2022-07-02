<?php

WP_Bootstrap_4_Kirki::add_section( 'wp_bp_frontpage_slider', array(
    'title'          => esc_html__( 'Static Frontpage Slider', 'wp-bootstrap-4' ),
    'panel'          => 'theme_options',
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

WP_Bootstrap_4_Kirki::add_field( 'wp_bootstrap_4_theme', array(
	'settings' => 'front_cover_type',
	'label'    => esc_html__( 'Cover Type', 'wp-bootstrap-4' ),
	'section'  => 'wp_bp_frontpage_slider',
	'type'     => 'radio',
    'default'  => 'image',
    'choices'  => array(
        'image'  => esc_html__( 'Static Background Image', 'wp-bootstrap-4' ),
        'slider' => esc_html__( 'Use Slider Instead of Static Image', 'wp-bootstrap-4' )
    ),
) );


WP_Bootstrap_4_Kirki::add_field( 'wp_bootstrap_4_theme', array(
	'settings' => 'front_cover_slide_shortcode',
	'label'    => esc_html__( 'Slider Shortcode', 'wp-bootstrap-4' ),
	'section'  => 'wp_bp_frontpage_slider',
	'type'     => 'text',
    'active_callback' => array(
        array(
            'setting'  		=> 'front_cover_type',
            'operator' 		=> '!=',
            'value'    		=> 'image',
        ),
    ),
) );
