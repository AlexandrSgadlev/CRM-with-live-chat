<?php
/*
CLP_Project_Comments
Author: CLP

*/


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/* Custom comment */
function wp_custom_comment($comment, $args, $depth){
	
	$author_name = get_user_meta( $comment->user_id, 'user_name', true );
	if( empty($author_name) ){
		$author_name = get_comment_author();
	}

	?>
	
	<div <?php comment_class() ?> id="comment-<?php comment_ID() ?>">
	
		<div class="comment-body">
		
		<?php
		
			$edit = esc_url( get_edit_comment_link( $comment ) );
			$avatar = '<div class="comment-author-content">' . get_avatar( $comment, 150, '', '', array( 'class' => 'comment-avatar' ) ) . '</div>'; 
		
			// Автор комментария не владелец проекта
			if( $args['customer_id'] == 0 || $args['customer_id'] != $comment->user_id ){
				if($edit){
					$link_edit = ' | <span class="comment-edit"><a class="comment-edit-link" href="' . $edit . '">' . __( 'Edit', THEME_NAME ) . '</a></span>';
				}
				$text = '<div class="comment-text-content"><div class="comment-a"><span class="author-name">' . $author_name . '</span> | <span class="comment-date">' . get_comment_date( 'j F Y' ) . '</span>' . $link_edit . '</div><div class="comment-text">' . nl2br( get_comment_text() ) . '</div></div>';
				
				echo '<div class="project-comment project-manager-comment">' . $avatar . '<div class="sep-bl"></div>' . $text . '</div>';
			}
			
			// Автор комментария владелец проекта
			if( $args["customer_id"] != 0 && $args["customer_id"] == $comment->user_id ){
				if($edit){
					$link_edit = '<span class="comment-edit"><a class="comment-edit-link" href="' . $edit . '">' . __( 'Edit', THEME_NAME ) . '</a></span> | ';
				}
				$text = '<div class="comment-text-content"><div class="comment-a">' . $link_edit . '<span class="comment-date">' . get_comment_date( 'j F Y' ) . '</span> | <span class="author-name">' . $author_name . '</span></div><div class="comment-text">' . nl2br( get_comment_text() ) . '</div></div>';
				
				echo '<div class="project-comment project-author-comment">' . $text . '<div class="sep-bl"></div>' . $avatar . '</div>';;
			}
			

		?>
	
		</div>

		<?php
}
function wp_custom_end_comment( $comment, $args, $depth ){
	echo '</div>';
}


/* Filter */
add_filter( 'comment_form_defaults', 'cpl_comment_form_defaults' );
function cpl_comment_form_defaults( $defaults ){
    $defaults['title_reply'] = '';
	$defaults['label_submit'] = __('Send', THEME_NAME);
    return $defaults;
}
add_filter( 'comment_form_logged_in', 'unset_login_field' );
function unset_login_field($fields){
	$fields = '';
    return $fields;
}


/* Action */
add_action( 'comment_form_after', function(){
     echo '<div class="cf7"><div class="wpcf7"><div class="wpcf7-not-valid-tip" aria-hidden="true"></div><div class="wpcf7-response-output server-errore" aria-hidden="true">' . __('An error occurred, please try again later.', THEME_NAME) . '</div></div></div>'; 
});


class CLP_Project_Comments
{
	/**
	 * Constructor
	 * @param string	$templateFile	Plugin File
	 */
	function __construct()
	{
		
		// the ajax function
		add_action('wp_ajax_add_messege_to_project' , array( $this, 'add_messege_to_project') );
		add_action('wp_ajax_nopriv_add_messege_to_project', array( $this, 'add_messege_to_project') );
		
		add_action('wp_ajax_updata_messege_to_project' , array( $this, 'updata_messege_to_project') );
		add_action('wp_ajax_nopriv_updata_messege_to_project', array( $this, 'updata_messege_to_project') );

		add_action('wp_ajax_check_messege' , array( $this, 'check_messege') );
		add_action('wp_ajax_nopriv_check_messege', array( $this, 'check_messege') );		
		
		
		add_filter('duplicate_comment_id', '__return_false');
		add_filter('comment_flood_filter', '__return_false');
	}
	


