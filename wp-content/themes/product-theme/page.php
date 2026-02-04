<?php
/**
 * The template for displaying all pages
 *
 * This template is fully Elementor-compatible.
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
    <?php
    while ( have_posts() ) :
        the_post();

        // Check if built with Elementor
        if ( did_action( 'elementor/loaded' ) && \Elementor\Plugin::$instance->documents->get( get_the_ID() )->is_built_with_elementor() ) :
            // Let Elementor handle the content completely
            the_content();
        else :
            // Default page template
            ?>
            <div class="container">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    </header>

                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail( 'full' ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php
                        the_content();

                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rgb-rock-light' ),
                            'after'  => '</div>',
                        ) );
                        ?>
                    </div>

                    <?php if ( get_edit_post_link() ) : ?>
                        <footer class="entry-footer">
                            <?php
                            edit_post_link(
                                sprintf(
                                    wp_kses(
                                        /* translators: %s: Name of current post. Only visible to screen readers */
                                        __( 'Edit <span class="screen-reader-text">%s</span>', 'rgb-rock-light' ),
                                        array(
                                            'span' => array(
                                                'class' => array(),
                                            ),
                                        )
                                    ),
                                    wp_kses_post( get_the_title() )
                                ),
                                '<span class="edit-link">',
                                '</span>'
                            );
                            ?>
                        </footer>
                    <?php endif; ?>
                </article>

                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                ?>
            </div>
            <?php
        endif;
    endwhile;
    ?>
</main><!-- #primary -->

<?php
get_footer();
