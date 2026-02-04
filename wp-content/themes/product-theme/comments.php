<?php
/**
 * The template for displaying comments
 *
 * @package RGB_Rock_Light
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            $rgb_rock_light_comment_count = get_comments_number();
            if ( '1' === $rgb_rock_light_comment_count ) {
                printf(
                    /* translators: 1: title */
                    esc_html__( 'One comment on &ldquo;%1$s&rdquo;', 'rgb-rock-light' ),
                    '<span>' . wp_kses_post( get_the_title() ) . '</span>'
                );
            } else {
                printf(
                    /* translators: 1: comment count number, 2: title */
                    esc_html( _nx( '%1$s comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', $rgb_rock_light_comment_count, 'comments title', 'rgb-rock-light' ) ),
                    number_format_i18n( $rgb_rock_light_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    '<span>' . wp_kses_post( get_the_title() ) . '</span>'
                );
            }
            ?>
        </h2>

        <?php the_comments_navigation(); ?>

        <ol class="comment-list">
            <?php
            wp_list_comments(
                array(
                    'style'      => 'ol',
                    'short_ping' => true,
                    'callback'   => 'rgb_rock_light_comment_callback',
                )
            );
            ?>
        </ol>

        <?php
        the_comments_navigation();

        // If comments are closed and there are comments, leave a note
        if ( ! comments_open() ) :
            ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'rgb-rock-light' ); ?></p>
            <?php
        endif;

    endif; // Check for have_comments().

    comment_form(
        array(
            'class_form'         => 'comment-form',
            'title_reply'        => esc_html__( 'Leave a Comment', 'rgb-rock-light' ),
            'title_reply_to'     => esc_html__( 'Leave a Reply to %s', 'rgb-rock-light' ),
            'cancel_reply_link'  => esc_html__( 'Cancel Reply', 'rgb-rock-light' ),
            'label_submit'       => esc_html__( 'Post Comment', 'rgb-rock-light' ),
            'comment_notes_before' => '',
        )
    );
    ?>

</div><!-- #comments -->

<?php
/**
 * Custom comment callback function
 */
function rgb_rock_light_comment_callback( $comment, $args, $depth ) {
    $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
    ?>
    <<?php echo esc_html( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <footer class="comment-meta">
                <div class="comment-author vcard">
                    <?php
                    if ( 0 !== $args['avatar_size'] ) {
                        echo get_avatar( $comment, $args['avatar_size'] );
                    }
                    ?>
                    <b class="fn"><?php comment_author_link(); ?></b>
                </div><!-- .comment-author -->

                <div class="comment-metadata">
                    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                        <time datetime="<?php comment_time( 'c' ); ?>">
                            <?php
                            printf(
                                /* translators: 1: Comment date, 2: Comment time */
                                esc_html__( '%1$s at %2$s', 'rgb-rock-light' ),
                                get_comment_date(),
                                get_comment_time()
                            );
                            ?>
                        </time>
                    </a>
                    <?php edit_comment_link( esc_html__( 'Edit', 'rgb-rock-light' ), ' <span class="edit-link">', '</span>' ); ?>
                </div><!-- .comment-metadata -->

                <?php if ( '0' === $comment->comment_approved ) : ?>
                    <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'rgb-rock-light' ); ?></p>
                <?php endif; ?>
            </footer><!-- .comment-meta -->

            <div class="comment-content">
                <?php comment_text(); ?>
            </div><!-- .comment-content -->

            <?php
            comment_reply_link(
                array_merge(
                    $args,
                    array(
                        'add_below' => 'div-comment',
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth'],
                    )
                )
            );
            ?>
        </article><!-- .comment-body -->
    <?php
}
