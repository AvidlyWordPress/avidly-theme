<?php
/**
 * The template file for displaying the comments and comment form.
 *
 * @package Avidly_Theme
 * @since 1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area entry-content container has-background has-lightgray-background-color py-6">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$comment_count = get_comments_number();
			if ( '1' === $comment_count ) {
				printf(
					// phpcs:disable
					/* translators: Comment title (singular): %1$s title. */
					esc_html_x( 'One thought on &ldquo;%1$s&rdquo;', 'comments UI', 'avidly-theme' ),
					'<span>' . get_the_title() . '</span>'
					// phpcs:enable
				);
			} else {
				printf(
					// phpcs:disable
					/* translators: Comment title (plurar): %1$s comment count number, %2$s title. */
					esc_html_x( '%1$s thoughts on &ldquo;%2$s&rdquo;', 'comments UI', 'avidly-theme' ),
					number_format_i18n( $comment_count ),
					'<span>' . get_the_title() . '</span>'
					// phpcs:enable
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments(
					array(
						'style'      => 'ol',
						'short_ping' => true,
					)
				);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments">
			<?php
			/* translators: Commenting is closed message. */
			echo esc_html_x( 'Comments are closed.', 'comments UI', 'avidly-theme' );
			?>
			</p>

			<?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>

</div><!-- #comments -->
