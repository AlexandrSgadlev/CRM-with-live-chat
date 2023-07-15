<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package clp-theme
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

	<div class="comments-area-list" data_messege_counts="<?php echo get_comment_count()['approved']; ?>">
		<?php
		// You can start editing here -- including this comment!
		if ( have_comments() ) :
			?>
			
			<div class="comment-list">
				<?php
				wp_list_comments(
					array(
						'style'      => 'div',
						'short_ping' => true,
					)
				);
				?>
			</div>

			<?php

		endif; 

		?>
		
	</div>
	
	<?php
		comment_form();
	?>

</div>