	/**
	 * New comment
	 */
	public function add_messege_to_project()
	{
		
		check_ajax_referer( 'secure_nonce_name', 'security' );

		$errore = [];
		$post_id = sanitize_text_field($_POST['comment_post_ID']);


		if(!get_post_status( $post_id )){
			$errore['server_errore']['post'] = __('An error occurred, please try again later.', THEME_NAME);
		}else{
			$post = get_post($post_id);
			if( ( strripos($_SERVER["HTTP_REFERER"], $post->post_name) ) === false) {
				$errore['server_errore']['post'] = __('Erorre project id.', THEME_NAME);
			}
		}


		if(empty($_POST['comment'])){
			$errore['form_errore']['comment'] = __('This field is required', THEME_NAME);
		}

		// User check
		if(!is_user_logged_in()){
			$errore['server_errore']['user_logged'] = __('An error occurred, please try again later.', THEME_NAME);
		}


		// Errore
		if( !empty($errore) ){
			echo json_encode ( array('errore' => $errore) );
			wp_die();
		}


		// Проверка на спам
		$project_discussions = get_post_meta( $post_id, 'project_discussions', true );
		if($project_discussions == 'default'){
			$comments_approve = get_comments(
				array(
					'post_id' =>      $post_id, 
					'status' =>       'approve',
					'count' => true,
					'date_query' =>   array(
					'after' => '2 day ago'
					),
				)
			);
			if($comments_approve >= 150){
				update_post_meta( $post_id, 'project_discussions', 'spam' );
				$project_discussions = 'spam';
			}
		}
		if( $project_discussions == 'spam' || $project_discussions == 'disable'){
			$errore['server_errore']['spam'] = __( 'You write suspiciously a lot, our moderators will check it.', THEME_NAME );
			echo json_encode ( array('errore' => $errore) );
			wp_die();
		}
		unset($comments_approve);


		$comment = wp_handle_comment_submission( wp_unslash( $_POST ) );
		if ( is_wp_error( $comment ) ) {
			if( $comment->get_error_message() ){
				$errore['server_errore']['wp_error'] = __( $comment->get_error_message(), THEME_NAME);
			}else{
				$errore['server_errore']['wp_error'] = __( 'An error occurred, please try again later.', THEME_NAME);
			}
			echo json_encode ( array('errore' => $errore) );
			wp_die();
		}


		$post_meta = get_post_meta( $post_id );

		// Author
		$customer_id = 0;
		if( isset($post_meta['customer_id'][0]) && !empty($post_meta['customer_id'][0]) ){
			$customer_id = $post_meta['customer_id'][0];
		}
		
		$new_message = 0;
		$current_user = wp_get_current_user();
		if( $current_user ){
			if ( in_array( 'um_project-manager', (array) $current_user->roles ) || in_array( 'administrator', (array) $current_user->roles ) ) {
				$new_message = $post_meta['new_message_manager'][0] + 1;
				update_post_meta(  $post_id, 'new_message_manager', $new_message );
			}else{
				$new_message = $post_meta['new_message_customer'][0] + 1;
				update_post_meta(  $post_id, 'new_message_customer', $new_message );
			}
		}
		

		ob_start();

		$comments = get_comments( array('post_id' => $post_id, 'status' => 'approve') );

		wp_list_comments( array(
			'project_id' => $post_id,
			'customer_id' => $customer_id,
			'per_page' => 0,
			'page' => 1,
			'reverse_top_level' => true,
			'type' => 'comment',
			'max_depth' => 1,
			'callback' => 'wp_custom_comment',
			'end-callback' => 'wp_custom_end_comment',
		), $comments ); 

		$output .= ob_get_contents();
		
		ob_end_clean();

		echo json_encode ( array('add_html' => $output, 'messege_counts' => (count($comments)), 'new_messege' => $new_message ) );

		wp_die();
		
		
	}


	/**
	 * Check messege
	 */
	public function check_messege()
	{
		check_ajax_referer( 'secure_nonce_name', 'security' );

		$post_id = sanitize_text_field($_POST['comment_post_ID']);

		if(!get_post_status( $post_id )){
			$errore['server_errore']['user_logged'] = __('An error occurred, please try again later.', THEME_NAME);
		}	

		if( !empty($errore) ){
			echo json_encode ( array('errore' => $errore) );
			wp_die();
		}
		
		$current_user = wp_get_current_user();
		if( $current_user ){
			if ( in_array( 'um_project-manager', (array) $current_user->roles ) || in_array( 'administrator', (array) $current_user->roles ) ) {
				update_post_meta(  $post_id, 'new_message_customer', '0' );
			}else{
				update_post_meta(  $post_id, 'new_message_manager', '0' );
			}
		}

		echo json_encode ( 'success' );

		wp_die();		
		

	}

	/**
	 * Updata
	 */
	public function updata_messege_to_project()
	{
		
		global $MESSEGE_PROJECT;
		if($MESSEGE_PROJECT == false){wp_die();};
		
		check_ajax_referer( 'secure_nonce_name', 'security' );

		$post_id = sanitize_text_field($_POST['comment_post_ID']);

		if(!get_post_status( $post_id )){
			$errore['server_errore']['user_logged'] = __('An error occurred, please try again later.', THEME_NAME);
		}

		$comments_count = wp_count_comments( $post_id );
		if( $comments_count->approved == $_POST["messege_counts"] ){
			echo json_encode ( 'updata' );
			wp_die();
		}


		$post_meta = get_post_meta( $post_id );

		// Author
		if( $post_meta['customer_id'][0] ){
			$customer_id = $post_meta['customer_id'][0];
		}else{
			$customer_id = 0;
		}

		$new_message = 0;
		$current_user = wp_get_current_user();
		if( $current_user ){
			if ( in_array( 'um_project-manager', (array) $current_user->roles ) || in_array( 'administrator', (array) $current_user->roles ) ) {
				$new_message = $post_meta['new_message_customer'][0];
			}else{
				$new_message = $post_meta['new_message_manager'][0];
			}
		}		

		ob_start();

		$comments = get_comments( array('post_id' => $post_id) );

		wp_list_comments( array(
			'project_id' => $post_id,
			'customer_id' => $customer_id,
			'per_page' => 0,
			'page' => 1,
			'reverse_top_level' => true,
			'type' => 'comment',
			'max_depth' => 1,
			'callback' => 'wp_custom_comment',
			'end-callback' => 'wp_custom_end_comment',
		), $comments ); 

		$output .= ob_get_contents();
		
		ob_end_clean();

		echo json_encode ( array('add_html' => $output, 'messege_counts' => $comments_count->approved, 'new_messege' => $new_message) );

		wp_die();


	}

}


