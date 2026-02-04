<?php
/**
 * The template for displaying single posts
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
        <?php
        while ( have_posts() ) :
            the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?>>
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    
                    <div class="entry-meta">
                        <time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                            <?php echo esc_html( get_the_date() ); ?>
                        </time>
                        <span class="entry-author">
                            <?php
                            printf(
                                /* translators: %s: Author name */
                                esc_html__( 'by %s', 'rgb-rock-light' ),
                                '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
                            );
                            ?>
                        </span>
                        <?php
                        $categories_list = get_the_category_list( esc_html__( ', ', 'rgb-rock-light' ) );
                        if ( $categories_list ) :
                            ?>
                            <span class="entry-categories">
                                <?php
                                printf(
                                    /* translators: %s: Category list */
                                    esc_html__( 'in %s', 'rgb-rock-light' ),
                                    $categories_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                );
                                ?>
                            </span>
                        <?php endif; ?>
                    </div>
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

                <footer class="entry-footer">
                    <?php
                    // Tags
                    $tags_list = get_the_tag_list( '', esc_html__( ', ', 'rgb-rock-light' ) );
                    if ( $tags_list ) :
                        ?>
                        <div class="entry-tags">
                            <?php
                            printf(
                                /* translators: %s: Tag list */
                                esc_html__( 'Tags: %s', 'rgb-rock-light' ),
                                $tags_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                            );
                            ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( get_edit_post_link() ) : ?>
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
                    <?php endif; ?>
                </footer>
            </article>

            <?php
            // Post navigation
            the_post_navigation( array(
                'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'rgb-rock-light' ) . '</span> <span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'rgb-rock-light' ) . '</span> <span class="nav-title">%title</span>',
            ) );

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile;
        ?>
    </div>
</main><!-- #primary -->

<?php
get_footer();
