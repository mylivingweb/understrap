<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
<?php echo get_theme_mod( 'understrap_theme_script_code_setting' ); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
    
    <!-- ******************* The Navbar Area ******************* -->
    <div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar">
	

        

    <?php 
    $setting = get_option('understrap_nav');
    if ( get_option('understrap_nav') == 1) : ?>

        <!-- If fixed top is set to 1 then set it in code -->
        <nav class="site-navigation navbar-fixed-top" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
    
   <?php else : ?>
    
        <!-- If fixed top is set to 0 then do nothing -->

        <nav class="site-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">

    
     <?php endif; ?>
            <div class="navbar navbar-inverse">

                <div class="container">

                    <div class="row">

                        <div class="col-xs-12">

                        <div class="navbar-brand">
                            <!-- Display logo if uploaded -->
                            <?php if ( get_theme_mod( 'understrap_logo' ) ) : ?>
                                    <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
                                    <img src='<?php echo esc_url( get_theme_mod( 'understrap_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' class="img-responsive responsive pull-left" id="logo">
                                    </a>
                            <?php else : ?>
                            <!-- Display site title if no logo -->
                                    <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a>
                            <?php endif; ?>

                            </div>

                            <div class="navbar-header pull-right">


                                <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>

                            

                            <!-- The WordPress Menu goes here -->
                            <?php wp_nav_menu(
                                    array(
                                        'theme_location' => 'primary',
                                        'container_class' => 'collapse navbar-collapse navbar-responsive-collapse',
                                        'menu_class' => 'nav navbar-nav ',
                                        'fallback_cb' => '',
                                        'menu_id' => 'main-menu',
                                        'walker' => new wp_bootstrap_navwalker()
                                    )
                            ); ?>

                        </div> <!-- .col-md-11 or col-md-12 end -->

                    </div> <!-- .row end -->

                </div> <!-- .container -->
                
            </div><!-- .navbar -->
            
        </nav><!-- .site-navigation -->
        
    </div><!-- .wrapper-navbar end -->






