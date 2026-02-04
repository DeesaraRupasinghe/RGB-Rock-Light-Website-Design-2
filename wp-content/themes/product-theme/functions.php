<?php
/**
 * RGB Rock Light Theme Functions and Definitions
 *
 * @package RGB_Rock_Light
 * @version 1.0.0
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Define theme constants
 */
define( 'RGB_ROCK_LIGHT_VERSION', '1.0.0' );
define( 'RGB_ROCK_LIGHT_DIR', get_template_directory() );
define( 'RGB_ROCK_LIGHT_URI', get_template_directory_uri() );

/**
 * Theme Setup
 * 
 * Sets up theme defaults and registers support for various WordPress features.
 */
function rgb_rock_light_setup() {
    // Make theme available for translation
    load_theme_textdomain( 'rgb-rock-light', RGB_ROCK_LIGHT_DIR . '/languages' );

    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support( 'post-thumbnails' );

    // Set default thumbnail size
    set_post_thumbnail_size( 1200, 9999 );

    // Add custom image sizes
    add_image_size( 'rgb-rock-light-featured', 1200, 600, true );
    add_image_size( 'rgb-rock-light-product', 600, 600, true );

    // Register navigation menus
    register_nav_menus( array(
        'primary'   => esc_html__( 'Primary Menu', 'rgb-rock-light' ),
        'footer'    => esc_html__( 'Footer Menu', 'rgb-rock-light' ),
        'mobile'    => esc_html__( 'Mobile Menu', 'rgb-rock-light' ),
    ) );

    // Switch default core markup for search form, comment form, and comments to output valid HTML5
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
        'navigation-widgets',
    ) );

    // Add support for custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 350,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    // Add support for custom background
    add_theme_support( 'custom-background', array(
        'default-color' => '000000',
    ) );

    // Add support for responsive embedded content
    add_theme_support( 'responsive-embeds' );

    // Add support for wide alignment (Gutenberg)
    add_theme_support( 'align-wide' );

    // Add support for editor styles
    add_theme_support( 'editor-styles' );

    // Enqueue editor styles
    add_editor_style( 'assets/css/editor-style.css' );

    // Add support for block styles
    add_theme_support( 'wp-block-styles' );

    // Add support for selective refresh for widgets
    add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'rgb_rock_light_setup' );

/**
 * Set content width
 */
function rgb_rock_light_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'rgb_rock_light_content_width', 1200 );
}
add_action( 'after_setup_theme', 'rgb_rock_light_content_width', 0 );

/**
 * Enqueue Styles and Scripts
 */
