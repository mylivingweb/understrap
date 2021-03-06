<?php
/**
 * understrap Theme Customizer
 *
 * @package understrap
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function understrap_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

}
add_action( 'customize_register', 'understrap_customize_register' );

function understrap_theme_customize_register( $wp_customize ) {

    $wp_customize->add_section( 'understrap_theme_slider_options', array(
        'title'          => __( 'Slider Settings', 'understrap' )
    ) );

    $wp_customize->add_setting( 'understrap_theme_slider_count_setting', array(
        'default'        => '1',
        'sanitize_callback' => 'esc_textarea'
    ) );

    $wp_customize->add_control( 'understrap_theme_slider_count', array(
        'label'      => __( 'Number of slides displaying at once', 'understrap' ),
        'section'    => 'understrap_theme_slider_options',
        'type'       => 'text',
        'settings'   => 'understrap_theme_slider_count_setting'
    ) );

    $wp_customize->add_setting( 'understrap_theme_slider_time_setting', array(
        'default'        => '5000',
        'sanitize_callback' => 'esc_textarea'
    ) );

    $wp_customize->add_control( 'understrap_theme_slider_time', array(
        'label'      => __( 'Slider Time (in ms)', 'understrap' ),
        'section'    => 'understrap_theme_slider_options',
        'type'       => 'text',
        'settings'   => 'understrap_theme_slider_time_setting'
    ) );

    $wp_customize->add_setting( 'understrap_theme_slider_loop_setting', array(
        'default'        => 'true',
        'sanitize_callback' => 'esc_textarea'
    ) );

    $wp_customize->add_control( 'understrap_theme_loop', array(
        'label'      => __( 'Loop Slider Content', 'understrap' ),
        'section'    => 'understrap_theme_slider_options',
        'type'     => 'radio',
        'choices'  => array(
            'true'  => 'yes',
            'false' => 'no',
        ),
        'settings'   => 'understrap_theme_slider_loop_setting'
    ) );

    $wp_customize->add_section( 'understrap_theme_script_options', array(
        'title'          => __( 'Add scripts', 'understrap' )
    ) );

    $wp_customize->add_setting( 'understrap_theme_script_code_setting', array(
        'default'        => '',
        'sanitize_js_callback' => 'esc_js'
    ) );

    $wp_customize->add_control( 'understrap_theme_script_code', array(
        'label'      => __( 'Add custom JS code here', 'understrap' ),
        'section'    => 'understrap_theme_script_options',
        'type'       => 'textarea',
        'settings'   => 'understrap_theme_script_code_setting'
    ) );
    /**Creating Panel for settings*/
    $wp_customize->add_panel( 'understrap_settings_panel', array(
    'title' => 'UnderStrap Settings',
    'description' => 'This is a description of this panel',
    'priority' => 10
    ) );
}
add_action( 'customize_register', 'understrap_theme_customize_register' );



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function understrap_customize_preview_js() {
	wp_enqueue_script( 'understrap_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'understrap_customize_preview_js' );

/****Adding in Custom Settings***/

/**Added Logo upload**/
/**Added Ability to make nav static **/
function understrap_logo_customizer( $wp_customize ) {
    $wp_customize->add_section( 'understrap_logo_section' , array(
    'title'       => __( 'Upload Your Logo', 'understrap' ),
    'priority'    => 30,
    'description' => 'Upload a logo to replace the default site name and description in the header',
    'panel' => 'understrap_settings_panel'
    ));
    $wp_customize->add_setting( 'understrap_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'understrap_logo', array(
    'label'    => __( 'Logo', 'understrap' ),
    'section'  => 'understrap_logo_section',
    'settings' => 'understrap_logo'
    )));

}
add_action( 'customize_register', 'understrap_logo_customizer' );
/**End Logo**/
/**Begin Static Nav Setting */
function understrap_nav_customizer( $wp_customize ) {
    $wp_customize->add_section( 'understrap_nav_section' , array(
    'title'       => __( 'Static Navbar Setting', 'understrap' ),
    'priority'    => 30,
    'description' => 'Choose yes if you want nav bar to be static',
    'panel' => 'understrap_settings_panel',
    ));
    $wp_customize->add_setting( 'understrap_nav', array(
    'default'        => true,
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
    ) );
    $wp_customize->add_control( 'understrap_nav', array(
    'label'    => __( '', 'understrap' ),
    'section'  => 'understrap_nav_section',
    'settings' => 'understrap_nav',
    'type'     => 'radio',
    'choices'  => array(
            '1'  => 'yes',
            '0' => 'no'
    )));

}
add_action( 'customize_register', 'understrap_nav_customizer' );
