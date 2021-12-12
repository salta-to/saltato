<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saltato
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

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$saltato_comment_count = get_comments_number();
			if ( '1' === $saltato_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'saltato' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf(
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $saltato_comment_count, 'comments title', 'saltato' ) ),
					number_format_i18n( $saltato_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
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
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'saltato' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().
	$commenter     = wp_get_current_commenter();
	$req           = get_option( 'require_name_email' );
	$consent       = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
	$fields        = array(
		'author'  => '<div class="govuk-form-group"><fieldset class="govuk-fieldset" aria-describedby="comment-hint"><h4 class="govuk-fieldset__heading">' . esc_html__( 'About you', 'saltato' ) . '</h4></legend><div id="comment-hint" class="govuk-hint">' . esc_html__( 'Your email address will not be published. Required fields are marked *', 'saltato' ) . '</div><p class="comment-form-author"><label class="govuk-label" for="author">' . __( 'Name', 'saltato' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><input id="author" name="author" class="govuk-input" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" required /></p>',
		'email'   => '<p class="comment-form-email"><label class="govuk-label" for="email">' . __( 'Email Address', 'saltato' ) . ( $req ? ' <span class="required">*</span><br/>' : '' ) . '</label><input required id="email" name="email" class="govuk-input" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-required="true" required /></p>',
		'url'     => '<p class="comment-form-url"><label class="govuk-label" for="url">' . __( 'Your Website', 'saltato' ) . '</label><input id="url" name="url" class="govuk-input" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
		'cookies' => '<p class="comment-form-cookies-consent"><div class="govuk-checkboxes" data-module="govuk-checkboxes"><div class="govuk-checkboxes__item"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" class="govuk-checkboxes__input" type="checkbox" value="yes"' . $consent . '><label for="wp-comment-cookies-consent" class="govuk-checkboxes__label">' . __( 'Save my name, email, and website in this browser.', 'saltato' ) . '</label></div></div></p></div></fieldset>',
	);
	$comments_args = array(
		'fields'        => $fields,
		// Redefine textarea (the comment body).
		'comment_field' => '<p class="comment-form-comment"><label for="comment" class="govuk-label screen-reader-text">' . esc_html__( 'Comment', 'saltato' ) . '</label><textarea id="comment" name="comment" class="govuk-textarea" rows="5" aria-required="true"></textarea></p>',
		'class_submit'  => 'govuk-button',
		'label_submit'  => esc_html__( 'Post comment', 'saltato' ),
	);
	comment_form( $comments_args );

	?>

</div><!-- #comments -->