function rgb_rock_light_scripts() {
    // Main stylesheet
    wp_enqueue_style(
        'rgb-rock-light-style',
        get_stylesheet_uri(),
        array(),
        RGB_ROCK_LIGHT_VERSION
    );

    // Theme custom styles
    wp_enqueue_style(
        'rgb-rock-light-theme',
        RGB_ROCK_LIGHT_URI . '/assets/css/theme.css',
        array( 'rgb-rock-light-style' ),
        RGB_ROCK_LIGHT_VERSION
    );

    // WooCommerce styles (only if WooCommerce is active)
    if ( class_exists( 'WooCommerce' ) ) {
        wp_enqueue_style(
            'rgb-rock-light-woocommerce',
            RGB_ROCK_LIGHT_URI . '/assets/css/woocommerce.css',
            array( 'rgb-rock-light-style' ),
            RGB_ROCK_LIGHT_VERSION
        );
    }

    // Theme JavaScript
    wp_enqueue_script(
        'rgb-rock-light-theme',
        RGB_ROCK_LIGHT_URI . '/assets/js/theme.js',
        array(),
        RGB_ROCK_LIGHT_VERSION,
        true
    );

    // Comment reply script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'rgb_rock_light_scripts' );

/**
 * Register Widget Areas
 */
function rgb_rock_light_widgets_init() {
    // Sidebar widget area
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'rgb-rock-light' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here to appear in the sidebar.', 'rgb-rock-light' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    // Footer widget areas
    for ( $i = 1; $i <= 4; $i++ ) {
        register_sidebar( array(
            'name'          => sprintf( esc_html__( 'Footer %d', 'rgb-rock-light' ), $i ),
            'id'            => 'footer-' . $i,
            'description'   => sprintf( esc_html__( 'Footer widget area %d.', 'rgb-rock-light' ), $i ),
            'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
    }

    // Shop sidebar (WooCommerce)
    if ( class_exists( 'WooCommerce' ) ) {
        register_sidebar( array(
            'name'          => esc_html__( 'Shop Sidebar', 'rgb-rock-light' ),
            'id'            => 'shop-sidebar',
            'description'   => esc_html__( 'Widgets for shop pages.', 'rgb-rock-light' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
    }
}
add_action( 'widgets_init', 'rgb_rock_light_widgets_init' );

/**
 * ============================================================================
 * WOOCOMMERCE SUPPORT
 * ============================================================================
 */

/**
 * Declare WooCommerce support
 */
function rgb_rock_light_woocommerce_support() {
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 300,
        'single_image_width'    => 600,
        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 1,
            'default_columns' => 4,
            'min_columns'     => 1,
            'max_columns'     => 6,
        ),
    ) );

    // Add support for WooCommerce galleries
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'rgb_rock_light_woocommerce_support' );

/**
 * Remove WooCommerce default wrapper
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

/**
 * Add custom WooCommerce wrapper
 */
function rgb_rock_light_woocommerce_wrapper_before() {
    echo '<main id="primary" class="site-main woocommerce-main">';
    echo '<div class="container">';
}
add_action( 'woocommerce_before_main_content', 'rgb_rock_light_woocommerce_wrapper_before' );

function rgb_rock_light_woocommerce_wrapper_after() {
    echo '</div>';
    echo '</main>';
}
add_action( 'woocommerce_after_main_content', 'rgb_rock_light_woocommerce_wrapper_after' );

/**
 * Modify WooCommerce products per page
 */
function rgb_rock_light_woocommerce_products_per_page() {
    return 12;
}
add_filter( 'loop_shop_per_page', 'rgb_rock_light_woocommerce_products_per_page' );

/**
 * Modify WooCommerce related products
 */
function rgb_rock_light_related_products_args( $args ) {
    $args['posts_per_page'] = 4;
    $args['columns'] = 4;
    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'rgb_rock_light_related_products_args' );

/**
 * Check if WooCommerce is active
 */
function rgb_rock_light_is_woocommerce_active() {
    return class_exists( 'WooCommerce' );
}

/**
 * ============================================================================
 * ELEMENTOR COMPATIBILITY
 * ============================================================================
 */

/**
 * Add Elementor support
 */
function rgb_rock_light_elementor_support() {
    // Register Elementor locations for theme builder
    if ( did_action( 'elementor/loaded' ) ) {
        add_action( 'elementor/theme/register_locations', 'rgb_rock_light_register_elementor_locations' );
    }
}
add_action( 'after_setup_theme', 'rgb_rock_light_elementor_support' );

/**
 * Register Elementor theme builder locations
 */
function rgb_rock_light_register_elementor_locations( $elementor_theme_manager ) {
    $elementor_theme_manager->register_all_core_location();
}

/**
 * Check if current page is built with Elementor
 */
function rgb_rock_light_is_elementor_page() {
    if ( ! did_action( 'elementor/loaded' ) ) {
        return false;
    }
    
    return \Elementor\Plugin::$instance->documents->get( get_the_ID() )->is_built_with_elementor();
}

/**
 * Remove content padding for Elementor pages
 */
function rgb_rock_light_elementor_body_class( $classes ) {
    if ( did_action( 'elementor/loaded' ) ) {
        if ( \Elementor\Plugin::$instance->preview->is_preview_mode() || 
             ( is_singular() && rgb_rock_light_is_elementor_page() ) ) {
            $classes[] = 'elementor-page';
        }
    }
    return $classes;
}
add_filter( 'body_class', 'rgb_rock_light_elementor_body_class' );

/**
 * ============================================================================
 * HELPER FUNCTIONS
 * ============================================================================
 */

/**
 * Custom excerpt length
 */
function rgb_rock_light_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'rgb_rock_light_excerpt_length' );

/**
 * Custom excerpt more text
 */
function rgb_rock_light_excerpt_more( $more ) {
    return '&hellip;';
}
add_filter( 'excerpt_more', 'rgb_rock_light_excerpt_more' );

/**
 * Add custom body classes
 */
function rgb_rock_light_body_classes( $classes ) {
    // Add page slug as body class
    if ( is_singular() ) {
        global $post;
        $classes[] = 'page-' . $post->post_name;
    }

    // Add WooCommerce class if active
    if ( rgb_rock_light_is_woocommerce_active() ) {
        $classes[] = 'woocommerce-active';
    }

    // Add no-sidebar class for full-width pages
    if ( ! is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter( 'body_class', 'rgb_rock_light_body_classes' );

/**
 * Modify menu classes for better styling
 */
function rgb_rock_light_menu_classes( $classes, $item ) {
    if ( in_array( 'current-menu-item', $classes ) ) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'rgb_rock_light_menu_classes', 10, 2 );

/**
 * Add schema markup to site logo
 */
function rgb_rock_light_get_custom_logo( $html ) {
    // Add itemscope and itemtype for Organization schema
    $html = str_replace( 'custom-logo-link', 'custom-logo-link" itemprop="url', $html );
    $html = str_replace( '<a ', '<a itemscope itemtype="https://schema.org/Organization" ', $html );
    return $html;
}
add_filter( 'get_custom_logo', 'rgb_rock_light_get_custom_logo' );

/**
 * Mobile menu fallback function
 * Falls back to primary menu if no mobile menu is set
 */
function rgb_rock_light_mobile_menu_fallback() {
    wp_nav_menu( array(
        'theme_location' => 'primary',
        'menu_id'        => 'mobile-menu',
        'menu_class'     => 'mobile-menu',
        'container'      => false,
        'fallback_cb'    => false,
    ) );
}

/**
 * ============================================================================
 * SECURITY ENHANCEMENTS
 * ============================================================================
 */

/**
 * Remove WordPress version from header
 */
remove_action( 'wp_head', 'wp_generator' );

/**
 * Disable XML-RPC
 */
add_filter( 'xmlrpc_enabled', '__return_false' );

/**
 * ============================================================================
 * PERFORMANCE OPTIMIZATIONS
 * ============================================================================
 */

/**
 * Remove emoji scripts
 */
function rgb_rock_light_disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'rgb_rock_light_disable_emojis' );

/**
 * Preload important resources
 */
function rgb_rock_light_preload_resources() {
    // Preload main stylesheet
    echo '<link rel="preload" href="' . esc_url( get_stylesheet_uri() ) . '" as="style">' . "\n";
}
add_action( 'wp_head', 'rgb_rock_light_preload_resources', 1 );

/**
 * Add defer attribute to scripts
 */
function rgb_rock_light_defer_scripts( $tag, $handle ) {
    // Scripts to defer
    $defer_scripts = array(
        'rgb-rock-light-theme',
    );

    if ( in_array( $handle, $defer_scripts ) ) {
        return str_replace( ' src', ' defer src', $tag );
    }

    return $tag;
}
add_filter( 'script_loader_tag', 'rgb_rock_light_defer_scripts', 10, 2 );

/**
 * ============================================================================
 * CUSTOMIZER OPTIONS
 * ============================================================================
 */

/**
 * Register customizer options
 */
function rgb_rock_light_customize_register( $wp_customize ) {
    // Theme Options Section
    $wp_customize->add_section( 'rgb_rock_light_options', array(
        'title'       => esc_html__( 'Theme Options', 'rgb-rock-light' ),
        'priority'    => 30,
        'description' => esc_html__( 'Configure theme options.', 'rgb-rock-light' ),
    ) );

    // Show header on scroll option
    $wp_customize->add_setting( 'rgb_rock_light_sticky_header', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ) );

    $wp_customize->add_control( 'rgb_rock_light_sticky_header', array(
        'label'   => esc_html__( 'Enable Sticky Header', 'rgb-rock-light' ),
        'section' => 'rgb_rock_light_options',
        'type'    => 'checkbox',
    ) );

    // Footer copyright text
    $wp_customize->add_setting( 'rgb_rock_light_footer_text', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'rgb_rock_light_footer_text', array(
        'label'       => esc_html__( 'Footer Copyright Text', 'rgb-rock-light' ),
        'description' => esc_html__( 'Enter custom footer copyright text.', 'rgb-rock-light' ),
        'section'     => 'rgb_rock_light_options',
        'type'        => 'text',
    ) );
}
add_action( 'customize_register', 'rgb_rock_light_customize_register' );

/**
 * ============================================================================
 * STRIPE / PAYMENT COMPATIBILITY
 * ============================================================================
 * 
 * This theme is designed to work seamlessly with the WooCommerce Stripe 
 * Payment Gateway plugin. No custom Stripe implementation is needed.
 * 
 * To enable Stripe payments:
 * 1. Install the "WooCommerce Stripe Payment Gateway" plugin
 * 2. Configure Stripe API keys in WooCommerce > Settings > Payments > Stripe
 * 3. Enable the payment method
 * 
 * The theme's checkout styling is compatible with Stripe Elements.
 */

/**
 * Ensure checkout has proper structure for Stripe Elements
 */
function rgb_rock_light_checkout_compatibility() {
    // The theme's WooCommerce CSS ensures proper styling for Stripe Elements
    // No additional modifications needed - Stripe plugin handles everything
}
add_action( 'woocommerce_checkout_init', 'rgb_rock_light_checkout_compatibility' );
