<?php
/**
 * The header for the theme
 *
 * Displays all of the <head> section and everything up until <div id="content">
 *
 * @package RGB_Rock_Light
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#primary">
    <?php esc_html_e( 'Skip to content', 'rgb-rock-light' ); ?>
</a>

<header id="masthead" class="site-header" role="banner">
    <div class="container">
        <div class="site-branding">
            <?php
            if ( has_custom_logo() ) :
                the_custom_logo();
            else :
                ?>
                <h1 class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <?php bloginfo( 'name' ); ?>
                    </a>
                </h1>
                <?php
                $rgb_rock_light_description = get_bloginfo( 'description', 'display' );
                if ( $rgb_rock_light_description || is_customize_preview() ) :
                    ?>
                    <p class="site-description screen-reader-text"><?php echo esc_html( $rgb_rock_light_description ); ?></p>
                <?php endif; ?>
            <?php endif; ?>
        </div><!-- .site-branding -->

        <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'rgb-rock-light' ); ?>">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'menu_class'     => 'primary-menu',
                'container'      => false,
                'fallback_cb'    => false,
            ) );
            ?>
        </nav><!-- #site-navigation -->

        <div class="header-actions">
            <?php if ( function_exists( 'wc_get_cart_url' ) && function_exists( 'WC' ) ) : ?>
                <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="header-cart" aria-label="<?php esc_attr_e( 'View shopping cart', 'rgb-rock-light' ); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="9" cy="21" r="1"/>
                        <circle cx="20" cy="21" r="1"/>
                        <path d="m1 1 4 4v11h16l2-9H6"/>
                    </svg>
                    <?php if ( WC()->cart && WC()->cart->get_cart_contents_count() > 0 ) : ?>
                        <span class="cart-count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
                    <?php endif; ?>
                </a>
            <?php endif; ?>

            <button class="menu-toggle" aria-controls="mobile-menu" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle Menu', 'rgb-rock-light' ); ?>">
                <span></span>
            </button>
        </div><!-- .header-actions -->
    </div><!-- .container -->
</header><!-- #masthead -->

<nav id="mobile-navigation" class="mobile-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Mobile Menu', 'rgb-rock-light' ); ?>">
    <?php
    wp_nav_menu( array(
        'theme_location' => 'mobile',
        'menu_id'        => 'mobile-menu',
        'menu_class'     => 'mobile-menu',
        'container'      => false,
        'fallback_cb'    => 'rgb_rock_light_mobile_menu_fallback',
    ) );
    ?>
</nav><!-- #mobile-navigation -->

<div id="page" class="site">
    <div id="content" class="site-content">
