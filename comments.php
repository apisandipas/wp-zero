<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.  The actual display of comments is
 * handled by a callback to twentyten_comment which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage ZEROTHEME
 */
?>


<?php // Password protected comments ?>
<?php if ( post_password_required() ) : ?>
	<section id="comments" class="comments">
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'ZEROTHEME' ); ?></p>
	</section><!-- #comments -->


<?php // Not password protected: display comments, form, etc ?>
<?php else: ?>

	<?php // Display the comments ?>
	<?php if ( have_comments() ) : ?>

				<h2><?php
		// The title for the comment section
		printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'ZEROTHEME' ),
			number_format_i18n( get_comments_number() ), '<cite>' . get_the_title() . '</cite>' );
	?></h2>

					<?php
	// The comment thread
	// the ZEROTHEME_Walker_Comment will call the comment.php template
	wp_list_comments( array( 'walker' => new ZEROTHEME_Walker_Comment(), 'element' => 'article',  ) );
?>

		<?php // Comment navigation ?>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
				<?php previous_comments_link( __( 'Older Comments' ) ); ?>
				<?php next_comments_link( __( 'Newer Comments' ) ); ?>
		<?php endif; // check for comment navigation ?>
	<?php endif; ?>



	<?php
// Comments form

// Display comment form ?>
	<?php if ( comments_open() ): ?>
		<?php comment_form( array( 'comment_notes_after' => '' ) ); ?>

	<?php // Notify that comments are closed ?>
	<?php elseif ( have_comments() ): ?>
		<p><?php _e( 'Comments are closed.' ); ?></p>
	<?php endif; ?>

<?php endif; ?>
</section>
