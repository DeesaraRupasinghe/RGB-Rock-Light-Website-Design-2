<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package RGB_Rock_Light
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e( '404', 'rgb-rock-light' ); ?></h1>
            </header>

            <div class="page-content">
                <h2><?php esc_html_e( 'Oops! Page Not Found', 'rgb-rock-light' ); ?></h2>
                <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search or navigate back to the homepage?', 'rgb-rock-light' ); ?></p>

                <?php get_search_form(); ?>

                <div style="margin-top: 2rem;">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button">
                        <?php esc_html_e( 'Return to Homepage', 'rgb-rock-light' ); ?>
                    </a>
                </div>
            </div>
        </section>
    </div>
</main><!-- #primary -->

<?php
get_footer();
