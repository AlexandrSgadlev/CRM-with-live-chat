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


				
// Project
global $post;
$post_meta = get_post_meta( $post->ID );

$comments_count = wp_count_comments( $post->ID );


// Author
if( isset($post_meta['customer_id'][0]) ){
	$customer_id = $post_meta['customer_id'][0];
}else{
	$customer_id = 0;
}

if( !isset($post_meta['project_discussions'][0]) ){
	$post_meta['project_discussions'][0] = 'default';
}

// Проверка на разрешение сообщений
if($post_meta['project_discussions'][0] == 'default' || $post_meta['project_discussions'][0] == 'spam'){
	$comments = get_comments(
		array(
			'post_id' =>      $post->ID, 
			'status' =>       'approve',
			'count' => true,
			'date_query' =>   array(
			'after' => '2 day ago'
			),
		)
	);
	// Проверка на спам
	if($comments >= 150){
		update_post_meta( $post->ID, 'project_discussions', 'spam' );
		add_filter( 'comments_open', '__return_false', 10, 2 );
	}else{
		update_post_meta( $post->ID, 'project_discussions', 'default' );
	}
}
if( $post_meta['project_discussions'][0] == 'disable' ){
	add_filter( 'comments_open', '__return_false', 10, 2 );
}




?>

<?php do_action('clp-before-comments-project'); ?>

<div id="comments" class="comments-area" data_messege_counts="<?php echo $comments_count->approved; ?>">

	<div class="comments-area-list">
		<div class="comment-list">
	
		<?php
		// You can start editing here -- including this comment!
		if ( have_comments() ) :
			?>
			

			<?php 

			wp_list_comments( 
					array(
						'project_id' => $post->ID,
						'customer_id' => $customer_id,
						'per_page' => -1,
						'type' => 'comment',
						'reverse_top_level' => false,
						'max_depth' => 1,
						'callback' => 'wp_custom_comment',
						'end-callback' => 'wp_custom_end_comment',
					) ); 
			?>


			<?php

		endif; 

		?>
		</div>
	</div>
	
	<?php

		if ( comments_open() ){
			comment_form();
		}else{
			echo '<div class="messages-disabled server-errore">
				<p class="messages-disabled-label">' . __( 'Messages disabled', THEME_NAME ) . '</p>
				<p class="messages-disabled-text">' . __( 'Access will be opened shortly after moderators check. You can email us.', THEME_NAME ) . '</p>
			</div>';
		}
	?>



</div>
